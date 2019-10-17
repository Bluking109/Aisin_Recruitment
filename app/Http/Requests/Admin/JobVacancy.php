<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Department;
use App\Models\Section;
use App\Models\JobVacancy as JobVacancyModel;

class JobVacancy extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $secDept = [];

        $depts = Department::select('id')->get();
        $secs = Section::select('id')->get();

        foreach ($depts as $value) {
            $secDept[] = 'department_' . $value->id;
        }

        foreach ($secs as $value) {
            $secDept[] = 'section_' . $value->id;
        }

        $rules = [
            'position_id' => 'required|exists:positions,id',
            'section' => 'required|in:' . implode(',', $secDept),
            'education_level_id' => 'required|exists:education_levels,id',
            'open_date' => 'required|date',
            'close_date' => 'required|date',
            'gender' => 'required|in:' . implode(',', JobVacancyModel::getGender()),
            'min_gpa' => 'required|numeric',
            'descriptions' => 'required|max:30000',
            'image' => 'required',
            'stages' => 'required',
            'stages.*' => 'exists:recruitment_stages,id',
            'requirements' => 'required|max:30000'
        ];

        return $rules;
    }
}
