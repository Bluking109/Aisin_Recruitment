<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Announcement extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = [
            'is_active' => 'required|in:1,0',
            'banner' => 'required|mimes:jpg,jpeg,png,gif|max:1000'
        ];

        if ($this->announcement) {
            $rule['banner'] = 'nullable';
        }

        return $rule;
    }
}
