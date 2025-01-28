<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Role extends FormRequest
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
            'name' => 'required|max:50|alpha_dash|unique:roles,name',
            'display_name' => 'required|max:50',
            'guard_name' => 'required|max:50|in:web,api',
            'permissions' => 'array|nullable',
            'permissions.*' => 'exists:permissions,name',
        ];

        if ($this->role) {
            $concatId = ',' . $this->role;

            $rules['name'] .= $concatId;

        }

        return $rules;
    }
}
