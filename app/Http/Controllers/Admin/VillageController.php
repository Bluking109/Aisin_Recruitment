<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Village as VillageRequest;
use App\Models\Village;
use Yajra\DataTables\Facades\DataTables;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $districts = Village::with('subdistrict')->select('villages.*');
            return DataTables::eloquent($districts)->toJson();
        }

        return view('admin.pages.villages.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VillageRequest $request)
    {
        $newVillage = new Village;
        $newVillage->sub_district_id = $request->subdistrict;
        $newVillage->name = $request->name;
        $newVillage->save();

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
    public function update(VillageRequest $request, $id)
    {
        $updateVillage = Village::findOrFail($id);
        $updateVillage->fill([
            'name' => $request->name,
            'district_id' => $request->district
        ]);

        if ($updateVillage->isClean()) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'no changes'
                ], 422);
            }
            return redirect()->back()->with([
                'success' => true
            ]);
        }

        $updateVillage->save();

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
        $village = Village::findOrFail($id);
        $village->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Deleted !',
                'message' => $village['name'].' has been deleted'
            ], 200);
        };

        return redirect()->back()->with([
            'message' => 'success'
        ]);
    }
}
