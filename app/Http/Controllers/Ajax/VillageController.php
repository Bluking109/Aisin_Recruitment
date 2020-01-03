<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Village;

class VillageController extends Controller
{
    /**
     * Display listing of sub district
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $search = $request->search;
        $subDistrictId = $request->sub_district;

        $villages = Village::select('id', 'name as text')
        	->when($subDistrictId, function($q, $subDistrictId) {
        		$q->where('sub_district_id', $subDistrictId);
        	})
        	->where('name','like', '%'.$search.'%',)
        	->get();

        return response()->json($villages, 200);
    }
}
