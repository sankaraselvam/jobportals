<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
	protected $table = 'universityname';
    public $timestamps = true;
    protected $guarded = ['univid'];
	
}
