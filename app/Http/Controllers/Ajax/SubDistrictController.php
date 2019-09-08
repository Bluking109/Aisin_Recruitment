<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubDistrict;

class SubDistrictController extends Controller
{
    /**
     * Display listing of sub district
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $search = $request->search;
        $districtId = $request->district;

        $subDistricts = SubDistrict::select('id', 'name as text')
        	->when($districtId, function($q, $districtId) {
        		$q->where('district_id', $districtId);
        	})
        	->where('name','like', '%'.$search.'%',)
        	->get();

        return response()->json($subDistricts, 200);
    }
}
