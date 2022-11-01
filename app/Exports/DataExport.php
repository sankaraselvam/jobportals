<?php

namespace App\Exports;
use Illuminate\Http\Request;
use App\JobApply;
use Auth;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    use Exportable;
    protected $id;

    function __construct($id) {
            $this->id = $id;
    }

    public function collection232()
    {
        return collect([
            [
                'name' => 'Povilas',
                'surname' => 'Korop',
                'email' => 'povilas@laraveldaily.com',
                'twitter' => '@povilaskorop'
            ],
            [
                'name' => 'Taylor',
                'surname' => 'Otwell',
                'email' => 'taylor@laravel.com',
                'twitter' => '@taylorotwell'
            ]
        ]);
    }

    public function headings(): array
    {
        return [
            'Name',
            'Year',
            'Salary From',
            'Salary To',
            'Address',
            'Notice Period',
            'Current Company',
            'Previous Company',
            'Degree',
            'Institution',
            'Date Completion',
            'Skills',
        ];
    }
    // public function headings12(): array
    // {
    //     return [
    //         'Subscriber Id',
    //         'Name',
    //         'Email',
    //         'Created_at',
    //     ];
    // }
    public function collection()
    {
        //$data=collect([array('name' => 'Desk', 'price' => 200, 'price1' => 200, 'price2' => 200)]);
        $job_applied_users = JobApply::with(['user','user.country','user.state','user.city','user.profileCarrer','user.profileCarrer.jobrole','user.profileEducation','user.profileEducation.degreeLevel','user.profileSkills','user.profileSkills.jobSkill','job'])
        ->whereHas('user', function($q){
            $q->whereNotNull('id');
        })
        ->where('job_id', '=', $this->id)->get();
        $candidateListArr=[];
        foreach ($job_applied_users as $appliedUsers){
            $candidateListData=[];
            if (isset($appliedUsers->user)){
                $jobSkillArr=[];
                $expData = app('App\Http\Controllers\Company\CompanyController')->getProfileExperienceList($appliedUsers->user_id); 
                foreach ($appliedUsers->user->profileSkills as $skils){
                    $jobSkillArr[]=$skils->jobSkill->job_skill;
                } 
                $candidateListData['name']=$appliedUsers->user->name;
                $candidateListData['expYears']=$expData['expYears'];
                $candidateListData['salary_from']=$appliedUsers->user->profileCarrer->salary_from;
                $candidateListData['salary_to']=$appliedUsers->user->profileCarrer->salary_to;
                $candidateListData['address']=$appliedUsers->user->street_address;
                $candidateListData['notice_period']=isset($expData['experience'][0])?$expData['experience'][0]->notice_period:'';
                $candidateListData['current']=isset($expData['experience'][0])?$expData['experience'][0]->company:'---';
                $candidateListData['previous']= isset($expData['experience'][1])?$expData['experience'][1]->company:'---';
                $candidateListData['degree']= $appliedUsers->user->profileEducation[0]->degreeLevel->degree_level;
                $candidateListData['institution']= $appliedUsers->user->profileEducation[0]->institution;
                $candidateListData['date_completion']= $appliedUsers->user->profileEducation[0]->date_completion;
                $candidateListData['skills']= implode(' , ',$jobSkillArr);
            }
            array_push($candidateListArr,$candidateListData);
        }
        return collect($candidateListArr);
    }
}