<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EducationLevel as EducationLevelRequest;
use App\Models\EducationLevel;
use Illuminate\Support\Facades\Hash;
use DataTables;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $educationLevels = EducationLevel::select('id', 'name', 'form_type', 'created_at' );
            return DataTables::eloquent($educationLevels)->toJson();
        }

        return view('admin.pages.education_levels.index');
    }

    /**
     * [getEducationLevel description]
     * @return [type] [description]
     */
    public function getEducationLevel(Request $request)
    {
        $search = $request->search;
        $educationLevels = EducationLevel::select('id', 'name as text')
            ->where('name','like', '%'.$search.'%',)
            ->get();
        return response()->json($educationLevels);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationLevelRequest $request)
    {
        $newEducationLevel = EducationLevel::create($request->all());

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
    public function update(EducationLevelRequest $request, $id)
    {
        $updateEducationLevel = EducationLevel::findOrFail($id);
        $updateEducationLevel->fill([
            'name' => $request->name,
            'form_type' => $request->form_type
        ]);

        if ($updateEducationLevel->isClean()) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'At least one value must change'
                ], 422);
            }
            return redirect()->back()->with([
                'success' => true
            ]);
        }

        $updateEducationLevel->save();

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
        $educationLevel = EducationLevel::findOrFail($id);
        $educationLevel->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Deleted !',
                'message' => $educationLevel['name'].' has been deleted'
            ], 200);
        };

        return redirect()->back()->with([
            'message' => 'success'
        ]);
    }
}
