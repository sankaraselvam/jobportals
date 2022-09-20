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
		$upload_max_filesize = UploadedFile::getMaxFilesize() / (1048576);

        //$user = User::findOrFail(Auth::user()->id);
        $user = User::with(['maritalStatus','gender','country','state','city','profileSummary','profileLanguages.language','profileLanguages.languageLevel','profileResumeSummary','ProfileItSkills','profileSkills.jobSkill','profileProjects'])->findOrFail(Auth::user()->id);
        $profileCareer = ProfileCareer::with(['industry','functionalArea','jobrole','jobType','jobShift','cities'])->where('user_id',Auth::user()->id)->first();
        // dd($user);
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
                        ->with('profileCareer', $profileCareer)
                        ->with('jobSkills', $jobSkills)
						->with('upload_max_filesize', $upload_max_filesize);
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
        $user->date_of_birth = $request->input('date_of_birth');
        $user->gender_id = $request->input('gender_id');
        $user->marital_status_id = $request->input('marital_status_id');
        $user->category_id = $request->input('category_id');
        $user->street_address = $request->input('street_address');
        $user->homedown = $request->input('hometown');
        $user->pincode = $request->input('pincode');
        $user->update();
        return response()->json(array('success' => true, 'status' => 200), 200);
    }
    public function updateCareerDetails(Request $request){
        
        $exitsCareer = ProfileCareer::select('id')->where('user_id', '=', $request->input('id'))->first();    
       
        if(!isset($exitsCareer->id)){
            $ProfileCareer = new ProfileCareer();
            $ProfileCareer->user_id = $request->input('id');
            $ProfileCareer->industry_id = $request->input('industry_id');
            $ProfileCareer->functional_area_id = $request->input('functional_area_id');
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
            return response()->json(array('success' => true, 'status' => 200,'message'=>"Career details successfully added... "), 200);
        } else{
            $ProfileCareer = ProfileCareer::findOrFail($request->input('profile_career_id'));
            $ProfileCareer->user_id = $request->input('id');
            $ProfileCareer->industry_id = $request->input('industry_id');
            $ProfileCareer->functional_area_id = $request->input('functional_area_id');
            $ProfileCareer->role_id = $request->input('role_id');
            $ProfileCareer->job_type_id = $request->input('job_type_id');
            $ProfileCareer->job_shift_id = $request->input('job_shift_id');
            $ProfileCareer->date_of_join = date("Y-m-d", strtotime($request->input('date_of_join')));
            $ProfileCareer->working_from = $request->input('working_from');
            $ProfileCareer->salary_from = $request->input('salary_from');
            $ProfileCareer->salary_to = $request->input('salary_to');
            $ProfileCareer->update();
            $this->insertProfileCareerLocation($request->input('city_id'),$request->input('profile_career_id'));
            return response()->json(array('success' => true, 'status' => 200, 'message'=>"Career details successfully updated... "), 200);
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
		$ProfileSummary->save();//ProfileItSkills	
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
        return response()->json(array('success' => true, 'status' => 200,'message'=>"It Skill successfully added..."), 200);
    }



}