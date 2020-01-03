<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use AIIASetting;
use App\Models\Setting;
use App\Http\Requests\Admin\Setting as SettingRequest;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $settings = AIIASetting::getAll();

        if ($request->ajax()) {
            return response()->json(['data' => $settings], 200);
        }

        return view('admin.pages.settings.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {
        $data = $request->all();

        foreach ($data['settings'] as $key => $value) {
            Setting::findOrFail($value['id'])->update([
                'value' => isset($value['value']) ? $value['value'] : 'false'
            ]);
        }

        if ($request->ajax()) {
            return response()->json([
                'data' => Setting::all(),
                'success' => true,
                'message' => 'Data updated successfully'
            ], 200);
        }

        return redirect(AIIASetting::getValue('admin_base_route', config('aiia.default_url_admin')).'/settings')->withMessage('Setting updated successfully !');
    }
}
