<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Department as DepartmentRequest;
use App\Models\Department;
use Yajra\DataTables\Facades\DataTables;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $departments = Department::select('id', 'code', 'name', 'pic', 'pic_email', 'created_at' );
            return DataTables::eloquent($departments)->toJson();
        }

        return view('admin.pages.departments.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $newDepartement = Department::create($request->all());

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
     * [getDepartment description]
     * @return [type] [description]
     */
    public function getDepartment(Request $request)
    {
        $search = $request->search;
        $departments = Department::select('id', 'name as text')->where('name','like', '%'.$search.'%',)->get()->toArray();
        return response()->json($departments);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
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
        $department = Department::findOrFail($id);
        $department->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Deleted !',
                'message' => $department['name'].' has been deleted'
            ], 200);
        };

        return redirect()->back()->with([
            'message' => 'success'
        ]);
    }
}
