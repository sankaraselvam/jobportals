<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Redirect;
use App\Job;
use App\Company;
use App\JobSkill;
use App\JobSkillManager;
use App\ProfileSkill;
use App\User;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill = ProfileSkill::where('user_id',Auth::user()->id)->pluck('job_skill_id')->toArray();
        $jobSkill = JobSkillManager::select('manage_job_skills.job_id')
        ->whereIn('manage_job_skills.job_skill_id',$skill)
        ->groupBy('manage_job_skills.job_id')
        ->orderBy('manage_job_skills.job_id','DESC')
        ->with(['job','job.recommandedJobsSkills','job.company','job.state','job.city','job.jobType'])
        // ->whereHas('jobSkills', function($query) use ($job_skill_ids){
        //     $query->whereIn('job_skill_id',$job_skill_ids);	
        //,'job.company','job.state','job.city','jobSkill','job.jobType'
        // })
        ->has('job')        
        ->get();
        // dd($jobSkill);
        return view('home')
                ->with('user', Auth::user())
                ->with('recommandedJobs', $jobSkill);
    }

}
