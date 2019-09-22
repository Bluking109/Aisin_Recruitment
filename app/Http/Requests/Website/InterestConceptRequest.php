<?php

namespace App\Http\Requests\Website;

use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\InterestConcept;

class InterestConceptRequest extends FormRequest
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
     * Create the default validator instance.
     *
     * @param  \Illuminate\Contracts\Validation\Factory  $factory
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function createDefaultValidator(ValidationFactory $factory)
    {
        $this->merge(['expected_salary' => str_replace(',', '', $this->expected_salary)]);

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
            'working_motivation' => 'required|max:500|min:5',
            'working_reason' => 'required|max:500|min:5',
            'expected_facility' => 'required|max:500|min:5',
            'join_date' => 'required|date',
            'expected_salary' => 'required|numeric',
            'field_of_works' => 'required|array',
            'field_of_works.*' => 'required|in:' . implode(',', config('aiia.sections')),
        ];

        if ($jobSeeker->educationLevel->isAssociateForm()) {
            $rules['future_goals'] = 'required|max:500|min:5';
            $rules['place_outside'] = 'required|in:' . InterestConcept::PLACE_OUTSIDE_YES . ',' . InterestConcept::PLACE_OUTSIDE_NO;
            $rules['favored_environment'] = 'required|in:' . implode(',', config('aiia.working_environments')) . ',other';
            $rules['favored_environment_other'] = 'required_if:favored_environment,other|max:100';
            $rules['unfavored_environment'] = 'required|in:' . implode(',', config('aiia.working_environments')) . ',other';
            $rules['unfavored_environment_other'] = 'required_if:unfavored_environment,other|max:100';
            $rules['like_people'] = 'required|max:500';
            $rules['dificult_decisions'] = 'required|max:500';
        }

        if ($jobSeeker->educationLevel->isHighSchoolForm()) {
            $rules['expertise'] = 'required|max:500|min:5';
        }

        return $rules;
    }
}
