<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileCareer extends Model
{

    protected $table = 'profile_career';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];

    // public function user()
    // {
    //     return $this->belongsTo('App\User', 'user_id', 'id');
    // }

    // public function getUser($field = '')
    // {
    //     if (null !== $user = $this->user()->first()) {
    //         if (empty($field))
    //             return $user;
    //         else
    //             return $user->$field;
    //     } else {
    //         return '';
    //     }
    // }
    public function industry()
    {
        return $this->belongsTo('App\Industry', 'industry_id', 'industry_id');
    }
    public function functionalArea()
    {
        return $this->belongsTo('App\FunctionalArea', 'functional_area_id', 'functional_area_id');
    }
    public function jobrole()
    {
        return $this->belongsTo('App\JobRole', 'role_id', 'role_id');
    }
    public function jobType()
    {
        return $this->belongsTo('App\JobType', 'job_type_id', 'job_type_id');
    }
    public function jobShift()
    {
        return $this->belongsTo('App\JobShift', 'job_shift_id', 'job_shift_id');
    }
    public function cities()
    {
        return $this->belongsToMany('App\City', 'profile_career_location', 'profile_career_id', 'city_id');
    }

}
