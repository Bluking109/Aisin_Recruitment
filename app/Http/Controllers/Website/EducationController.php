<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\EducationRequest;
use ReCaptcha\ReCaptcha;
use AIIASetting;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobSeeker = auth()->user();
        $formalEducations = [];

        // remap formal education
        foreach ($jobSeeker->formalEducations as $key => $value) {
            $formalEducations[$value->class] = $value;
        }

        $nonFormalEducations = $jobSeeker->nonFormalEducations;
        $educationDetail = $jobSeeker->educationDetail;
        $languages = $jobSeeker->foreignLanguages;

        return view('website.pages.education', compact(
            'jobSeeker',
            'formalEducations',
            'nonFormalEducations',
            'educationDetail',
            'languages'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EducationRequest $request)
    {
        if (AIIASetting::getValue('recaptcha_validation')) {
            $response = (new ReCaptcha(env('RECAPTCHA_SECRET_KEY')))
                ->setExpectedHostname(env('APP_HOSTNAME'))
                ->setExpectedAction('education')
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
            // Formal education
            $jobSeeker->formalEducations()->delete();
            foreach ($request->educations as $key => $value) {
                if (isset($value['name_of_institution'])) {
                    $jobSeeker->formalEducations()->create([
                        'name_of_institution' => $value['name_of_institution'],
                        'faculty' => isset($value['faculty']) ? $value['faculty'] : null,
                        'major' => isset($value['major']) ? $value['major'] : null,
                        'study_program' => isset($value['study_program']) ? $value['study_program'] : null,
                        'city' => isset($value['city']) ? $value['city'] : null,
                        'average_math_score' => isset($value['average_math_score']) ? $value['average_math_score'] : 0,
                        'un_math_score' => isset($value['un_math_score']) ? $value['un_math_score'] : 0,
                        'class' => $key,
                        'start_year' => isset($value['start_year']) ? $value['start_year'] : null,
                        'end_year' => isset($value['end_year']) ? $value['end_year'] : null,
                        'grade_point' => isset($value['grade_point']) ? $value['grade_point'] : 0,
                        'note' => isset($value['note']) ? $value['note'] : null,
                    ]);
                }
            }
            // Non formal education
            $jobSeeker->nonFormalEducations()->delete();
            foreach ($request->non_formal_educations as $key => $value) {
                if (isset($value['training_name'])) {
                    $jobSeeker->nonFormalEducations()->create([
                        'training_name' => $value['training_name'],
                        'place' => $value['place'],
                        'note' => isset($value['note']) ? $value['note'] : null,
                        'start_date' => date('Y-m-d', strtotime($value['start_date'])),
                        'end_date' => date('Y-m-d', strtotime($value['end_date'])),
                    ]);
                }
            }
            // Language
            $jobSeeker->foreignLanguages()->delete();
            foreach ($request->languages as $key => $value) {
                if (isset($value['language'])) {
                    $jobSeeker->foreignLanguages()->create([
                        'language' => $value['language'],
                        'writing' => $value['writing'],
                        'reading' => $value['reading'],
                        'grammar' => $value['grammar'],
                    ]);
                }
            }

            $jobSeeker->educationDetail()->delete();
            if ($jobSeeker->educationLevel->isAssociateForm()) {
                $jobSeeker->educationDetail()->create([
                    'reason_choose_institute' => $request->reason_choose_institute,
                    'essay' => $request->essay
                ]);
            }

            return $jobSeeker;
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
