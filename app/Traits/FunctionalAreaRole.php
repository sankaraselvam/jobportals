<?php

namespace App\Traits;

use DB;
use App\Country;
use App\State;
use App\City;
use App\Http\Requests;
use Illuminate\Http\Request;

trait FunctionAreaRole
{
    	
	public function functionlarea()
    {
        return $this->belongsTo('App\FunctionalArea', 'id', 'functional_area_id');
    }

    public function getFunctionalAreas($field = '')
    {
		$city = $this->functionlarea()->lang()->first();
		if(null === $city){
			$city = $this->city()->first();
		}
        if(null !== $city){
			if (!empty($field)) {
				return $city->$field;
			} else {
				return $city;
			}
		}
    }
	

}
