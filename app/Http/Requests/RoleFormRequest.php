<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RoleFormRequest extends Request
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
                    $role_unique = '';
                    if ($id > 0) {
                        $role_unique = ',id,' . $id;
                    }
                    return [
                        'role' => 'required|unique:role' . $role_unique,
                        'functional_area_id' => 'required_if:is_default,0',
                        'is_active' => 'required',
                        'is_default' => 'required',
                        'lang' => 'required',
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'role.required' => 'Please enter Role.',
            'functional_area_id.required_if' => 'Please select default/fallback Functional Area.',
            'is_default.required' => 'Is this Role default?',
            'is_active.required' => 'Please select status.',
            'lang.required' => 'Please select language.',
        ];
    }

}
