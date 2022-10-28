<?php

namespace App\Http\Controllers\Company;

use Mail;
use Hash;
use File;
use ImgUploader;
use Auth;
use Validator;
use DB;
use Input;
use Redirect;
use App\User;
use App\Company;
use App\CompanyMessage;
use App\ApplicantMessage;
use App\Country;
use App\CountryDetail;
use App\State;
use App\City;
use App\Industry;
use App\FavouriteCompany;
use App\FavouriteApplicant;
use App\OwnershipType;
use App\JobApply;
use App\Job;
use Carbon\Carbon;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use App\Mail\CompanyContactMail;
use App\Mail\ApplicantContactMail;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\Front\CompanyFrontFormRequest;
use App\Http\Controllers\Controller;
use App\ProfileExperience;
use App\Traits\CompanyTrait;
use DateTime;

class CompanyController extends Controller
{
	use CompanyTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('company', ['except' => ['companyDetail', 'sendContactForm']]);
    }

    public function getJobPosts(){
        $postList = Job::select('id','title','created_at','expiry_date','slug')
        ->with('appliedUsers')
        // ->whereHas('appliedUsers', function($q) use($user_id){
        //     $q->where('job_apply.user_id','=',$user_id);
        // })
        ->orderBy('jobs.id', 'DESC')->limit(5)->get();

        return $postList;
    }

    public function index()
    {
        $users= Auth::guard('company')->user();//->id;
        
        $postJobs = $this->getJobPosts();
        return view('company_home',compact('postJobs'));
    }
    
    public function companySubscriptionStatus()
    {
        //echo 1111111111111111111111111111111;exit;
        return view('company.company_subscription_status')
                        ->with('company', 'company')
						->with('messages', 'messages');
       
    }

    public function companyChangePassword()
    {
        //echo 1111111111111111111111111111111;exit;
        return view('company.company_change_password')
                        ->with('company', 'company')
						->with('messages', 'messages');
       
    }
    
    public function companyConnection()
    {
        //echo 1111111111111111111111111111111;exit;
        return view('company.company_connection')
                        ->with('company', 'company')
						->with('messages', 'messages');
       
    }

    public function companyManageJobs() {
            // $postJobs = $this->getJobPosts()->paginate(2);    
            $postJobs = Job::select('id','title','created_at','expiry_date','slug')
            ->with('appliedUsers') 
            ->where('deleted_at', 'N')           
            ->orderBy('jobs.id', 'DESC')->paginate(2);

            $users= Auth::guard('company')->user();
            // dd($postJobs);
            return view('company.company_manage_jobs')
            ->with('postJobs', $postJobs)
            ->with('user', $users);
    }
    
    public function companyCandidateListing(Request $request, $job_id){
        $callStatus = config('constants.callStatus');
        $job_applied_users = JobApply::with(['user','user.country','user.state','user.city','user.profileCarrer','user.profileCarrer.jobrole','user.profileEducation','user.profileEducation.degreeLevel','user.profileSkills','user.profileSkills.jobSkill','job'])
        // ->whereHas('user.profileExperience', function($q){
        //     $q->orderBy('profile_experiences.id', 'desc');
        // })
        ->whereHas('user', function($q){
            $q->whereNotNull('id');
        })
        ->where('job_id', '=', $job_id)->get();
        // flash(__('Job has been added in favorites list'))->success();
        // return \Redirect::route('index');
        // dd($callStatus);
            return view('company.company_candidate_listing')
                            ->with('job_applied_users', $job_applied_users)
                            ->with('callStatus', $callStatus);
           
    }

    public function getProfileExperienceList($user_id){
        $experience = ProfileExperience::where('user_id', 2)->orderBy('id', 'desc')->limit(2)->get();
        $expYears = $this->getExperienceYrs($experience);
        return array('expYears'=>$expYears, 'experience'=>$experience);
    }

    public function getExperienceYrs($data){
        $from = isset($data[1])?$data[1]->emp_working_from_year.'-'.$data[1]->emp_working_from_month.'-01':'';
        $to = isset($data[0])?$data[0]->emp_working_from_year.'-'.$data[0]->emp_working_from_month.'-01':'';       
        $origin = new DateTime($from);
        $target = new DateTime($to);
        $interval = $origin->diff($target);
        return $interval->format('%y y %m m');
    }
    
    public function deleteApplyCandidate(Request $request){
        $id = $request->input('id');
        try {
        	$JobApply = JobApply::findOrFail($id);
	    	$JobApply->delete();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function changeCandidateStatus(Request $request){
        try {
            $user = User::findOrFail($request->input('user_id'));
            $user->candidate_status = $request->input('status_val');
        	$user->update();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
        
    }
	
	public function companyProfile()
    {
        $countries = DataArrayHelper::defaultCountriesArray();
        $industries = DataArrayHelper::defaultIndustriesArray();
        $ownershipTypes = DataArrayHelper::defaultOwnershipTypesArray();

        $company = Company::findOrFail(Auth::guard('company')->user()->id);
        return view('company.edit_profile')
                        ->with('company', $company)
                        ->with('countries', $countries)
                        ->with('industries', $industries)
                        ->with('ownershipTypes', $ownershipTypes);
    }

    public function updateCompanyProfile(Request $request)
    {
        // print_r($image); 
        // exit;
        
        $company = Company::findOrFail(Auth::guard('company')->user()->id);
        $saveAccountDetails = ($request->input('saveAccountDetails'))?$request->input('saveAccountDetails'):'';
        $saveCompanyDetails = ($request->input('saveCompanyDetails'))?$request->input('saveCompanyDetails'):'';
        $saveKYCDetails = ($request->input('saveKYCDetails'))?$request->input('saveKYCDetails'):'';

        if($saveAccountDetails==1){
            $updateAccountDetails = $this->updateAccountDetails($request, $company);
            if($updateAccountDetails){
                return response()->json(array('success' => true, 'status' => 200, 'message'=>"Company Account Details has been updated..."), 200);
            }
        }
        if($saveCompanyDetails==1){
            $updateCompanyDetails = $this->updateCompanyDetails($request, $company);
            if($updateCompanyDetails){
                return response()->json(array('success' => true, 'status' => 200, 'message'=>"Company Details has been updated..."), 200);
            }
        }
        if($saveKYCDetails==1){
            $updateKYCDetails = $this->updateKYCDetails($request, $company);
            if($updateKYCDetails){
                return response()->json(array('success' => true, 'status' => 200, 'message'=>"Company KYC Details has been updated..."), 200);
            }
        }
        exit;
        /** **************************************** */
	   if ($request->hasFile('logo')) {
            $is_deleted = $this->deleteCompanyLogo($company->id);
            $image = $request->file('logo');
            $fileName = ImgUploader::UploadImage('company_logos', $image, $request->input('name'), 300, 300, false);
            $company->logo = $fileName;
        }
        /*         * ************************************** */

        $company->name = $request->input('name');
        $company->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $company->password = Hash::make($request->input('password'));
        }
        $company->ceo = $request->input('ceo');
        $company->industry_id = $request->input('industry_id');
        $company->ownership_type_id = $request->input('ownership_type_id');
        $company->description = $request->input('description');
        $company->location = $request->input('location');
		$company->map = $request->input('map');
        $company->no_of_offices = $request->input('no_of_offices');

        $website = $request->input('website');
        $company->website = (false === strpos($website, 'http')) ? 'http://' . $website : $website;

        $company->no_of_employees = $request->input('no_of_employees');
        $company->established_in = $request->input('established_in');
        $company->fax = $request->input('fax');
        $company->phone = $request->input('phone');
		$company->facebook = $request->input('facebook');
		$company->twitter = $request->input('twitter');
		$company->linkedin = $request->input('linkedin');
		$company->google_plus = $request->input('google_plus');
		$company->pinterest = $request->input('pinterest');
        $company->country_id = $request->input('country_id');
        $company->state_id = $request->input('state_id');
        $company->city_id = $request->input('city_id');
        
		$company->slug = str_slug($company->name, '-').'-'.$company->id;

        $company->update();
		
        flash(__('Company has been updated'))->success();
        return \Redirect::route('company.profile');
    }

    public function updateAccountDetails($request, $company)
    {
        $company->email = $request->input('email');
        $company->communication_email = $request->input('communication_email');
        $company->employer_role = $request->input('employer_role');
        $company->phone = $request->input('phone');
        $company->update();
        return true;
    }
    public function updateCompanyDetails($request, $company)
    {
        $company->ceo = $request->input('ceo');
        $company->industry_id = $request->input('industry_id');
        $company->description = $request->input('description');
        $company->location = $request->input('location');
        $website = $request->input('website');
        $company->website = (false === strpos($website, 'http')) ? 'http://' . $website : $website;
        $company->established_in = $request->input('established_in');
        $company->update();
        return true;
    }

    public function updateKYCDetails($request, $company)
    {
        $company->country_id = $request->input('country_id');
        $company->state_id = $request->input('state_id');
        $company->city_id = $request->input('city_id');
        $company->address = $request->input('address');
        $company->address_proof = $request->input('address_proof');
        $company->pan_number = $request->input('pan_number');
        $company->pan_card_name = $request->input('pan_card_name');
        $company->pan_card_date = date("Y-m-d", strtotime($request->input('pan_card_date')));
        $company->pincode = $request->input('pincode');
        $company->gstin_number = $request->input('gstin_number');
       
        if ($request->hasFile('address_proof_image')) {
            $image = $request->file('address_proof_image');
            $fileName=$request->file('address_proof_image')->getClientOriginalName();
            $fileName = ImgUploader::UploadDoc('company_logos/docs', $image, $fileName);
            $company->address_proof_image = $fileName;
        }
        if ($request->hasFile('pancard_image')) {
            $image = $request->file('pancard_image');
            $fileName=$request->file('pancard_image')->getClientOriginalName();
            $fileName = ImgUploader::UploadDoc('company_logos/docs', $image, $fileName);
            $company->pancard_image = $fileName;
        }
        $company->update();
        return true;
    }
	
	public function addToFavouriteApplicant(Request $request, $application_id, $user_id, $job_id, $company_id)
    {
		$data['user_id'] = $user_id;
		$data['job_id'] = $job_id;
		$data['company_id'] = $company_id;
		
        $data_save = FavouriteApplicant::create($data);
		flash(__('Job seeker has been added in favorites list'))->success();
        return \Redirect::route('applicant.profile', $application_id);
    }

    public function removeFromFavouriteApplicant(Request $request, $application_id, $user_id, $job_id, $company_id)
    {	
		$data['user_id'] = $user_id;
		$data['job_id'] = $job_id;
		$data['company_id'] = $company_id;
		FavouriteApplicant::where('user_id', $user_id)
							->where('job_id', '=', $job_id)
							->where('company_id', '=', $company_id)
							->delete();
		
		flash(__('Job seeker has been removed from favorites list'))->success();
        return \Redirect::route('applicant.profile', $application_id);
    }
	
	public function companyDetail(Request $request, $company_slug)
	{
		    $company = Company::where('slug', 'like', $company_slug)->firstOrFail();        	
			/*****************************************************/
			$seo = $this->getCompanySEO($company);
			/*****************************************************/
			return view('company.detail')
                        ->with('company', $company)
						->with('seo', $seo);
    
	    
	}
	
	public function sendContactForm(Request $request)
    {

        $msgresponse = Array();
        $rules = array(
            'from_name' => 'required|max:100|between:4,70',
            'from_email' => 'required|email|max:100',
            'subject' => 'required|max:200',
            'message' => 'required',
            'to_id' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        );
        $rules_messages = array(
            'from_name.required' => __('Name is required'),
            'from_email.required' => __('E-mail address is required'),
            'from_email.email' => __('Valid e-mail address is required'),
            'subject.required' => __('Subject is required'),
            'message.required' => __('Message is required'),
            'to_id.required' => __('Recieving Company details missing'),
			'g-recaptcha-response.required' => __('Please verify that you are not a robot'),
            'g-recaptcha-response.captcha' => __('Captcha error! try again'),
        );

        $validation = Validator::make($request->all(), $rules, $rules_messages);
        if ($validation->fails()) {

            $msgresponse = $validation->messages()->toJson();
            echo $msgresponse;
            exit;
        } else {

            $receiver_company = Company::findOrFail($request->input('to_id'));


            $data['company_id'] = $request->input('company_id');
            $data['company_name'] = $request->input('company_name');
            $data['from_id'] = $request->input('from_id');
            $data['to_id'] = $request->input('to_id');
            $data['from_name'] = $request->input('from_name');
            $data['from_email'] = $request->input('from_email');
            $data['from_phone'] = $request->input('from_phone');
            $data['subject'] = $request->input('subject');
            $data['message_txt'] = $request->input('message');

            $data['to_email'] = $receiver_company->email;
            $data['to_name'] = $receiver_company->name;

            $msg_save = CompanyMessage::create($data);

            $when = Carbon::now()->addMinutes(5);
            Mail::send(new CompanyContactMail($data));

            $msgresponse = ['success' => 'success', 'message' => __('Message sent successfully')];
            echo json_encode($msgresponse);
            exit;
        }
    }
	
	public function sendApplicantContactForm(Request $request)
    {

        $msgresponse = Array();
        $rules = array(
            'from_name' => 'required|max:100|between:4,70',
            'from_email' => 'required|email|max:100',
            'subject' => 'required|max:200',
            'message' => 'required',
            'to_id' => 'required',
        );
        $rules_messages = array(
            'from_name.required' => __('Name is required'),
            'from_email.required' => __('E-mail address is required'),
            'from_email.email' => __('Valid e-mail address is required'),
            'subject.required' => __('Subject is required'),
            'message.required' => __('Message is required'),
            'to_id.required' => __('Recieving applicant details missing'),
			'g-recaptcha-response.required' => __('Please verify that you are not a robot'),
            'g-recaptcha-response.captcha' => __('Captcha error! try again'),
        );

        $validation = Validator::make($request->all(), $rules, $rules_messages);
        if ($validation->fails()) {

            $msgresponse = $validation->messages()->toJson();
            echo $msgresponse;
            exit;
        } else {

            $receiver_user = User::findOrFail($request->input('to_id'));


            $data['user_id'] = $request->input('user_id');
            $data['user_name'] = $request->input('user_name');
            $data['from_id'] = $request->input('from_id');
            $data['to_id'] = $request->input('to_id');
            $data['from_name'] = $request->input('from_name');
            $data['from_email'] = $request->input('from_email');
            $data['from_phone'] = $request->input('from_phone');
            $data['subject'] = $request->input('subject');
            $data['message_txt'] = $request->input('message');

            $data['to_email'] = $receiver_user->email;
            $data['to_name'] = $receiver_user->getName();

            $msg_save = ApplicantMessage::create($data);

            $when = Carbon::now()->addMinutes(5);
            Mail::send(new ApplicantContactMail($data));

            $msgresponse = ['success' => 'success', 'message' => __('Message sent successfully')];
            echo json_encode($msgresponse);
            exit;
        }
    }
	
	public function postedJobs(Request $request)
    {
		$jobs = Auth::guard('company')->user()->jobs()->paginate(10);
		return view('job.company_posted_jobs')
				->with('jobs', $jobs);
    }
	
	public function listAppliedUsers(Request $request, $job_id)
    {
		$job_applications = JobApply::where('job_id', '=', $job_id)->get();
		
		return view('job.job_applications')
				->with('job_applications', $job_applications);
    }
	
	public function listFavouriteAppliedUsers(Request $request, $job_id)
    {
		$company_id = Auth::guard('company')->user()->id;
		$user_ids = FavouriteApplicant::where('job_id', '=', $job_id)->where('company_id', '=', $company_id)->pluck('user_id')->toArray();
		$job_applications = JobApply::where('job_id', '=', $job_id)->whereIn('user_id', $user_ids)->get();
		
		return view('job.job_applications')
				->with('job_applications', $job_applications);
    }
	
	public function applicantProfile($application_id)
    {
		
		$job_application = JobApply::findOrFail($application_id);
		$user = $job_application->getUser();
		$job = $job_application->getJob();
		$company = $job->getCompany();             
		$profileCv = $job_application->getProfileCv();
		
		/*************************************************/
		$num_profile_views = $user->num_profile_views + 1;
		$user->num_profile_views = $num_profile_views;
		$user->update();
		/*************************************************/

		return view('user.applicant_profile')
                        ->with('job_application', $job_application)
                        ->with('user', $user)
                        ->with('job', $job)
                        ->with('company', $company)
                        ->with('profileCv', $profileCv)
						->with('page_title', 'Applicant Profile')
						->with('form_title', 'Contact Applicant');
    }
	
	public function userProfile($id)
    {
		
		$user = User::findOrFail($id);
		$profileCv = $user->getDefaultCv();
		
		/*************************************************/
		$num_profile_views = $user->num_profile_views + 1;
		$user->num_profile_views = $num_profile_views;
		$user->update();
		/*************************************************/

		return view('user.applicant_profile')
                        ->with('user', $user)
                        ->with('profileCv', $profileCv)
						->with('page_title', 'Job Seeker Profile')
						->with('form_title', 'Contact Job Seeker');
    }
	
	public function companyFollowers()
    {
        $company = Company::findOrFail(Auth::guard('company')->user()->id);
		$userIdsArray = $company->getFollowerIdsArray();
		$users = User::whereIn('id', $userIdsArray)->get();
		
		return view('company.follower_users')
                        ->with('users', $users)
						->with('company', $company);
    }
	
	public function companyMessages()
    {
        $company = Company::findOrFail(Auth::guard('company')->user()->id);
		$messages = CompanyMessage::where('company_id', '=', $company->id)
						->orderBy('is_read', 'asc')
						->orderBy('created_at', 'desc')
						->get();
						
		return view('company.company_messages')
                        ->with('company', $company)
						->with('messages', $messages);
    }
	
	public function companyMessageDetail($message_id)
    {
        $company = Company::findOrFail(Auth::guard('company')->user()->id);
		$message = CompanyMessage::findOrFail($message_id);
		$message->update(['is_read'=>1]);
				
		return view('company.company_message_detail')
                        ->with('company', $company)
						->with('message', $message);
    }
	
}
