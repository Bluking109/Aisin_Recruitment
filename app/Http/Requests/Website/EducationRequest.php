<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\FormalEducation;

class EducationRequest extends FormRequest
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
        $seniorHighSchool = FormalEducation::EDU_SENIOR_HIGH_SCHOOL;
        $primarySchool = FormalEducation::EDU_PRIMARY_SCHOOL;
        $juniorHighSchool = FormalEducation::EDU_JUNIOR_HIGH_SCHOOL;
        $diploma = FormalEducation::EDU_DIPLOMA;
        $bachelor = FormalEducation::EDU_BACHELOR;
        // $master = FormalEducation::EDU_MASTER;

        $rules = [
            'educations' => 'required|array',
            'educations' . '.' . $seniorHighSchool . '.name_of_institution' => 'required|max:100',
            'educations' . '.' . $seniorHighSchool . '.major_id' => 'required|exists:majors,id',
            'educations' . '.' . $seniorHighSchool . '.end_year' => 'required|date_format:Y',
            'educations' . '.' . $seniorHighSchool . '.city' => 'required|max:100',
            'educations' . '.' . $seniorHighSchool . '.note' => 'nullable|max:300',
            'non_formal_educations' => 'array',
            'non_formal_educations.*.training_name' => 'nullable|max:150',
            'non_formal_educations.*.place' => 'required_with:non_formal_educations.*.training_name|max:130',
            'non_formal_educations.*.note' => 'nullable|max:300',
            'non_formal_educations.*.start_date' => 'required_with:non_formal_educations.*.training_name|date|nullable',
            'non_formal_educations.*.end_date' => 'required_with:non_formal_educations.*.training_name|date|nullable',
            'languages' => 'array',
            'languages.*.language' => 'nullable|max:100',
            'languages.*.writing' => 'required_with:languages.*.language|in:bad,good',
            'languages.*.reading' => 'required_with:languages.*.language|in:bad,good',
            'languages.*.grammar' => 'required_with:languages.*.language|in:bad,good',
        ];

        // Apabila jenis form  =  D4/S1
        if ($jobSeeker->educationLevel->isDiplomaForm()) {
            $rules['educations' . '.' . $diploma . '.name_of_institution'] = 'required|max:100';
            $rules['educations' . '.' . $diploma . '.major_id'] = 'required|exists:majors,id';
            $rules['educations' . '.' . $diploma . '.start_year'] = 'required|date_format:Y';
            $rules['educations' . '.' . $diploma . '.end_year'] = 'required|date_format:Y';
            $rules['educations' . '.' . $diploma . '.city'] = 'required|max:100';
            $rules['educations' . '.' . $diploma . '.grade_point'] = 'required|between:0,4|numeric';
        }

        if ($jobSeeker->educationLevel->isBachelorForm()) {
            $rules['educations' . '.' . $bachelor . '.name_of_institution'] = 'required|max:100';
            $rules['educations' . '.' . $bachelor . '.major_id'] = 'required|exists:majors,id';
            $rules['educations' . '.' . $bachelor . '.start_year'] = 'required|date_format:Y';
            $rules['educations' . '.' . $bachelor . '.end_year'] = 'required|date_format:Y';
            $rules['educations' . '.' . $bachelor . '.city'] = 'required|max:100';
            $rules['educations' . '.' . $bachelor . '.grade_point'] = 'required|between:0,4|numeric';

            $rules['educations' . '.' . $diploma . '.name_of_institution'] = 'nullable|max:100';
            $rules['educations' . '.' . $diploma . '.major_id'] = 'required_with:educations' . '.' . $diploma . '.name_of_institution|nullable|exists:majors,id';
            $rules['educations' . '.' . $diploma . '.start_year'] = 'required_with:educations' . '.' . $diploma . '.name_of_institution|date_format:Y|nullable';
            $rules['educations' . '.' . $diploma . '.end_year'] = 'required_with:educations' . '.' . $diploma . '.name_of_institution|date_format:Y|nullable';
            $rules['educations' . '.' . $diploma . '.city'] = 'required_with:educations' . '.' . $diploma . '.name_of_institution|max:100';
            $rules['educations' . '.' . $diploma . '.grade_point'] = 'required_with:educations' . '.' . $diploma . '.name_of_institution|between:0,4|numeric|nullable';

            // Untuk master sementara di komen
            // $rules['educations' . '.' . $master . '.name_of_institution'] = 'nullable|max:100';
            // $rules['educations' . '.' . $master . '.major_id'] = 'required_with:educations' . '.' . $master . '.name_of_institution|nullable|exists:majors,id';
            // $rules['educations' . '.' . $master . '.start_year'] = 'required_with:educations' . '.' . $master . '.name_of_institution|date_format:Y|nullable';
            // $rules['educations' . '.' . $master . '.end_year'] = 'required_with:educations' . '.' . $master . '.name_of_institution|date_format:Y|nullable';
            // $rules['educations' . '.' . $master . '.city'] = 'required_with:educations' . '.' . $master . '.name_of_institution|max:100';
            // $rules['educations' . '.' . $master . '.grade_point'] = 'required_with:educations' . '.' . $master . '.name_of_institution|between:0,100|numeric|nullable';
        }

        if ($jobSeeker->educationLevel->isBachelorForm() || $jobSeeker->educationLevel->isDiplomaForm()) {
            $rules['educations' . '.' . $seniorHighSchool . '.start_year'] = 'required_with:educations' . '.' . $seniorHighSchool . '.name_of_institution|date_format:Y|nullable';
            $rules['educations' . '.' . $seniorHighSchool . '.grade_point'] = 'required_with:educations' . '.' . $seniorHighSchool . '.name_of_institution|between:0,100|numeric|nullable';

            $rules['reason_choose_institute'] = 'required|max:500';
            $rules['essay'] = 'required|max:500';
        }

        // Apabila jenis Form SMA
        if ($jobSeeker->educationLevel->isHighSchoolForm()) {
            $rules['educations' . '.' . $seniorHighSchool . '.average_math_score'] = 'required|between:0,100|numeric';
            $rules['educations' . '.' . $seniorHighSchool . '.un_math_score'] = 'required|between:0,100|numeric';

            $rules['educations' . '.' . $primarySchool . '.name_of_institution'] = 'required|max:100';
            $rules['educations' . '.' . $primarySchool . '.end_year'] = 'required|date_format:Y';
            $rules['educations' . '.' . $primarySchool . '.city'] = 'required|max:100';
            $rules['educations' . '.' . $primarySchool . '.average_math_score'] = 'nullable|between:0,100|numeric';
            $rules['educations' . '.' . $primarySchool . '.un_math_score'] = 'nullable|between:0,100|numeric';
            $rules['educations' . '.' . $primarySchool . '.note'] = 'nullable|max:300';

            $rules['educations' . '.' . $juniorHighSchool . '.name_of_institution'] = 'required|max:100';
            $rules['educations' . '.' . $juniorHighSchool . '.end_year'] = 'required|date_format:Y';
            $rules['educations' . '.' . $juniorHighSchool . '.city'] = 'required|max:100';
            $rules['educations' . '.' . $juniorHighSchool . '.average_math_score'] = 'required|between:0,100|numeric';
            $rules['educations' . '.' . $juniorHighSchool . '.un_math_score'] = 'required|between:0,100|numeric';
            $rules['educations' . '.' . $juniorHighSchool . '.note'] = 'nullable|max:300';
        }

        return $rules;
    }
}
