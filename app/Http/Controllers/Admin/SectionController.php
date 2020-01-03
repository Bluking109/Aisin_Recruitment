<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Section as SectionRequest;
use App\Models\Section;
use App\Models\Department;
use DataTables;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sections = Section::with('department')->select('sections.*');
            return DataTables::eloquent($sections)->toJson();
        }

        return view('admin.pages.sections.index');
    }

    /**
     * [getSection description]
     * @return [type] [description]
     */
    public function getSection(Request $request)
    {
        $search = $request->search;

        $sections = Section::where('name','like', '%'.$search.'%',)
            ->orWhere('code','like', '%'.$search.'%',)
            ->get()->toArray();

        $resp = [];

        foreach ($sections as $key => $value) {
            $resp[] = [
                'id' => 'section_'.$value['id'],
                'text' => $value['name']
            ];
        }

        if ($request->with_dept == 1) {
            $departments = Department::where('name','like', '%'.$search.'%',)
                ->orWhere('code','like', '%'.$search.'%',)
                ->get()->toArray();

            foreach ($departments as $key => $value) {
                $resp[] = [
                    'id' => 'department_'.$value['id'],
                    'text' => $value['name']
                ];
            }
        }

        return response()->json($resp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        $newSections = Section::create($request->all());

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
    public function update(SectionRequest $request, $id)
    {
        $updateDepartment = Department::findOrFail($id);
        $updateDepartment->fill([
            'code' => $request->code,
            'name' => $request->name,
            'pic' => $request->pic,
            'pic_email' => $request->pic_email
        ]);

        if ($updateDepartment->isClean()) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'no changes'
                ], 422);
            }
            return redirect()->back()->with([
                'success' => true
            ]);
        }

        $updateDepartment->save();

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
        $section = Section::findOrFail($id);
        $section->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Deleted !',
                'message' => $section['name'].' has been deleted'
            ], 200);
        };

        return redirect()->back()->with([
            'message' => 'success'
        ]);
    }
}
