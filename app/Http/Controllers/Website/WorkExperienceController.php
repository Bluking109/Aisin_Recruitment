<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\WorkExperienceRequest;
use ReCaptcha\ReCaptcha;
use AIIASetting;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobSeeker = auth()->user();
        $workExperiences = $jobSeeker->workExperiences;
        $workExperienceDetail = $jobSeeker->workExperienceDetail;

        return view('website.pages.work_experience', compact(
            'jobSeeker',
            'workExperiences',
            'workExperienceDetail'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkExperienceRequest $request)
    {
        if (AIIASetting::getValue('recaptcha_validation')) {
            $response = (new ReCaptcha(env('RECAPTCHA_SECRET_KEY')))
                ->setExpectedHostname(env('APP_HOSTNAME'))
                ->setExpectedAction('work_experience')
                ->verify($request->recaptcha_key, $request->ip());

            if (!$response->isSuccess()) {
                return response()->json([
                    'message' => 'ReCaptcha Error, mohon ulangi lagi',
                    'success' => false
                ], 400);
            }
        }

        $message = 'Anda tidak menambah data pengalaman kerja';
        $type = 'warning';

        if (isset($request->work_experiences[0]['company'])) {
            $message = 'Data berhasil diupdate';
            $type = 'success';
        }

        $profile = DB::transaction(function () use ($request) {
            $jobSeeker = auth()->user();

            $jobSeeker->workExperiences()->delete();
            foreach ($request->work_experiences as $value) {
                if (isset($value['company'])) {
                    $jobSeeker->workExperiences()->create([
                        'company' => $value['company'],
                        'position' => $value['position'],
                        'salary' => $value['salary'],
                        'join_date' => $value['join_date'],
                        'end_date' => $value['end_date'],
                        'boss_name' => isset($value['boss_name']) ? $value['boss_name'] : null,
                        'boss_position' => isset($value['boss_position']) ? $value['boss_position'] : null,
                        'number_of_subordinates' => isset($value['number_of_subordinates']) ? $value['number_of_subordinates'] : 0,
                        'reason_to_move' => $value['reason_to_move'],
                    ]);
                }
            }

            $jobSeeker->workExperienceDetail()->delete();
            if ($jobSeeker->educationLevel->isAssociateForm() && isset($request->work_experiences[0]['company'])) {
                $jobSeeker->workExperienceDetail()->create([
                    'position_description' => $request->position_description,
                    'problems_and_solutions' => $request->problems_and_solutions,
                    'impression_on_company' => $request->impression_on_company,
                    'improvement_on_company' => $request->improvement_on_company,
                    'who_pushed' => $request->who_pushed,
                    'how_make_decisions' => $request->how_make_decisions,
                ]);
            }

            return $jobSeeker;
        });

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'type' => $type
            ]);
        }

        return redirect()
            ->back()
            ->with('message', $message)
            ->with('type', $type);
    }
}
