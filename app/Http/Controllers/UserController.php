<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Input;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use ImgUploader;
use Carbon\Carbon;
use Redirect;
use App\User;
use App\ApplicantMessage;
use App\Company;
use App\FavouriteCompany;
use App\Gender;
use App\MaritalStatus;
use App\Country;
use App\State;
use App\City;
use App\JobExperience;
use App\JobApply;
use App\CareerLevel;
use App\Industry;
use App\University;
use App\FunctionalArea;
use App\ProfileCareer;
use App\ProfileCareerLocation;
use App\ProfileResumeSummary;
use App\ProfileItSkills;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Traits\CommonUserFunctions;
use App\Traits\ProfileSummaryTrait;
use App\Traits\ProfileCvsTrait;
use App\Traits\ProfileProjectsTrait;
use App\Traits\ProfileExperienceTrait;
use App\Traits\ProfileEducationTrait;
use App\Traits\ProfileSkillTrait;
use App\Traits\ProfileLanguageTrait;
use App\Traits\Skills;
use App\Http\Requests\Front\UserFrontFormRequest;
use App\Helpers\DataArrayHelper;
use App\Helpers\MiscHelper;

class UserController extends Controller
{

    use CommonUserFunctions;
	use ProfileSummaryTrait;
	use ProfileCvsTrait;
	use ProfileProjectsTrait;
	use ProfileExperienceTrait;
	use ProfileEducationTrait;
	use ProfileSkillTrait;
	use ProfileLanguageTrait;
	use Skills;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth', ['only' => ['myProfile', 'updateMyProfile', 'viewPublicProfile']]);
		$this->middleware('auth', ['except' => ['showApplicantProfileEducation', 'showApplicantProfileProjects', 'showApplicantProfileExperience', 'showApplicantProfileSkills', 'showApplicantProfileLanguages']]);
    }
	
	public function viewPublicProfile($id)
    {
		
		$user = User::findOrFail($id);
		$profileCv = $user->getDefaultCv();
				
		return view('user.applicant_profile')
                        ->with('user', $user)
                        ->with('profileCv', $profileCv)
						->with('page_title', $user->getName())
						->with('form_title', 'Contact '.$user->getName());
    }
	
	public function myProfile()
    {
        
        $genders = DataArrayHelper::langGendersArray();
        $maritalStatuses = DataArrayHelper::langMaritalStatusesArray();
        $nationalities = DataArrayHelper::langNationalitiesArray();
		$countries = DataArrayHelper::langCountriesArray();
		$jobExperiences = DataArrayHelper::langJobExperiencesArray();
		$careerLevels = DataArrayHelper::langCareerLevelsArray();
		$industries = DataArrayHelper::langIndustriesArray();
        $functionalAreas = DataArrayHelper::langFunctionalAreasArray();
		$jobTypes = DataArrayHelper::langJobTypesArray();
		$jobShifts = DataArrayHelper::langJobShiftsArray();
		$category = DataArrayHelper::langCategoryArray();
		$cities = DataArrayHelper::langCitiesArrays();
		$languages = DataArrayHelper::languagesArray();
		$languagesLevel = DataArrayHelper::langLanguageLevelsArray();
		$jobSkills = DataArrayHelper::langJobSkillsArray();
		$degreeLevels = DataArrayHelper::langDegreelevelsArray(0);
		$majorSubjects = DataArrayHelper::langMajorSubjectsArray();
		$resultTypes = DataArrayHelper::langResultTypesArray();
		$jobRole = DataArrayHelper::langRolesArrays();
		$university = DataArrayHelper::langUniversityArray();
		$upload_max_filesize = UploadedFile::getMaxFilesize() / (1048576);
        
        // $user = User::with(['maritalStatus','gender','country','state','city','profileCarrer','profileCarrer.industry','profileCarrer.functionalArea','profileCarrer.jobrole','profileCarrer.jobType','profileCarrer.jobShift','profileCarrer.cities','profileSummary','profileLanguages.language','profileLanguages.languageLevel','profileResumeSummary','ProfileItSkills','profileSkills.jobSkill','profileProjects','profileEducation','profileEducation.degreeLevel','profileEducation.degreeType','profileEducation.resultType','profileEducation.profileEducationMajorSubjects','profileExperience','profileExperience.jobRole','profileCvs'])->findOrFail(Auth::user()->id);
        $user = User::with(['maritalStatus','gender','country','state','city','profileCarrer','profileCarrer.industry','profileCarrer.functionalArea','profileCarrer.jobrole','profileCarrer.jobType','profileCarrer.jobShift','profileCarrer.cities','profileSummary','profileLanguages.language','profileLanguages.languageLevel','profileResumeSummary','ProfileItSkills','profileSkills.jobSkill','profileProjects','profileEducation','profileEducation.majorSubject','profileEducation.degreeLevel','profileEducation.degreeType','profileEducation.university','profileEducation.resultType','profileEducation.profileEducationMajorSubjects','profileExperience','profileExperience.jobRole','profileCvs'])
        // ->whereHas('profileExperience', function($q){
        //     $q->orderBy('profile_experiences.id', 'desc');
        // })
        ->findOrFail(Auth::user()->id);
        //dd($user);
        // $profileCareer = ProfileCareer::with(['industry','functionalArea','jobrole','jobType','jobShift','cities'])->where('user_id',Auth::user()->id)->first();
        
        // dd(MiscHelper::getSalaryThousands());
        // dd($user);
        $percentage = $this->getProfilePercentage($user);
        return view('user.edit_profile')
                        ->with('genders', $genders)
                        ->with('maritalStatuses', $maritalStatuses)
                        ->with('nationalities', $nationalities)
                        ->with('countries', $countries)
                        ->with('jobExperiences', $jobExperiences)
                        ->with('careerLevels', $careerLevels)
                        ->with('industries', $industries)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('jobTypes', $jobTypes)
                        ->with('jobShifts', $jobShifts)
                        ->with('user', $user)
                        ->with('category', $category)
                        ->with('cities', $cities)
                        ->with('languages', $languages)
                        ->with('languagesLevel', $languagesLevel)
                        //->with('profileCareer', $profileCareer)
                        ->with('jobSkills', $jobSkills)
                        ->with('degreeLevels', $degreeLevels)
                        ->with('majorSubjects', $majorSubjects)
                        ->with('university', $university)
                        ->with('resultTypes', $resultTypes)
                        ->with('jobRole', $jobRole)
                        ->with('profilePercentage', $percentage)
						->with('upload_max_filesize', $upload_max_filesize);
    }

    public function getProfilePercentage($user){
        // dd(config('constants.progress.completedProfile'));
        $maximumPoints  = 100;
        $hasCompletedProfile  = 0;
        $hasCompletedCareer  = 0;
        $hasCompletedProfileSummary  = 0;
        $hasCompletedProfileProjects  = 0;
        $hasCompletedprofileLanguages  = 0;
        $hasCompletedProfileItSkills  = 0;
        $hasCompletedProfileEducation  = 0;
        $hasCompletedProfileExperience  = 0;
        $hasCompletedProfileSkills  = 0;
        $hasCompletedProfileResumeSummary  = 0;
        $hasCompletedProfileCvs  = 0;

        if(isset($user->id)&&$user->id !=""){
            $hasCompletedProfile = config('constants.progress.completedProfile');
        }
        if(isset($user->profileCarrer->profile_career_id)&&$user->profileCarrer->profile_career_id!=''){
            $hasCompletedCareer = config('constants.progress.completedCareer');
        }
        if(isset($user->profileSummary)&&$user->profileSummary->id !=""){
            $hasCompletedProfileSummary = config('constants.progress.completedProfileSummary');
        }        
        if(isset($user->profileProjects)&&count($user->profileProjects) > 0){
            $hasCompletedProfileProjects = config('constants.progress.completedProfileProjects');
        }
        if(isset($user->profileLanguages)&&count($user->profileLanguages) > 0){
            $hasCompletedprofileLanguages = config('constants.progress.completedprofileLanguages');
        }
        if(isset($user->ProfileItSkills)&&count($user->ProfileItSkills) > 0){
            $hasCompletedProfileItSkills = config('constants.progress.completedProfileItSkills');
        }
        if(isset($user->profileEducation)&&count($user->profileEducation) > 0){
            $hasCompletedProfileEducation = config('constants.progress.completedProfileEducation');
        }
        if(isset($user->profileExperience)&&count($user->profileExperience) > 0){
            $hasCompletedProfileExperience = config('constants.progress.completedProfileExperience');
        }
        if(isset($user->profileSkills)&&count($user->profileSkills) > 0){
            $hasCompletedProfileSkills = config('constants.progress.completedProfileSkills');
        }
        if(isset($user->profileResumeSummary)&&$user->profileResumeSummary->id !=""){
            $hasCompletedProfileResumeSummary = config('constants.progress.completedProfileResumeSummary');
        }
        if(isset($user->profileCvs)&&$user->profileCvs->id !=""){
            $hasCompletedProfileCvs = config('constants.progress.completedProfileCvs');
        }
        $percentage = ($hasCompletedProfile+$hasCompletedCareer+$hasCompletedProfileSummary+$hasCompletedProfileProjects+$hasCompletedprofileLanguages+$hasCompletedProfileItSkills+$hasCompletedProfileEducation+$hasCompletedProfileExperience+$hasCompletedProfileSkills+$hasCompletedProfileResumeSummary+$hasCompletedProfileCvs)*$maximumPoints/100;
        $this->updateProfilePercentage($percentage);
        return $percentage;
    }
    public function updateProfilePercentage($percentage){
        $user = User::findOrFail(Auth::user()->id);
        $user->percentage = $percentage;
        $user->update();
    }
    public function updateMyProfile(UserFrontFormRequest $request)
    {

        $user = User::findOrFail(Auth::user()->id);
        /*         * **************************************** */
        if ($request->hasFile('image')) {
            $is_deleted = $this->deleteUserImage($user->id);
            $image = $request->file('image');
            $fileName = ImgUploader::UploadImage('user_images', $image, $request->input('name'), 300, 300, false);
            $user->image = $fileName;
        }
        /*         * ************************************** */

        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
		/**************************/
		$user->name = $user->getName();
		/**************************/
        $user->email = $request->input('email');

        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->father_name = $request->input('father_name');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->gender_id = $request->input('gender_id');
        $user->marital_status_id = $request->input('marital_status_id');
        $user->nationality_id = $request->input('nationality_id');
        $user->national_id_card_number = $request->input('national_id_card_number');
        $user->country_id = $request->input('country_id');
        $user->state_id = $request->input('state_id');
        $user->city_id = $request->input('city_id');
        $user->phone = $request->input('phone');
        $user->mobile_num = $request->input('mobile_num');
        $user->job_experience_id = $request->input('job_experience_id');
        $user->career_level_id = $request->input('career_level_id');
        $user->industry_id = $request->input('industry_id');
        $user->functional_area_id = $request->input('functional_area_id');
        $user->current_salary = $request->input('current_salary');
        $user->expected_salary = $request->input('expected_salary');
        $user->salary_currency = $request->input('salary_currency');
        $user->street_address = $request->input('street_address');
		
        $user->update();
		
		$this->updateUserFullTextSearch($user);
		
        flash(__('You have updated your profile successfully'))->success();
        return \Redirect::route('my.profile');
    }
	
	public function addToFavouriteCompany(Request $request, $company_slug)
    {
		$data['company_slug'] = $company_slug;
        $data['user_id'] = Auth::user()->id;
        $data_save = FavouriteCompany::create($data);
		flash(__('Company has been added in favorites list'))->success();
        return \Redirect::route('company.detail', $company_slug);
    }

    public function removeFromFavouriteCompany(Request $request, $company_slug)
    {	
		$user_id = Auth::user()->id;
        FavouriteCompany::where('company_slug', 'like', $company_slug)->where('user_id', $user_id)->delete();
		
		flash(__('Company has been removed from favorites list'))->success();
        return \Redirect::route('company.detail', $company_slug);
    }
	
	public function myFollowings()
    {
        $user = User::findOrFail(Auth::user()->id);
		$companiesSlugArray = $user->getFollowingCompaniesSlugArray();
		$companies = Company::whereIn('slug', $companiesSlugArray)->get();
		
		return view('user.following_companies')
                        ->with('user', $user)
						->with('companies', $companies);
    }
	
	public function myMessages()
    {
        $user = User::findOrFail(Auth::user()->id);
		$messages = ApplicantMessage::where('user_id', '=', $user->id)
						->orderBy('is_read', 'asc')
						->orderBy('created_at', 'desc')
						->get();
						
		return view('user.applicant_messages')
                        ->with('user', $user)
						->with('messages', $messages);
    }
	
	public function applicantMessageDetail($message_id)
    {
        $user = User::findOrFail(Auth::user()->id);
		$message = ApplicantMessage::findOrFail($message_id);
		$message->update(['is_read'=>1]);
				
		return view('user.applicant_message_detail')
                        ->with('user', $user)
						->with('message', $message);
    }

    public function updatePersonalDetails(Request $request){    
               
        $user = User::findOrFail($request->input('id'));
        if ($request->hasFile('profile_image')) {
            $imgName = preg_replace('/\s+/', '', $user->name);
            $image = $request->file('profile_image');
            $fileName = ImgUploader::UploadImage('user_images', $image, $imgName, 300, 300, false);
            $user->image = $fileName;
        }
       
        $user->date_of_birth = $request->input('date_of_birth');
        $user->gender_id = $request->input('gender_id');
        $user->marital_status_id = $request->input('marital_status_id');
        $user->category_id = $request->input('category_id');
        $user->street_address = $request->input('street_address');
        $user->homedown = $request->input('hometown');
        $user->pincode = $request->input('pincode');
        $user->update();
        $this->myProfile();
        return response()->json(array('success' => true, 'status' => 200), 200);
    }
    
    public function updateCareerDetails(Request $request){
        $industry_id=0;
        $functional_area_id=0;
        if($request->input('industry')!=""){
            $industry_id=$this->storeIndustry($request->input('industry'));
        }
        if($request->input('functional_area')!=""){
            $functional_area_id=$this->storeFunctionalArea($request->input('functional_area'));
        }
        $exitsCareer = ProfileCareer::select('id')->where('user_id', '=', $request->input('id'))->first();    
       
        if(!isset($exitsCareer->id)){
            $ProfileCareer = new ProfileCareer();
            $ProfileCareer->user_id = $request->input('id');
            $ProfileCareer->industry_id = ($industry_id==0)?$request->input('industry_id'):$industry_id;
            $ProfileCareer->functional_area_id = ($functional_area_id==0)?$request->input('functional_area_id'):$functional_area_id;
            $ProfileCareer->role_id = $request->input('role_id');
            $ProfileCareer->job_type_id = $request->input('job_type_id');
            $ProfileCareer->job_shift_id = $request->input('job_shift_id');
            $ProfileCareer->date_of_join = date("Y-m-d", strtotime($request->input('date_of_join')));
            $ProfileCareer->working_from = $request->input('working_from');
            $ProfileCareer->salary_from = $request->input('salary_from');
            $ProfileCareer->salary_to = $request->input('salary_to');
            $ProfileCareer->save();

            $ProfileCareer->profile_career_id = $ProfileCareer->id;
            $ProfileCareer->update();
            $this->insertProfileCareerLocation($request->input('city_id'),$ProfileCareer->id);
            $this->myProfile();
            return response()->json(array('success' => true, 'status' => 200,'message'=>"Career details successfully added... "), 200);
        } else{
            $ProfileCareer = ProfileCareer::findOrFail($request->input('profile_career_id'));
            $ProfileCareer->user_id = $request->input('id');
            $ProfileCareer->industry_id = ($industry_id==0)?$request->input('industry_id'):$industry_id;
            $ProfileCareer->functional_area_id = ($functional_area_id==0)?$request->input('functional_area'):$functional_area_id;
            $ProfileCareer->role_id = $request->input('role_id');
            $ProfileCareer->job_type_id = $request->input('job_type_id');
            $ProfileCareer->job_shift_id = $request->input('job_shift_id');
            $ProfileCareer->date_of_join = date("Y-m-d", strtotime($request->input('date_of_join')));
            $ProfileCareer->working_from = $request->input('working_from');
            $ProfileCareer->salary_from = $request->input('salary_from');
            $ProfileCareer->salary_to = $request->input('salary_to');
            $ProfileCareer->update();
            $this->insertProfileCareerLocation($request->input('city_id'),$request->input('profile_career_id'));
            $this->myProfile();
            return response()->json(array('success' => true, 'status' => 200, 'message'=>"Career details successfully updated... "), 200);
        }
        
    }
    public function storeIndustry($industry){
        $exitsIndustry = Industry::where('industry', '=', $industry)->count();
        if($exitsIndustry==0){
            $industryMod = new Industry();
            $industryMod->industry = $industry;
            $industryMod->is_active = 1;
            $industryMod->lang = 'en';
            $industryMod->is_default = 1;

            $industryMod->save();

            // /** ************************************ */
            $industryMod->sort_order = $industryMod->id;
            $industryMod->industry_id = $industryMod->id;
            $industryMod->update();

            return $industryMod->id;
        }
    }
    public function storeFunctionalArea($functionalarea){
        $exitsFunctionalArea = FunctionalArea::where('functional_area', '=', $functionalarea)->count();
        if($exitsFunctionalArea==0){
            $functionalAreaMod = new FunctionalArea();
            $functionalAreaMod->functional_area = $functionalarea;
            $functionalAreaMod->is_active = 1;
            $functionalAreaMod->lang = 'en';
            $functionalAreaMod->is_default = 1;

            $functionalAreaMod->save();

            // /** ************************************ */
            $functionalAreaMod->sort_order = $functionalAreaMod->id;
            $functionalAreaMod->functional_area_id = $functionalAreaMod->id;
            $functionalAreaMod->update();

            return $functionalAreaMod->id;
        }
    }

    public function insertProfileCareerLocation($location, $profile_career_id){
        ProfileCareerLocation::where('profile_career_id', '=', $profile_career_id)->delete();
        
        foreach($location as $cities_id){
            $ProfileCareerLocation = new ProfileCareerLocation();
            $ProfileCareerLocation->profile_career_id = $profile_career_id;
            $ProfileCareerLocation->city_id = $cities_id;
            $ProfileCareerLocation->save();
        }
    }

    public function updateProfileResumeSummary($user_id, Request $request)
    {
        ProfileResumeSummary::where('user_id', '=', $user_id)->delete();
		$summary = $request->input('summary');
		$ProfileSummary = new ProfileResumeSummary();
		$ProfileSummary->user_id = $user_id;
		$ProfileSummary->summary = $summary;
		$ProfileSummary->save();
        $this->myProfile();	
        return response()->json(array('success' => true, 'status' => 200,'message'=>"Resume headeline updated successfully... "), 200);
    }
    public function addProfileItSkill(Request $request)
    {
      	$profileItSkill = new ProfileItSkills();	
		$profileItSkill->user_id = $request->input('user_id');
		$profileItSkill->skill_name = $request->input('skill_name');
		$profileItSkill->version = $request->input('version');	
		$profileItSkill->last_used = $request->input('last_used');
		$profileItSkill->experience_from = $request->input('experience_from');
		$profileItSkill->experience_to = $request->input('experience_to');
        $profileItSkill->save();
        $this->myProfile();
        return response()->json(array('success' => true, 'status' => 200,'message'=>"It Skill successfully added..."), 200);
    }

    public function deleteProfileItSkill(Request $request){
        $id = $request->input('id');
        try {
            $profileSkill = ProfileItSkills::findOrFail($id);
	        $profileSkill->delete();
            $this->myProfile();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function candidateChangePassword()
    {
        $user = User::with(['country','state','city','profileCarrer','profileCarrer.jobrole'])->findOrFail(Auth::user()->id);
        return view('user.candidate_change_password')
                        ->with('user', $user)
						->with('messages', 'messages');
       
    }

    public function ChangePasswordStore(Request $request){
      
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");
    }

}