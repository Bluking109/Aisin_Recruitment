<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class SocialActivityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'has_friend' => 'required|in:1,0',
            'friends' => 'required_if:has_friend,1',
            'friends.*.name' => 'required_if:has_friend,1|max:191',
            'friends.*.position' => 'required_if:has_friend,1|max:191',
            'friends.*.telephone_number' => 'required_if:has_friend,1|max:191',
            'friends.*.relationship' => 'required_if:has_friend,1|max:191',
            'organizations' => 'array|nullable',
            'organizations.*.name' => 'nullable|max:191',
            'organizations.*.place' => 'required_with:organizations.*.name|max:191',
            'organizations.*.position' => 'required_with:organizations.*.name|max:191',
            'organizations.*.start_date' => 'required_with:organizations.*.name|date|nullable',
            'organizations.*.end_date' => 'required_with:organizations.*.name|date|nullable'
        ];
    }
}
