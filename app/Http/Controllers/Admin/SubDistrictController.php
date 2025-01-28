<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubDistrict as SubDistrictRequest;
use App\Models\SubDistrict;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Response;

class SubDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $subdistricts = SubDistrict::with('district')->select('sub_districts.*');
            return DataTables::eloquent($subdistricts)->toJson();
        }

        return view('admin.pages.subdistricts.index');
    }

    /**
     * getDistrict to select2
     * @return json
     */
    public function getSubDistrict(Request $request)
    {
        $search = $request->search;
        $subdistricts = SubDistrict::select('id', 'name as text')->where('name','like', '%'.$search.'%',)->get()->toArray();
        return Response::json($subdistricts);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubDistrictRequest $request)
    {
        $newSubDistrict = new SubDistrict;
        $newSubDistrict->district_id = $request->district;
        $newSubDistrict->name = $request->name;
        $newSubDistrict->save();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Inserted !',
                'message' => $request['name'].' has been inserted'
            ], 200);
        }

        return redirect()->back()->with([
            'success' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubDistrictRequest $request, $id)
    {
        $updateSubDistrict = SubDistrict::findOrFail($id);
        $updateSubDistrict->fill([
            'name' => $request->name,
            'district_id' => $request->district
        ]);

        if ($updateSubDistrict->isClean()) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'no changes'
                ], 422);
            }
            return redirect()->back()->with([
                'success' => true
            ]);
        }

        $updateSubDistrict->save();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Updated !',
                'message' => $request['name'].' has been updated'
            ], 200);
        }

        return redirect()->back()->with([
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subdistrict = SubDistrict::findOrFail($id);
        $subdistrict->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Deleted !',
                'message' => $subdistrict['name'].' has been deleted'
            ], 200);
        };

        return redirect()->back()->with([
            'message' => 'success'
        ]);
    }
}
