<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;

class DistrictController extends Controller
{
    /**
     * Display listing of education level
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $search = $request->search;
        $provinceId = $request->province;

        $districts = District::select('id', 'name as text')
        	->when($provinceId, function($q, $provinceId) {
        		$q->where('province_id', $provinceId);
        	})
        	->where('name','like', '%'.$search.'%',)
        	->get();

        return response()->json($districts, 200);
    }
}
