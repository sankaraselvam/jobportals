<?php

namespace App\Traits;

use Auth;
use DB;
use Input;
use Redirect;
use Carbon\Carbon;
use App\Job;
use App\Company;
use App\JobSkill;
use App\JobSkillManager;
use App\Country;
use App\CountryDetail;
use App\State;
use App\City;
use App\CareerLevel;
use App\FunctionalArea;
use App\JobType;
use App\JobShift;
use App\Gender;
use App\JobExperience;
use App\DegreeLevel;
use App\SalaryPeriod;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\JobFormRequest;
use App\Http\Requests\Front\JobFrontFormRequest;
use App\Http\Controllers\Controller;
use App\Traits\Skills;
use App\Events\JobPosted;


trait JobTrait
{
	use Skills;

    public function deleteJob(Request $request, $id)
    {
		try {
            $job = Job::findOrFail($id);
        	$job->deleted_at = "Y";
			$job->update();
			flash('Job has been deleted!')->success();
        	return \Redirect::route('company.managejobs');
        } catch (ModelNotFoundException $e) {
            return 'notok';
        }
    }
	
	private function updateFullTextSearch($job)
	{
		$str = '';
		$str .= $job->getCompany('name');
		$str .= ' '.$job->getCountry('country');
		$str .= ' '.$job->getState('state');
		$str .= ' '.$job->getCity('city');
		$str .= ' '.$job->title;
		$str .= ' '.$job->description;
		$str .= $job->getJobSkillsStr();
		$str .= ((bool)$job->is_freelance)? ' freelance remote work from home multiple cities':'';
		$str .= ' '.$job->getCareerLevel('career_level');
		$str .= ((bool)$job->hide_salary === false)? ' '.$job->salary_from.' '.$job->salary_to:'';
		$str .= $job->getSalaryPeriod('salary_period');
		$str .= ' '.$job->getFunctionalArea('functional_area');
		$str .= ' '.$job->getJobType('job_type');
		$str .= ' '.$job->getJobShift('job_shift');
		$str .= ' '.$job->getGender('gender');
		$str .= ' '.$job->getDegreeLevel('degree_level');
		$str .= ' '.$job->getJobExperience('job_experience');
		
		$job->search = $str;
		$job->update();
	
	}
	
	private function assignJobValues($job, $request)
	{
		$industry_id=0;
        $functional_area_id=0;
        if($request->input('industry')!=""){
            $industry_id=app('App\Http\Controllers\UserController')->storeIndustry($request->input('industry'));
        }
        if($request->input('functional_area')!=""){
            $functional_area_id=app('App\Http\Controllers\UserController')->storeFunctionalArea($request->input('functional_area'));
        }

		$job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->candidate_profile = $request->input('candidate_profile');
        $job->country_id = $request->input('country_id');
        $job->state_id = $request->input('state_id');
        $job->city_id = $request->input('city_id');
        //$job->is_freelance = isset($request->input('is_freelance'))?$request->input('is_freelance'):0;
        $job->career_level_id = $request->input('career_level_id');
        $job->salary_from = (int)$request->input('salary_from');
        $job->salary_to = (int)$request->input('salary_to');
		//$job->salary_currency = isset($request->input('salary_currency'))?$request->input('salary_currency'):null;
        //$job->hide_salary = isset($request->input('hide_salary'))?$request->input('hide_salary'):0;
		
        $job->industry_id = ($industry_id==0)?$request->input('industry_id'):$industry_id;
        $job->functional_area_id = ($functional_area_id==0)?$request->input('functional_area_id'):$functional_area_id;
        $job->role_id = $request->input('role_id');
        $job->job_type_id = $request->input('job_type_id');
        $job->job_shift_id = $request->input('job_shift_id');
        $job->num_of_positions = $request->input('num_of_positions');
        $job->gender_id = $request->input('gender_id');
		$now = Carbon::now(); 
        $job->expiry_date = $now->addDays(30);
        $job->major_subject_id = $request->input('major_subject_id');
        $job->degree_level_id = $request->input('degree_level_id');
        $job->degree_type_id = $request->input('degree_type_id');
		$job->job_experience_id_from = $request->input('job_experience_id_from');
        $job->job_experience_id_to = $request->input('job_experience_id_to');
		if($request->input('walk_in')==1){
			$job->walk_in = $request->input('walk_in');
			$job->start_date = date("Y-m-d", strtotime($request->input('start_date')));;
			$job->duration = $request->input('duration');
			$job->timing = $request->input('timing');
			$job->contact_person = $request->input('contact_person');
			$job->contact_number = $request->input('contact_number');
		}
        return $job;
	}
	public function createJob()
    {

        $companies = DataArrayHelper::companiesArray();
        $countries = DataArrayHelper::defaultCountriesArray();
        $currencies = DataArrayHelper::currenciesArray();
		$careerLevels = DataArrayHelper::defaultCareerLevelsArray();
		$functionalAreas = DataArrayHelper::defaultFunctionalAreasArray();
		$jobTypes = DataArrayHelper::defaultJobTypesArray();
		$jobShifts = DataArrayHelper::defaultJobShiftsArray();
        $genders = DataArrayHelper::defaultGendersArray();
        $jobExperiences = DataArrayHelper::defaultJobExperiencesArray();
		$jobSkills = DataArrayHelper::defaultJobSkillsArray();
        $degreeLevels = DataArrayHelper::defaultDegreeLevelsArray();
		$salaryPeriods = DataArrayHelper::defaultSalaryPeriodsArray();
		$jobSkillIds = array();

        return view('admin.job.add')
                        ->with('companies', $companies)
                        ->with('countries', $countries)
						->with('currencies', array_unique($currencies))
                        ->with('careerLevels', $careerLevels)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('jobTypes', $jobTypes)
                        ->with('jobShifts', $jobShifts)
                        ->with('genders', $genders)
                        ->with('jobExperiences', $jobExperiences)
                        ->with('jobSkills', $jobSkills)
						->with('jobSkillIds', $jobSkillIds)
						->with('degreeLevels', $degreeLevels)
						->with('salaryPeriods', $salaryPeriods);
    }

    public function storeJob(JobFormRequest $request)
    {
        $job = new Job();
        $job->id = $request->input('id');
        $job->company_id = $request->input('company_id');
        $job = $this->assignJobValues($job, $request);
		$job->is_active = $request->input('is_active');
        $job->is_featured = $request->input('is_featured');
        $job->save();
		/**********************************/
		$job->slug = str_slug($job->title, '-').'-'.$job->id;
		/**********************************/
		$job->update();
        /*         * ************************************ */
		/*         * ************************************ */
        $this->storeJobSkills($request, $job->id);
		/*         * ************************************ */
		$this->updateFullTextSearch($job);
		/*         * ************************************ */

        flash('Job has been added!')->success();
        return \Redirect::route('edit.job', array($job->id));
    }
	
	

    public function editJob($id)
    {
        $companies = DataArrayHelper::companiesArray();
        $countries = DataArrayHelper::defaultCountriesArray();
        $currencies = DataArrayHelper::currenciesArray();
		$careerLevels = DataArrayHelper::defaultCareerLevelsArray();
		$functionalAreas = DataArrayHelper::defaultFunctionalAreasArray();
		$jobTypes = DataArrayHelper::defaultJobTypesArray();
		$jobShifts = DataArrayHelper::defaultJobShiftsArray();
        $genders = DataArrayHelper::defaultGendersArray();
        $jobExperiences = DataArrayHelper::defaultJobExperiencesArray();
		$jobSkills = DataArrayHelper::defaultJobSkillsArray();
        $degreeLevels = DataArrayHelper::defaultDegreeLevelsArray();
		$salaryPeriods = DataArrayHelper::defaultSalaryPeriodsArray();
		
        $job = Job::findOrFail($id);
		$jobSkillIds = $job->getJobSkillsArray();
        return view('admin.job.edit')
                        ->with('companies', $companies)
                        ->with('countries', $countries)
						->with('currencies', array_unique($currencies))
                        ->with('careerLevels', $careerLevels)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('jobTypes', $jobTypes)
                        ->with('jobShifts', $jobShifts)
                        ->with('genders', $genders)
                        ->with('jobExperiences', $jobExperiences)
						->with('jobSkills', $jobSkills)
                        ->with('jobSkillIds', $jobSkillIds)
						->with('degreeLevels', $degreeLevels)
						->with('salaryPeriods', $salaryPeriods)
                        ->with('job', $job);
    }

    public function updateJob($id, JobFormRequest $request)
    {
        $job = Job::findOrFail($id);
        $job->id = $request->input('id');
        $job->company_id = $request->input('company_id');
        $job = $this->assignJobValues($job, $request);
		$job->is_active = $request->input('is_active');
        $job->is_featured = $request->input('is_featured');
        
		/**********************************/
		$job->slug = str_slug($job->title, '-').'-'.$job->id;
		/**********************************/
		
		/*         * ************************************ */
        $job->update();
		/*         * ************************************ */
        $this->storeJobSkills($request, $job->id);
		/*         * ************************************ */
		$this->updateFullTextSearch($job);
		/*         * ************************************ */

        flash('Job has been updated!')->success();
        return \Redirect::route('edit.job', array($job->id));
    }
	
	/******************************************/
	/******************************************/
	
	public function createFrontJob()
    {
		$company = Auth::guard('company')->user();
		
		
		if(
			($company->package_end_date === null) || 
			($company->package_end_date->lt(Carbon::now())) ||
			($company->jobs_quota <= $company->availed_jobs_quota)
			)
		{
			flash(__('Please subscribe to package first'))->error();
			return \Redirect::route('company.home');
			exit;
		}

        $countries = DataArrayHelper::langCountriesArray();
        $currencies = DataArrayHelper::currenciesArray();
		$careerLevels = DataArrayHelper::langCareerLevelsArray();
		$functionalAreas = DataArrayHelper::langFunctionalAreasArray();
		$jobTypes = DataArrayHelper::langJobTypesArray();
		$jobShifts = DataArrayHelper::langJobShiftsArray();
        $genders = DataArrayHelper::langGendersArray();
        $jobExperiences = DataArrayHelper::langJobExperiencesArray();
		$jobSkills = DataArrayHelper::langJobSkillsArray();
        $majorSubjects = DataArrayHelper::langMajorSubjectsArray();
        //$degreeLevels = DataArrayHelper::langDegreeLevelsArray();
        $industry = DataArrayHelper::langIndustryArray();
		$salaryPeriods = DataArrayHelper::langSalaryPeriodsArray();
		
		$jobSkillIds = array();
		$postJobs = Job::with(['jobExperience','jobSkills.jobSkill','cities'])->where('deleted_at', 'N')->orderBy('jobs.id', 'DESC')->limit(5)->get();

		$duration = config('constants.duration');
		
        return view('job.add_edit_job')
                        ->with('countries', $countries)
						->with('currencies', array_unique($currencies))
                        ->with('careerLevels', $careerLevels)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('jobTypes', $jobTypes)
                        ->with('jobShifts', $jobShifts)
                        ->with('genders', $genders)
                        ->with('jobExperiences', $jobExperiences)
                        ->with('jobSkills', $jobSkills)
						->with('jobSkillIds', $jobSkillIds)
						//->with('degreeLevels', $degreeLevels)
						->with('majorSubjects', $majorSubjects)
						->with('industry', $industry)
						->with('salaryPeriods', $salaryPeriods)
						->with('duration', $duration)
						->with('postJobs', $postJobs);
    }

    public function storeFrontJob(Request $request)
    {
		//dd($request->all());exit;
		$company = Auth::guard('company')->user();
		
        $job = new Job();
        $job->id = $request->input('id');
        $job->company_id = $company->id;
        $job = $this->assignJobValues($job, $request);
		$job->save();
		/**********************************/
		$job->slug = str_slug($job->title, '-').'-'.$job->id;
		/**********************************/
		$job->update();
        /*         * ************************************ */
		/*         * ************************************ */
        $this->storeJobSkills($request, $job->id);
		/*         * ************************************ */
		$this->updateFullTextSearch($job);
		/*         * ************************************ */
		
		/**********************************/
		$company->availed_jobs_quota = $company->availed_jobs_quota + 1;
		$company->update();
		/**********************************/
		
		//event(new JobPosted($job));

        flash('Job has been added!')->success();
        return \Redirect::route('edit.front.job', array($job->id));
    }
	
	

    public function editFrontJob($id)
    {
		$countries = DataArrayHelper::langCountriesArray();
        $currencies = DataArrayHelper::currenciesArray();
		$careerLevels = DataArrayHelper::langCareerLevelsArray();
		$functionalAreas = DataArrayHelper::langFunctionalAreasArray();
		$jobTypes = DataArrayHelper::langJobTypesArray();
		$jobShifts = DataArrayHelper::langJobShiftsArray();
        $genders = DataArrayHelper::langGendersArray();
        $jobExperiences = DataArrayHelper::langJobExperiencesArray();
		$jobSkills = DataArrayHelper::langJobSkillsArray();
		$majorSubjects = DataArrayHelper::langMajorSubjectsArray();
        //$degreeLevels = DataArrayHelper::langDegreeLevelsArray();
		$salaryPeriods = DataArrayHelper::langSalaryPeriodsArray();
		$industry = DataArrayHelper::langIndustryArray();
		
        $job = Job::findOrFail($id);
		// dd($job);
		$jobSkillIds = $job->getJobSkillsArray();
		$duration = config('constants.duration');
	    return view('job.add_edit_job')
                        ->with('countries', $countries)
						->with('currencies', array_unique($currencies))
                        ->with('careerLevels', $careerLevels)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('jobTypes', $jobTypes)
                        ->with('jobShifts', $jobShifts)
                        ->with('genders', $genders)
                        ->with('jobExperiences', $jobExperiences)
						->with('jobSkills', $jobSkills)
                        ->with('jobSkillIds', $jobSkillIds)
						->with('majorSubjects', $majorSubjects)
						->with('salaryPeriods', $salaryPeriods)
						->with('industry', $industry)
						->with('duration', $duration)
                        ->with('job', $job);
    }

    public function updateFrontJob($id, Request $request)
    {
		//dd($request->all());
        $job = Job::findOrFail($id);
        //$job->id = $request->input('id');
        $job = $this->assignJobValues($job, $request);
		/**********************************/
		$job->slug = str_slug($job->title, '-').'-'.$id;
		/**********************************/
		
		/*         * ************************************ */
        $job->update();
		/*         * ************************************ */
        $this->storeJobSkills($request, $job->id);
		/*         * ************************************ */
		$this->updateFullTextSearch($job);
		/*         * ************************************ */

        flash('Job has been updated!')->success();
        return \Redirect::route('edit.front.job', array($job->id));
    }
	
	public static function countNumJobs($field = 'title', $value = '')
	{
		if(!empty($value))
		{
			if($field == 'title')
			{
				return DB::table('jobs')->where('title','like',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'company_id')
			{
				return DB::table('jobs')->where('company_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'industry_id')
			{
				$company_ids = Company::where('industry_id','=',$value)->where('is_active','=',1)->pluck('id')->toArray();
				return DB::table('jobs')->whereIn('company_id', $company_ids)->where('is_active','=',1)->count('id');
			}
			if($field == 'job_skill_id')
			{
				$job_ids = JobSkillManager::where('job_skill_id','=',$value)->pluck('job_id')->toArray();
				return DB::table('jobs')->whereIn('id', array_unique($job_ids))->where('is_active','=',1)->count('id');
			}
			if($field == 'functional_area_id')
			{
				return DB::table('jobs')->where('functional_area_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'careel_level_id')
			{
				return DB::table('jobs')->where('careel_level_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'job_type_id')
			{
				return DB::table('jobs')->where('job_type_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'job_shift_id')
			{
				return DB::table('jobs')->where('job_shift_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'gender_id')
			{
				return DB::table('jobs')->where('gender_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'degree_level_id')
			{
				return DB::table('jobs')->where('degree_level_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'job_experience_id')
			{
				return DB::table('jobs')->where('job_experience_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'country_id')
			{
				return DB::table('jobs')->where('country_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'state_id')
			{
				return DB::table('jobs')->where('state_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'city_id')
			{
				return DB::table('jobs')->where('city_id','=',$value)->where('is_active','=',1)->count('id');
			}
		}
	}
	
	public function scopeNotExpire($query)
    {
        return $query->whereDate('expiry_date', '>', Carbon::now());//where('expiry_date', '>=', date('Y-m-d'));
    }
}
