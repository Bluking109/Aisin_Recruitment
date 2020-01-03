<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubDistrict extends FormRequest
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
            'name' => 'required|unique:sub_districts,name',
            'district' => 'required|numeric'

        ];

        if ($this->subdistrict) {
            $concatId = ',' . $this->subdistrict;

            $rules['name'] .= $concatId;
        }

        return $rules;
    }
}
