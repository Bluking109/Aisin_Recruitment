<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Province;

class ProvinceController extends Controller
{
    /**
     * Display listing of education level
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $search = $request->search;
        $provinces = Province::select('id', 'name as text')
        	->where('name','like', '%'.$search.'%',)
        	->get();

        return response()->json($provinces, 200);
    }
}
