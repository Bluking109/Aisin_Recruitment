<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Province as ProvinceRequest;
use DataTables;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $provinces = Province::select('id', 'name', 'created_at' );
            return DataTables::eloquent($provinces)->toJson();
        }

        return view('admin.pages.provinces.index');
    }

    /**
     * getProvince to select2
     * @return json
     */
    public function getProvince(Request $request)
    {
        $search = $request->search;
        $provinces = Province::select('id', 'name as text')->where('name','like', '%'.$search.'%',)->get()->toArray();
        return response()->json($provinces);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceRequest $request)
    {
        $data = $request->except('_token');
        $newProvince = Province::create($data);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Inserted !',
                'message' => $data['name'].' has been inserted'
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
    public function update(ProvinceRequest $request, $id)
    {
        $updateProvince = Province::findOrFail($id);
        $updateProvince->fill([
            'name' => $request->name
        ]);

        if ($updateProvince->isClean()) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'no changes'
                ], 422);
            }
            return redirect()->back()->with([
                'success' => true
            ]);
        }

        $updateProvince->save();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Updated !',
                'message' => $request->name.' has been updated'
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
        $province = Province::findOrFail($id);
        $province->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Deleted !',
                'message' => $province['name'].' has been deleted'
            ], 200);
        };

        return redirect()->back()->with([
            'message' => 'success'
        ]);

    }
}
