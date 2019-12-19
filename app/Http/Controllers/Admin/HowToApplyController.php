<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HowToApply as HowToApplyReq;
use App\Models\HowToApply;
use DataTables;
use App\Traits\FileHandler;

class HowToApplyController extends Controller
{
    use FileHandler;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $howToApplies = HowToApply::select('id', 'title', 'sub_title', 'image', 'is_active', 'content');
            return DataTables::eloquent($howToApplies)->toJson();
        }

        return view('admin.pages.how_to_apply.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HowToApplyReq $request)
    {
        if ($request->is_active == '1') {
            if (HowToApply::active()->first()) {
                HowToApply::active()->update([
                    'is_active' => '0'
                ]);
            }
        }

        if ($request->is_active == '0') {
            if (!HowToApply::active()->first()) {
                $request->merge(['is_active' => '1']);
            }
        }

        $data = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'content' => $request->content,
            'is_active' => $request->is_active,
            'image' => null
        ];

        if ($request->file('image')) {
            $data['image'] = $this->uploadFiles($request->file('image'), 'pages', 'how_to_apply', null, true);
        }

        HowToApply::create($data);

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
    public function update(HowToApplyReq $request, $id)
    {
        if ($request->is_active == '1') {
            if (HowToApply::active()->first()) {
                HowToApply::active()->update([
                    'is_active' => '0'
                ]);
            }
        }

        if ($request->is_active == '0') {
            if (!HowToApply::active()->first()) {
                $request->merge(['is_active' => '1']);
            }
        }

        $howToApply = HowToApply::findOrFail($id);

        $howToApply->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'content' => $request->content,
            'is_active' => $request->is_active,
        ]);

        if ($request->file('image')) {
            if ($image = $howToApply->image) {
                $this->deleteFile('app/public/pages/' . $image);
            }

            $howToApply->update([
                'image' => $this->uploadFiles($request->file('image'), 'pages', 'how_to_apply', null, true)
            ]);
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Inserted !',
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
        $howToApply = HowToApply::findOrFail($id);

        if ($howToApply->is_active == '1') {
            return response()->json([
                'success' => true,
                'title' => 'Error !',
                'message' => "Can't delete active data"
            ], 400);
        }

        if ($image = $howToApply->image) {
            $this->deleteFile('public/pages/' . $image);
        }

        $howToApply->delete();

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
