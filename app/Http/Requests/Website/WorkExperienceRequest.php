<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class WorkExperienceRequest extends FormRequest
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
     * Create the default validator instance.
     *
     * @param  \Illuminate\Contracts\Validation\Factory  $factory
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function createDefaultValidator(ValidationFactory $factory)
    {
        $workExperiences = $this->work_experiences;
        array_walk($workExperiences, function(&$value, $key) {
             $value['salary'] = str_replace(',', '', $value['salary']);
        });

        $this->merge(['work_experiences' => $workExperiences]);

        return $factory->make(
            $this->validationData(), $this->container->call([$this, 'rules']),
            $this->messages(), $this->attributes()
        );
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
            'work_experiences' => 'array|nullable',
            'work_experiences.*.company' => 'nullable',
            'work_experiences.*.position' => 'required_with:work_experiences.*.company|max:120',
            'work_experiences.*.salary' => 'required_with:work_experiences.*.company|numeric|nullable',
            'work_experiences.*.join_date' => 'required_with:work_experiences.*.company|date|nullable',
            'work_experiences.*.end_date' => 'required_with:work_experiences.*.company|date|nullable',
            'work_experiences.*.reason_to_move' => 'required_with:work_experiences.*.company|max:500',
        ];

        if ($jobSeeker->educationLevel->isDiplomaForm()) {
            $rules['position_description'] = 'required_with:work_experiences.0.company|max:500';
            $rules['problems_and_solutions'] = 'required_with:work_experiences.0.company|max:500';
            $rules['impression_on_company'] = 'required_with:work_experiences.0.company|max:500';
            $rules['improvement_on_company'] = 'required_with:work_experiences.0.company|max:500';
            $rules['who_pushed'] = 'required_with:work_experiences.0.company|max:500';
            $rules['how_make_decisions'] = 'required_with:work_experiences.0.company|max:500';
            $rules['work_experiences.*.boss_name'] = 'required_with:work_experiences.0.company|max:120';
            $rules['work_experiences.*.boss_position'] = 'required_with:work_experiences.0.company|max:120';
            $rules['work_experiences.*.number_of_subordinates'] = 'numeric|between:0,9999|nullable';
        }

        return $rules;
    }
}
