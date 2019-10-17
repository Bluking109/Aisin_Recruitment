<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About as AboutReq;
use App\Models\About;
use DataTables;
use App\Traits\FileHandler;

class AboutController extends Controller
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
            $abouts = About::select('id', 'title', 'content', 'images', 'is_active');
            return DataTables::eloquent($abouts)->toJson();
        }

        return view('admin.pages.about.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutReq $request)
    {
        if ($request->is_active == '1') {
            if (About::active()->first()) {
                About::active()->update([
                    'is_active' => '0'
                ]);
            }
        }

        if ($request->is_active == '0') {
            if (!About::active()->first()) {
                $request->merge(['is_active' => '1']);
            }
        }

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'is_active' => $request->is_active,
            'images' => json_encode([])
        ];

        if ($request->file('images')) {
            $data['images'] = $this->uploadFiles($request->file('images'), 'pages', 'about', null, true);
        }

        $about = About::create($data);

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
    public function update(Request $request, $id)
    {
        if ($request->is_active == '1') {
            if (About::active()->first()) {
                About::active()->update([
                    'is_active' => '0'
                ]);
            }
        }

        if ($request->is_active == '0') {
            if (!About::active()->first()) {
                $request->merge(['is_active' => '1']);
            }
        }

        $about = About::findOrFail($id);

        $about->update([
            'title' => $request->title,
            'content' => $request->content,
            'is_active' => $request->is_active,
        ]);

        if ($request->images) {
            if (count($request->images) > 0) {
                $images = $about->images;
                if (count($images) > 0) {
                    $images = array_map(function($n) {
                        return 'public/pages/' . $n;
                    }, $images);
                    $this->deleteFile($images);

                    $about->update([
                        'images' => $this->uploadFiles($request->file('images'), 'pages', 'about', null, true)
                    ]);
                }
            }
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
        $about = About::findOrFail($id);

        if ($about->is_active == '1') {
            return response()->json([
                'success' => true,
                'title' => 'Error !',
                'message' => "Can't delete active data"
            ], 400);
        }

        $images = $about->images;
        if (count($images) > 0) {
            $images = array_map(function($n) {
                return 'public/pages/' . $n;
            }, $images);
            $this->deleteFile($images);
        }

        $about->delete();

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
