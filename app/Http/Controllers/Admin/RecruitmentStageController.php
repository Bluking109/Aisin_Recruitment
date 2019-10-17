<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RecruitmentStage as RecruitmentStageRequest;
use App\Models\RecruitmentStage;
use DataTables;

class RecruitmentStageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $stages = RecruitmentStage::select('id', 'name', 'by_vendor', 'note', 'created_at' );
            return DataTables::eloquent($stages)->toJson();
        }

        return view('admin.pages.recruitment_stages.index');
    }

    /**
     * Get recruitment
     *
     * @return \Illuminate\Http\Response
     */
    public function getStage(Request $request)
    {
        $search = $request->search;
        $stages = RecruitmentStage::select('id', 'name as text')
            ->where('name','like', '%'.$search.'%',)
            ->get();

        return response()->json($stages);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecruitmentStageRequest $request)
    {
        $stage = RecruitmentStage::create([
            'name' => $request->name,
            'by_vendor' => $request->by_vendor,
            'note' => $request->note
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Inserted !',
                'message' => 'Data has been inserted'
            ], 201);
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
    public function update(RecruitmentStageRequest $request, $id)
    {
        $updateStage = RecruitmentStage::findOrFail($id);
        $updateStage->fill([
            'name' => $request->name,
            'by_vendor' => $request->by_vendor,
            'note' => $request->note
        ]);

        if ($updateStage->isClean()) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'no changes'
                ], 422);
            }
            return redirect()->back()->with([
                'success' => true
            ]);
        }

        $updateStage->save();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Updated !',
                'message' => 'Data has been updated'
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
        $stage = RecruitmentStage::findOrFail($id);
        $stage->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Deleted !',
                'message' => 'Data has been deleted'
            ], 200);
        };

        return redirect()->back()->with([
            'message' => 'success'
        ]);
    }
}
