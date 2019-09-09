<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\JobSeeker;
use Illuminate\Validation\Rule;

class PersonalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('job_seekers')->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "deleted_photo" => "nullable",
            "name" => "required|max:120",
            "identity_number" => "required|min:16|max:16|unique:job_seekers,identity_number,". auth()->id(),
            "place_of_birth" => "required|max:100",
            "date_of_birth" => 'required|date',
            "gender" => "required|in:".JobSeeker::GENDER_MAN.','.JobSeeker::GENDER_WOMAN,
            "address" => "required",
            "province_address_id" => "required", // hanya untuk nilai balikan
            "district_address_id" => "required", // hanya untuk nilai balikan
            "sub_district_address_id" => "required", // hanya untuk nilai balikan
            "address_village_id" => "required|exists:villages,id",
            "address_telephone_number" => "nullable|max:16|regex:/^[0-9 ]+$/",
            "parent_telephone_number" => "nullable|max:16|regex:/^[0-9 ]+$/",
            "domicile" => "required",
            "province_domicile_id" => "required",
            "district_domicile_id" => "required",
            "sub_district_domicile_id" => "required",
            "domicile_village_id" => "required|exists:villages,id",
            "driving_licences" => "nullable|array",
            "driving_licences.*.type" => "required_with:driving_licences.*.value|in:A,B,C",
            "driving_licences.*.value" => "required_with:driving_licences.*.type|max:16",
            "domicile_telephone_number" => "nullable|max:16|regex:/^[0-9 ]+$/",
            "handphone_number" => "required|max:16|regex:/^[0-9 ]+$/",
            "blood_type" => "required|in:A,B,AB,O",
            "religion" => "required|in:".JobSeeker::RELIGION_ISLAM.','.JobSeeker::RELIGION_HINDU.','.JobSeeker::RELIGION_BUDHA.','.JobSeeker::RELIGION_KATOLIK.','.JobSeeker::RELIGION_PROTESTAN,
            "height" => "required|numeric|min:1",
            "weight" => "required|numeric|min:1",
            "clothes_size" => "required|in:M,L,XL",
            "pants_size" => "required|numeric|between:28,35",
            "shoe_size" => "required|numeric|between:36,48",
            "photo" => [
                "image",
                Rule::requiredIf(!auth()->user()->photo),
                "max:1000"
            ],
        ];
    }
}
