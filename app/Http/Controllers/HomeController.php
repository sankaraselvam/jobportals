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
        $user = User::findOrFail(Auth::user()->id);
        $skill = ProfileSkill::where('user_id',Auth::user()->id)->pluck('job_skill_id')->toArray();
        $jobSkil = JobSkillManager::with(['job','job.company','job.state','job.city','jobSkill','job.jobType'])
        // ->whereHas('jobSkills', function($query) use ($job_skill_ids){
        //     $query->whereIn('job_skill_id',$job_skill_ids);	
        // })
        ->has('job')
        ->whereIn('job_skill_id',$skill)
        ->get();
        // dd($user);
        return view('home')
                ->with('user', $user)
                ->with('recommandedJobs', $jobSkil);
    }

}
