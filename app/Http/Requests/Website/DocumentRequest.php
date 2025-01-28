<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DocumentRequest extends FormRequest
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
            'cv' => [
                'bail',
                'file',
                Rule::requiredIf(!$this->attributeExist('cv')),
                'mimes:pdf,jpg,jpeg,doc,docx',
                'max:300'
            ],
            'certificate' => [
                'bail',
                'file',
                Rule::requiredIf(!$this->attributeExist('certificate')),
                'mimes:pdf,jpg,jpeg',
                'max:300'
            ],
            'transcripts' => [
                'bail',
                'file',
                Rule::requiredIf(!$this->attributeExist('transcripts')),
                'mimes:pdf,jpg,jpeg',
                'max:300'
            ],
            'ktp' => [
                'bail',
                'file',
                Rule::requiredIf(!$this->attributeExist('ktp')),
                'mimes:jpg,jpeg',
                'max:200'
            ],
            'npwp' => [
                'bail',
                'file',
                'nullable',
                'mimes:jpg,jpeg',
                'max:200'
            ],
            'kk' => [
                'bail',
                'file',
                Rule::requiredIf(!$this->attributeExist('kk')),
                'mimes:jpg,jpeg',
                'max:200'
            ],
        ];
    }

    /**
     * Untuk mencari apakah attribute exist atau tidak
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    private function attributeExist($name)
    {
        $jobSeeker = auth()->user();

        if ($document = $jobSeeker->document) {
            if ($document->{$name}) {
                return true;
            }
        }

        return false;
    }
}
