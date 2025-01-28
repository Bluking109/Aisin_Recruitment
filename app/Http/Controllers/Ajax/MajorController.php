<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\EducationLevel;

class MajorController extends Controller
{
    /**
     * Display listing of education level
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $search = $request->search;
        $type = $request->type;

        if ($educationLevel = $request->education_level) {
        	if ($educationLevel = EducationLevel::find($educationLevel)) {
        		if ($educationLevel->isHighSchoolForm()) {
        			$type = Major::TYPE_HIGH_SCHOOL;
        		} elseif ($educationLevel->isDiplomaForm() || $educationLevel->isBachelorForm()) {
        			$type = Major::TYPE_DIPLOMA;
        		}
        	}
        }

        $majors = Major::select('id', 'name as text', 'type')
        	->when($type, function($q) use($type) {
        		$q->where('type', $type);
        	})
        	->where('name','like', '%'.$search.'%',)
        	->get();

        return response()->json($majors, 200);
    }
}
