<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JobVacancy extends FormRequest
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
        $rules = [
            'position_id' => 'required|numeric',
            'education_level_id' => 'required|numeric',
            'open_date' => 'required|date',
            'close_date' => 'required|date',
            'gender' => 'required|in:1,2,3',
            'min_gpa' => 'required|numeric',
            'descriptions' => 'required',
            'requirements' => 'required'
        ];

        if ($this->jobvacancy) {
            $concatId = ',' . $this->jobvacancy;

            $rules['name'] .= $concatId;

        }

        return $rules;
    }
}
