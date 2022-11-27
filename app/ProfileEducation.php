<?php

namespace App;

use App\Traits\CountryStateCity;
use Illuminate\Database\Eloquent\Model;

class ProfileEducation extends Model
{
	use CountryStateCity;

    protected $table = 'profile_educations';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function getUser($field = '')
    {
        if (null !== $user = $this->user()->first()) {
            if (empty($field))
                return $user;
            else
                return $user->$field;
        } else {
            return '';
        }
    }

    public function majorSubject()
    {
        return $this->belongsTo('App\MajorSubject', 'major_subject_id', 'major_subject_id');
    }

    public function getMajorSubject($field = '')
    {
		$majorSubject = $this->majorSubject()->lang()->first();
		if(null === $majorSubject){
			$majorSubject = $this->majorSubject()->first();
		}
        if(null !== $majorSubject){
            if (empty($field))
                return $majorSubject;
            else
                return $majorSubject->$field;
        } else {
            return '';
        }
    }
	
	public function degreeLevel()
    {
        return $this->belongsTo('App\DegreeLevel', 'degree_level_id', 'degree_level_id');
    }

    public function getDegreeLevel($field = '')
    {
		$degreeLevel = $this->degreeLevel()->lang()->first();
		if(null === $degreeLevel){
			$degreeLevel = $this->degreeLevel()->first();
		}
        if(null !== $degreeLevel){
            if (empty($field))
                return $degreeLevel;
            else
                return $degreeLevel->$field;
        } else {
            return '';
        }
    }
	
	public function degreeType()
    {
        return $this->belongsTo('App\DegreeType', 'degree_type_id', 'degree_type_id');
    }

    public function getDegreeType($field = '')
    {
		$degreeType = $this->degreeType()->lang()->first();
		if(null === $degreeType){
			$degreeType = $this->degreeType()->first();
		}
        if(null !== $degreeType){
            if (empty($field))
                return $degreeType;
            else
                return $degreeType->$field;
        } else {
            return '';
        }
    }

    public function university()
    {
        return $this->belongsTo('App\University', 'university_id', 'univid');
    }

    public function getUniversity($field = '')
    {
		$university = $this->university()->first();
		if(null === $university){
			$university = $this->university()->first();
		}
        if(null !== $university){
            if (empty($field))
                return $university;
            else
                return $university->$field;
        } else {
            return '';
        }
    }

    public function board()
    {
        return $this->belongsTo('App\Board', 'board_id', 'boardid');
    }

    public function getBoard($field = '')
    {
		$board = $this->board()->first();
		if(null === $board){
			$board = $this->board()->first();
		}
        if(null !== $board){
            if (empty($field))
                return $board;
            else
                return $board->$field;
        } else {
            return '';
        }
    }

    public function schoolMedium()
    {
        return $this->belongsTo('App\SchoolMedium', 'medium_id', 'id');
    }

    public function getMedium($field = '')
    {
		$medium = $this->schoolMedium()->first();
		if(null === $medium){
			$medium = $this->schoolMedium()->first();
		}
        if(null !== $medium){
            if (empty($field))
                return $medium;
            else
                return $medium->$field;
        } else {
            return '';
        }
    }
	
	public function resultType()
    {
        return $this->belongsTo('App\ResultType', 'result_type_id', 'result_type_id');
    }

    public function getResultType($field = '')
    {
		$resultType = $this->resultType()->lang()->first();
		if(null === $resultType){
			$resultType = $this->resultType()->first();
		}
        if(null !== $resultType){
            if (empty($field))
                return $resultType;
            else
                return $resultType->$field;
        } else {
            return '';
        }
    }
	
	public function profileEducationMajorSubjects()
    {
        return $this->hasMany('App\ProfileEducationMajorSubject', 'profile_education_id', 'id');
    }
	
	public function getProfileEducationMajorSubjectsArray()
    {
        return $this->profileEducationMajorSubjects->pluck('major_subject_id')->toArray();
    }
	
	public function getProfileEducationMajorSubjectsStr()
    {
        $majorSubjects = $this->profileEducationMajorSubjects;
		if(null !== $majorSubjects)
		{
			$majorSubjectArray = [];
			foreach($majorSubjects as $profileEduMajorSubject)
			{
				$majorSubjectArray[] = $profileEduMajorSubject->getMajorSubject('major_subject');				
			}
		}
		return implode(', ', $majorSubjectArray);
    }

}
