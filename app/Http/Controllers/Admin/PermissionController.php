<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Permission as PermissionRequest;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $permissions = Permission::select('name', 'display_name', 'guard_name', 'created_at');
            return DataTables::eloquent($permissions)->toJson();
        }

        return view('admin.pages.permissions.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $newPermission = Permission::create($request->all());

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
    public function update(PermissionRequest $request, $id)
    {
        $updatePermission = Permission::findOrFail($id);
        $updatePermission->fill($request->except(['_token']));
        if ($updatePermission->isClean()) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'no changes'
                ], 422);
            }
            return redirect()->back()->with([
                'success' => true
            ]);
        }

        $updatePermission->save();

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
        $permission = Permission::findOrFail($id);
        $permission->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Deleted !',
                'message' => $permission['name'].' has been deleted'
            ], 200);
        };

        return redirect()->back()->with([
            'message' => 'success'
        ]);
    }

    /**
     * Get permission list and group by name.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAndGroup()
    {
        $permissions = Permission::all();
        $data = $permissions->groupBy(function($item, $key){
            $gettype = explode("_", $item['name']);
            return end($gettype);
        });
        return response()->json([
            'data' => $data,
        ], 200);
    }

}
