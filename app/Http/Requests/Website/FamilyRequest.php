<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\MaritalStatus;
use App\Models\Child;
use App\Models\Sibling;

class FamilyRequest extends FormRequest
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
            'marital_status_ktp' => 'required|in:'.MaritalStatus::STATUS_SINGLE.','.MaritalStatus::STATUS_ENGAGED.','.MaritalStatus::STATUS_MARRIED.','.MaritalStatus::STATUS_DIVORCED,
            'marital_status_date_ktp' => 'required_if:marital_status_ktp,'.MaritalStatus::STATUS_ENGAGED.','.MaritalStatus::STATUS_MARRIED.','.MaritalStatus::STATUS_DIVORCED.'|date|nullable',
            'marital_status_actual' => 'required|in:'.MaritalStatus::STATUS_SINGLE.','.MaritalStatus::STATUS_ENGAGED.','.MaritalStatus::STATUS_MARRIED.','.MaritalStatus::STATUS_DIVORCED,
            'marital_status_date_actual' => 'required_if:marital_status_actual,'.MaritalStatus::STATUS_ENGAGED.','.MaritalStatus::STATUS_MARRIED.','.MaritalStatus::STATUS_DIVORCED.'|date|nullable',
            'partner_name' => 'nullable|max:191',
            'partner_place_of_birth' => 'required_with:partner_name|max:100',
            'partner_date_of_birth' => 'required_with:partner_name|date|nullable',
            'partner_last_education' => 'required_with:partner_name|max:50',
            'partner_job' => 'required_with:partner_name|max:100',
            'children' => 'array|nullable',
            'children.*.name' => 'nullable|max:191',
            'children.*.place_of_birth' => 'required_with:children.*.name|max:100',
            'children.*.date_of_birth' => 'required_with:children.*.name|date|nullable',
            'children.*.gender' => 'required_with:children.*.name|in:'.Child::GENDER_MAN.','.Child::GENDER_WOMAN,
            'children.*.last_education' => 'required_with:children.*.name|max:50',
            'children.*.job' => 'required_with:children.*.name|max:100',
            'siblings' => 'array|nullable',
            'siblings.*.name' => 'nullable|max:191',
            'siblings.*.place_of_birth' => 'required_with:siblings.*.name|max:100',
            'siblings.*.date_of_birth' => 'required_with:siblings.*.name|date|nullable',
            'siblings.*.gender' => 'required_with:siblings.*.name|in:'.Sibling::GENDER_MAN.','.Sibling::GENDER_WOMAN,
            'siblings.*.last_education' => 'required_with:siblings.*.name|max:50',
            'siblings.*.job' => 'required_with:siblings.*.name|max:100',
            'father_name' => 'required|max:191',
            'father_place_of_birth' => 'required|max:100',
            'father_date_of_birth' => 'required|date',
            'father_last_education' => 'required|max:50',
            'father_job' => 'required|max:100',
            'mother_name' => 'required|max:191',
            'mother_place_of_birth' => 'required|max:100',
            'mother_date_of_birth' => 'required|date',
            'mother_last_education' => 'required|max:50',
            'mother_job' => 'required|max:100',
        ];
    }
}
