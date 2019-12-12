<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\OtherRecruitment;

class OtherRequest extends FormRequest
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
        $jobSeeker = auth()->user();

        $rules = [
            'hobby' => 'required|max:500',
            'fill_spare_time' => 'required|max:500',
            'strong_point' => 'required|max:500',
            'weak_point' => 'required|max:500',
            'agreement' => 'required|in:1',
            'in_another_recruitment_process' => 'required|in:1,0',
            'other_recruitments.*.organizer' => 'required_if:in_another_recruitment_process,1|max:191',
            'other_recruitments.*.is_astra' => 'required_if:in_another_recruitment_process,1|in:0,1',
            'other_recruitments.*.process' => 'required_if:in_another_recruitment_process,1|in:' . implode(',', OtherRecruitment::getProcessId()),
            'other_recruitments.*.place' => 'required_if:in_another_recruitment_process,1|max:191',
            'other_recruitments.*.date' => 'required_if:in_another_recruitment_process,1|date|nullable',
            'other_recruitments.*.position' => 'required_if:in_another_recruitment_process,1|max:191',
            'other_recruitments.*.status' => 'required_if:in_another_recruitment_process,1|in:' . implode(',', OtherRecruitment::geSatusId()),
            'had_disease' => 'required|in:1,0',
            'diseases' => 'required_if:had_disease,1|array',
            'diseases.*.name' => 'required_if:had_disease,1|in:' . implode(',', config('aiia.diseases')),
            'diseases.*.from_date' => 'required_if:had_disease,1|date',
            'diseases.*.end_date' => 'required_if:had_disease,1|date',
            'diseases.*.note' => 'nullable|max:200'
        ];

        if ($jobSeeker->educationLevel->isDiplomaForm()) {
            $rules['use_glasses'] = 'required|in:1,0';
            $rules['right_eye_type'] = 'required_if:with_glasses,1|in:minus,plus,silinder';
            $rules['left_eye_type'] = 'required_if:with_glasses,1|in:minus,plus,silinder';
            $rules['right_eye'] = 'required_if:with_glasses,1|numeric';
            $rules['left_eye'] = 'required_if:with_glasses,1|numeric';
        }

        return $rules;
    }
}
