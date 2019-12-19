<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HowToApply extends FormRequest
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
        return [
            'title' => 'required|max:191',
            'sub_title' => 'required|max:191',
            'content' => 'nullable|max:40000',
            'is_active' => 'required|in:1,0',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:1000'
        ];
    }
}
