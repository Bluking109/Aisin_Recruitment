<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Degree as DegreeRequest;
use App\Models\Degree;
use Illuminate\Support\Facades\Hash;
use DataTables;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $degrees = Degree::select('id', 'name', 'created_at' );
            return DataTables::eloquent($degrees)->toJson();
        }

        return view('admin.pages.degrees.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DegreeRequest $request)
    {
        $newDegree = Degree::create($request->all());

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
    public function update(DegreeRequest $request, $id)
    {
        $updateDegree = Degree::findOrFail($id);
        $updateDegree->fill([
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address
        ]);

        if ($updateDegree->isClean()) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'At least one value must change'
                ], 402);
            }
            return redirect()->back()->with([
                'success' => true
            ]);
        }

        $updateDegree->save();

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
        $degree = Degree::findOrFail($id);
        $degree->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Deleted !',
                'message' => $degree['name'].' has been deleted'
            ], 200);
        };

        return redirect()->back()->with([
            'message' => 'success'
        ]);
    }
}
