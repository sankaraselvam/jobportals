<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JobFormRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'PUT':
            case 'POST': {

                    $id = (int) $this->input('id', 0);
                    $job_unique = '';
                    if ($id > 0) {
                        $job_unique = ',id,' . $id;
                    }
                    return [
                        "id" => "",
						"company_id" => "required",
						"title" => "required",
						"description" => "required|max:1000",
						"candidate_profile" => "required|max:250",
						"skills" => "required",
						"country_id" => "required",
						"state_id" => "required",
						"city_id" => "required",
						"job_experience_id_from" => "required",
						"job_experience_id_to" => "required",
						//"is_freelance" => "required",
						"career_level_id" => "required",
						"salary_from" => "required",
						"salary_to" => "required",
						//"salary_currency" => "required",
						//"salary_period_id" => "required",
						//"hide_salary" => "required",
						"industry_id" => "required",
						"functional_area_id" => "required",
						"role_id" => "required",
						"job_type_id" => "required",
						"job_shift_id" => "required",
						"num_of_positions" => "required",
						//"gender_id" => "required",
						"expiry_date" => "required",
						"degree_level_id" => "required",
						//"job_experience_id" => "required",
						//"is_active" => "required",
						//"is_featured" => "required",
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'company_id.required' => 'Please select Company.',
			'title.required' => 'Please enter Job title / designation .',
			'description.required' => 'Please enter Job description.',
			'description.max' => 'The Job description may not be greater than 1000 characters.',
			'candidate_profile.required' => 'Please enter profile.',
			'candidate_profile.max' => 'The profile may not be greater than 250 characters.',
			'skills.required' => 'Please enter Job skills.',
			'country_id.required' => 'Please select Country.',
			'state_id.required' => 'Please select State.',
			'city_id.required' => 'Please select City.',
			'job_experience_id_from.required' => 'Please select Min Experience.',
			'job_experience_id_to.required' => 'Please select Max Experience.',
			//'is_freelance.required' => 'Is this freelance Job?',
			'career_level_id.required' => 'Please select Career level.',
			'salary_from.required' => 'Please select salary from.',
			'salary_to.required' => 'Please select salary to.',
			//'salary_currency.required' => 'Please select salary currency.',
			//'salary_period_id.required' => 'Please select salary period.',
			//'hide_salary.required' => 'Is salary hidden?',
			'industry_id.required' => 'Please select industry.',
			'functional_area_id.required' => 'Please select functional area.',
			'role_id.required' => 'Please select functional role.',
			'job_type_id.required' => 'Please select job type.',
			'job_shift_id.required' => 'Please select job shift.',
			'num_of_positions.required' => 'Please select number of positions.',
			'gender_id.required' => 'Please select gender.',
			//'expiry_date.required' => 'Please enter Job expiry date.',
			'degree_level_id.required' => 'Please select degree level.',
			//'job_experience_id.required' => 'Please select job experience.',
			//'is_active.required' => 'Is this Job active?',
			//'is_featured.required' => 'Is this Job featured?',
        ];
    }

}
