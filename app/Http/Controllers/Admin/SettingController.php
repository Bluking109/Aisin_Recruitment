<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\AIIASetting;
use App\Http\Requests\Admin\AIIASetting as AIIASettingRequest;
use AIIAAIIASetting;

class AIIASettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $AIIASettings = AIIAAIIASetting::getAll();

        if ($request->ajax()) {
            return response()->json(['data' => $AIIASettings], 200);
        }

        return view('admin.pages.AIIASettings.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AIIASettingRequest $request)
    {
        $data = $request->all();

        foreach ($data['AIIASettings'] as $key => $value) {
            AIIASetting::findOrFail($value['id'])->update([
                'value' => isset($value['value']) ? $value['value'] : 0
            ]);
        }

        if ($request->ajax()) {
            return response()->json([
                'data' => AIIAAIIASetting::all(),
                'success' => true,
                'message' => 'Data updated successfully'
            ], 200);
        }

        return redirect(AIIAAIIASetting::getValue('admin_base_route', config('aiia.default_url_admin')).'/AIIASettings')->withMessage('AIIASetting updated successfully !');
    }
}
