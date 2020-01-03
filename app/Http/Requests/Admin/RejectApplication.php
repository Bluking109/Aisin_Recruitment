<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RejectApplication extends FormRequest
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
            'job_vacancy' => [
                'nullable',
                'exists:job_vacancies,id'
            ],
            'date_test' => [
                'required_with:job_vacancy',
                'nullable',
                'date',
            ],
            'time_test' => [
                'required_with:job_vacancy',
                'nullable',
                "regex:/^(?:2[0-4]|[01][1-9]|10):([0-5][0-9])$/",
            ]
        ];
    }
}
