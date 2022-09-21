<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileExperienceSkills extends Model
{

    protected $table = 'profile_experiences_skills';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];
}
