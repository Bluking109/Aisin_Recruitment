<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\OtherRequest;
use App\Models\OtherRecruitment;
use App\Models\Other;
use ReCaptcha\ReCaptcha;
use AIIASetting;

class OtherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobSeeker = auth()->user();
        $other = $jobSeeker->other;
        $otherRecruitments = $jobSeeker->otherRecruitments;
        $diseases = $jobSeeker->diseases;

        return view('website.pages.other', compact(
            'jobSeeker',
            'other',
            'otherRecruitments',
            'diseases'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OtherRequest $request)
    {
        if (AIIASetting::getValue('recaptcha_validation')) {
            $response = (new ReCaptcha(env('RECAPTCHA_SECRET_KEY')))
                ->setExpectedHostname(env('APP_HOSTNAME'))
                ->setExpectedAction('other')
                ->verify($request->recaptcha_key, $request->ip());

            if (!$response->isSuccess()) {
                return response()->json([
                    'message' => 'ReCaptcha Error, mohon ulangi lagi',
                    'success' => false
                ], 400);
            }
        }

        $profile = DB::transaction(function () use ($request) {
            $jobSeeker = auth()->user();

            $other = $jobSeeker->other;

            $otherReq = [
                'hobby' => $request->hobby,
                'fill_spare_time' => $request->fill_spare_time,
                'strong_point' => $request->strong_point,
                'weak_point' => $request->weak_point,
                'use_glasses' => $request->use_glasses,
                'agreement' => $request->agreement,
            ];

            $rightEye = [];
            $leftEye = [];

            if ($jobSeeker->educationLevel->isAssociateForm() && $request->use_glasses == '1') {
                $rightEye = [
                    'type' => $request->right_eye_type,
                    'size' => $request->right_eye
                ];

                $leftEye = [
                    'type' => $request->left_eye_type,
                    'size' => $request->left_eye
                ];

                $otherReq['right_eye'] = json_encode($rightEye);
                $otherReq['left_eye'] = json_encode($leftEye);
            }

            if (!$other) {
                $jobSeeker->other()->create($otherReq);
            } else {
                $jobSeeker->other()->update($otherReq);
            }

            $jobSeeker->otherRecruitments()->delete();
            if ($otherReqs = $request->other_recruitments) {
                foreach ($otherReqs as $key => $value) {
                    $jobSeeker->otherRecruitments()->create([
                        'organizer' => $value['organizer'],
                        'is_astra' => $value['is_astra'],
                        'process' => $value['process'],
                        'place' => $value['place'],
                        'date' => $value['date'],
                        'position' => $value['position'],
                        'status' => $value['status']
                    ]);
                }
            }

            $jobSeeker->diseases()->delete();
            if ($diseases = $request->diseases) {
                foreach ($diseases as $key => $value) {
                    $jobSeeker->diseases()->create([
                        'name' => $value['name'],
                        'from_date' => $value['from_date'],
                        'end_date' => $value['end_date'],
                        'note' => $value['note']
                    ]);
                }
            }
        });

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diupdate'
            ]);
        }

        return redirect()->back()->with('message', 'Data berhasil diupdate');
    }
}
