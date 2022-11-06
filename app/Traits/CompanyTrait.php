<?php

namespace App\Traits;

use DB;
use File;
use ImgUploader;
use App\Company;
use App\JobApply;
use App\User;

trait CompanyTrait
{

    private function deleteCompanyLogo($id)
    {
        try {
            $company = Company::findOrFail($id);
            $image = $company->logo;
            if (!empty($image)) {
                File::delete(ImgUploader::real_public_path() . 'company_logos/thumb/' . $image);
                File::delete(ImgUploader::real_public_path() . 'company_logos/mid/' . $image);
                File::delete(ImgUploader::real_public_path() . 'company_logos/' . $image);
            }
            return 'ok';
        } catch (ModelNotFoundException $e) {
            return 'notok';
        }
    }
	
	private function getCompanyIdsAndNumJobs($limit = 16)
    {
        return DB::table('jobs')
                        ->select('company_id', DB::raw('COUNT(jobs.company_id) AS num_jobs'))
                        ->groupBy('company_id')
                        ->orderBy('num_jobs', 'DESC')
                        ->limit($limit)
                        ->get();
    }
	
	private function getIndustryIdsFromCompanies($limit = 16)
    {
		$companies = Company::select('industry_id')->active()->whereHas('jobs', function ($query) {
			$query->active()->notExpire();
		})->withCount(['jobs'=> function ($query) {
			$query->active()->notExpire();
		}])->get();		
		
		$industries_array = [];
		foreach($companies as $company)
		{
			if(isset($industries_array[$company->industry_id]))
			{
				$industries_array[$company->industry_id] = $industries_array[$company->industry_id]+$company->jobs_count;
			}else
			{
				$industries_array[$company->industry_id] = $company->jobs_count;
			}
		}
		arsort($industries_array);
		return array_slice($industries_array, 0, $limit-1, true);
    }
	
	private function getCompanySEO($company)
	{
		$description = 'Company ';
		$keywords = '';
		
		$description .= ' '.$company->name;
		$keywords .= $company->name.',';
		
		$description .= ' '.$company->getIndustry('industry');
		$keywords .= $company->getIndustry('industry').',';
		
		$description .= ' '.$company->getOwnershipType('ownership_type');
		$keywords .= $company->getOwnershipType('ownership_type').',';
		
		$description .= ' '.$company->location;
		$keywords .= $company->location.',';
		
		$description .= ' '.$company->description;
		$keywords .= $company->description.',';
		
		$description .= ' '.$company->getCountry('country');
		$keywords .= $company->getCountry('country').',';
		
		$description .= ' '.$company->getState('state');
		$keywords .= $company->getState('state').',';
		
		$description .= ' '.$company->getCity('city');
		$keywords .= $company->getCity('city').',';
		
		$seo = (object) array(
			'seo_title' => $description,
			'seo_description' => $description,
			'seo_keywords' => $keywords,
			'seo_other' => ''
		);
		return $seo;
		
	}



	public function fetchCompanyCandidateIds($job_id,$city_ids = array(), $industry_ids = array(), $institution = array(), $salary = array(), $company_ids = array(), $designation = array(),$functional_area_ids = array(), $gender_ids = array(),$orderBy = 'id', $limit = 10, $field){
		
		$query = $this->createQuery($job_id, $orderBy, $limit);
		$arrayList=[];
		if ($field=="city_ids") {
			foreach($query->user->profileCarrer->cities as $location){
				$arrayList[]=$location->id;
			}
		}
		if ($field=="industry_id") {
			$arrayList[]=$query->user->profileCarrer->industry_id;
		}
		if ($field=="institution") {
			foreach($query->user->profileEducation as $education){
				$arrayList[$education->id]=$education->institution;
			}			
		}
		if ($field=="salary") {
			$arrayList[$query->user->profileCarrer->id]=$query->user->profileCarrer->salary_from;
		}
		if ($field=="company") {
			foreach($query->user->profileExperience as $experience){
				if($experience->emp_worked_till=="present"){
					$arrayList[$experience->id]=$experience->company;
				}
			}
		}
		if ($field=="designation") {
			foreach($query->user->profileExperience as $experience){
				if(!empty($experience->title)){
					$arrayList[$experience->id]=$experience->title;
				}
			}
		}
		if ($field=="functional_area") {
			$arrayList[]=$query->user->profileCarrer->industry_id;
		}
		if ($field=="gender") {
			$arrayList[]=$query->user->gender_id;			
		}
		
		//$array = $query->pluck('users.profileCarrer')->toArray();
		// if (isset($city_ids[0])) {
		// 	$query->whereHas('user.profileCarrer', function($q) use($city_ids){
		// 		$q->whereIn('users.profileCarrer.cities.city_id', $city_ids);
		// 	});
        // }

		// $query = $this->createQuery($query, $city_ids, $orderBy, $limit);
		// if (isset($city_ids[0])) {
		// 	$query->whereHas('user.profileCarrer', function($q){
		// 		//$q->pluck('city_id');
		// 	});
		// 	$array = $query->get();
		// }
		
		return array_unique($arrayList);
	}

	public function createQuery($job_id, $orderBy, $limit)
	{		
		$query = JobApply::with(['user','user.profileCarrer','user.profileCarrer.cities','user.profileEducation','user.profileExperience'])
		->whereHas('user', function($q){
            $q->where('users.is_active', 1)->whereNotNull('id');
        })
		->where('job_id', '=', $job_id)
		->get()->first();

		//$query->where('users.is_active', 1);
        // if (isset($city_ids[0])) {
		// 	$query->whereHas('user.profileCarrer', function($q) use($city_ids){
		// 		$q->whereIn('users.profileCarrer.city_id', $city_ids);
		// 	});
        // }
		return $query;
	
	}
	
}
