<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Announcement as AnnouncementReq;
use App\Models\Announcement;
use DataTables;
use App\Traits\FileHandler;


class AnnouncementController extends Controller
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
            $announcements = Announcement::select('id', 'banner', 'is_active', 'created_at');
            return DataTables::eloquent($announcements)->toJson();
        }

        return view('admin.pages.announcements.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementReq $request)
    {
        $data = [
            'is_active' => $request->is_active,
            'banner' => null
        ];

        if ($request->file('banner')) {
            $data['banner'] = $this->uploadFiles($request->file('banner'), 'pages', 'announcements', null, true);
        }

        Announcement::create($data);

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
    public function update(AnnouncementReq $request, $id)
    {
        $announcement = Announcement::findOrFail($id);

        $announcement->update([
            'is_active' => $request->is_active,
        ]);

        if ($request->file('banner')) {
            if ($banner = $announcement->banner) {
                $this->deleteFile('app/public/pages/' . $banner);
            }

            $announcement->update([
                'banner' => $this->uploadFiles($request->file('banner'), 'pages', 'announcements', null, true)
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
        $announcement = Announcement::findOrFail($id);

        if ($banner = $announcement->banner) {
            $this->deleteFile('public/pages/' . $banner);
        }

        $announcement->delete();

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
