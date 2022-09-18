<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileCareerLocation extends Model
{

    protected $table = 'profile_career_location';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];
}
