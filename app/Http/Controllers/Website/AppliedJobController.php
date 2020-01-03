<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobApplicationStage;

class AppliedJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$jobSeeker = auth()->user();

        return view('website.pages.applied_job', compact('jobSeeker'));
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
        $jobSeeker = auth()->user();

        $stage = JobApplicationStage::findOrFail($id);

        if ($stage->jobApplication->jobSeeker->id !== $jobSeeker->id) {
            return response()->json([
                'success' => true,
                'message' => 'Bad request'
            ], 400);
        }

        if ($request->status != 1 && $request->status != 2) {
            return response()->json([
                'success' => true,
                'message' => 'Bad request'
            ], 400);
        }

        $stage->update([
            'status' => $request->status,
        ]);

        if ($request->status == 1) {
            $message = 'Anda telah mengkonfirmasi kehadiran untuk tes tahap ini.';
        } else {
            $message = 'Anda telah mengkonfirmasi untuk tidak hadir dalam tes tahap ini.';
        }

        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }
}
