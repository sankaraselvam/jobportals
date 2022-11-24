<?php

namespace App\Http\Controllers;

use DB;
use Input;
use Form;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Traits\CountryStateCity;

class AjaxController extends Controller
{

    use CountryStateCity;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
	
	public function filterDefaultStates(Request $request)
    {
        $country_id = $request->input('country_id');
        $state_id = $request->input('state_id');
		$new_state_id = $request->input('new_state_id', 'state_id');

        $states = DataArrayHelper::defaultStatesArray($country_id);

        $dd = Form::select('state_id', ['' => __('Select State')] + $states, $state_id, array('id' => $new_state_id, 'class' => 'form-control'));
        echo $dd;
    }

    public function filterDefaultRoles(Request $request)
    {
        $functional_area_id = $request->input('functional_area_id');
        $role_id = $request->input('role_id');

        $roles = DataArrayHelper::defaultRolesArray($functional_area_id);

        $dd = Form::select('role_id', ['' => 'Select Roles'] + $roles, $role_id, array('id' => 'role_id', 'class' => 'form-control basic-select'));
        echo $dd;
    }
	
    public function filterDefaultCities(Request $request)
    {
        $state_id = $request->input('state_id');
        $city_id = $request->input('city_id');

        $cities = DataArrayHelper::defaultCitiesArray($state_id);

        $dd = Form::select('city_id', ['' => 'Select City'] + $cities, $city_id, array('id' => 'city_id', 'class' => 'form-control'));
        echo $dd;
    }
	
	/********************************************/
	
	public function filterLangStates(Request $request)
    {
        $country_id = $request->input('country_id');
        $state_id = $request->input('state_id');
		$new_state_id = $request->input('new_state_id', 'state_id');

        $states = DataArrayHelper::langStatesArray($country_id);

        $dd = Form::select('state_id', ['' => __('Select State')] + $states, $state_id, array('id' => $new_state_id, 'class' => 'form-control basic-select'));
        echo $dd;
    }
	
    public function filterLangCities(Request $request)
    {
        $state_id = $request->input('state_id');
        $city_id = $request->input('city_id');

        $cities = DataArrayHelper::langCitiesArray($state_id);
		
        $dd = Form::select('city_id', ['' => 'Select City'] + $cities, $city_id, array('id' => 'city_id', 'class' => 'form-control  basic-select'));
        echo $dd;
    }
	
	/********************************************/
	
	public function filterStates(Request $request)
    {
        $country_id = $request->input('country_id');
        $state_id = $request->input('state_id');
		$new_state_id = $request->input('new_state_id', 'state_id');

        $states = DataArrayHelper::langStatesArray($country_id);

        $dd = Form::select('state_id[]', ['' => __('Select State')] + $states, $state_id, array('id' => $new_state_id, 'class' => 'form-control' ));
        echo $dd;
    }
	
    public function filterCities(Request $request)
    {
        $state_id = $request->input('state_id');
        $city_id = $request->input('city_id');

        $cities = DataArrayHelper::langCitiesArray($state_id);
		
        $dd = Form::select('city_id[]', ['' => 'Select City'] + $cities, $city_id, array('id' => 'city_id', 'class' => 'form-control'));
        echo $dd;
    }
	
	/********************************************/
	
	public function filterDegreeLevels(Request $request)
    {
        $degree_level_id = $request->input('degree_level_id');
        $major_subject_id = $request->input('major_subject_id');
		
        $degreeLevels = DataArrayHelper::langDegreelevelsArray($major_subject_id);
		
        $dd = Form::select('degree_level_id', ['' => 'Select degree level'] + $degreeLevels, $degree_level_id, array('id' => 'degree_level_id', 'class' => 'form-control basic-select'));
        echo $dd;
    }

	public function filterDegreeTypes(Request $request)
    {
        $degree_level_id = $request->input('degree_level_id');
        $degree_type_id = $request->input('degree_type_id');
		
        $degreeTypes = DataArrayHelper::langDegreeTypesArray($degree_level_id);
		
        $dd = Form::select('degree_type_id', ['' => 'Select degree type'] + $degreeTypes, $degree_type_id, array('id' => 'degree_type_id', 'class' => 'form-control basic-select'));
        echo $dd;
    }
	
}
