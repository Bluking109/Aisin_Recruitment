<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Section extends FormRequest
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
            'code' => 'required|max:50|alpha_dash|unique:sections,code',
            'name' => 'required|max:50',
            'pic' => 'required|max:50',
            'pic_email' => 'required|max:50',
            'department_id' => 'required',
        ];

        if ($this->section) {
            $concatId = ',' . $this->section;

            $rules['code'] .= $concatId;

        }

        return $rules;
    }
}
