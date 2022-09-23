<?php

namespace App;

use App\Traits\CountryStateCity;
use Illuminate\Database\Eloquent\Model;

class ProfileExperience extends Model
{
	use CountryStateCity;

    protected $table = 'profile_experiences';
	
	public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at', 'date_start', 'date_end'];
	
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
    public function jobRole()
    {
        return $this->belongsTo('App\JobRole', 'role_id', 'role_id');
    }
    public function profileExperienceSkills()
    {
        return $this->hasMany('App\ProfileExperienceSkills', 'profile_experiences_id', 'id');
    }
}
