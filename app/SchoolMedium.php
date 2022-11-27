<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolMedium extends Model
{
	protected $table = 'school_medium';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];
	
}

