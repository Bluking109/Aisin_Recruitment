<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EducationLevel;

class EducationLevelController extends Controller
{
    /**
     * Display listing of education level
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $search = $request->search;
        $educationLevels = EducationLevel::select('id', 'name as text', 'form_type')
        	->where('name','like', '%'.$search.'%',)
        	->get();

        return response()->json($educationLevels, 200);
    }
}
