<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class About extends FormRequest
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
        return [
            'title' => 'required|max:191',
            'content' => 'required|max:40000',
            'is_active' => 'required|in:1,0',
            'images' => 'array|nullable',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif|max:1000',
        ];
    }
}
