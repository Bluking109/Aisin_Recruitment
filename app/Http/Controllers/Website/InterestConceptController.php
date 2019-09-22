<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\InterestConcept;
use App\Http\Requests\Website\InterestConceptRequest;
use ReCaptcha\ReCaptcha;

class InterestConceptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobSeeker = auth()->user();
        $interest = $jobSeeker->interestConcept;

        return view('website.pages.personal_interest_concept', compact(
            'jobSeeker',
            'interest'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InterestConceptRequest $request)
    {
        $response = (new ReCaptcha(env('RECAPTCHA_SECRET_KEY')))
            ->setExpectedHostname(env('APP_HOSTNAME'))
            ->setExpectedAction('interest_concept')
            ->verify($request->recaptcha_key, $request->ip());

        if (!$response->isSuccess()) {
            return response()->json([
                'message' => 'ReCaptcha Error, tolong ulangi lagi',
                'success' => false
            ], 400);
        }

        $profile = DB::transaction(function () use ($request) {
            $jobSeeker = auth()->user();

            $jobSeeker->interestConcept()->delete();
            $jobSeeker->interestConcept()->create([
                'future_goals' => $request->future_goals,
                'expertise' => $request->expertise,
                'expertise' => $request->expertise,
                'working_motivation' => $request->working_motivation,
                'working_reason' => $request->working_reason,
                'expected_facility' => $request->expected_facility,
                'join_date' => $request->join_date,
                'expected_salary' => $request->expected_salary,
                'place_outside' => $request->place_outside,
                'favored_environment' => $request->favored_environment_other ? $request->favored_environment_other : $request->favored_environment,
                'unfavored_environment' => $request->unfavored_environment_other ? $request->unfavored_environment_other : $request->unfavored_environment,
                'like_people' => $request->like_people,
                'dificult_decisions' => $request->dificult_decisions,
                'field_of_works' => $request->field_of_works ? json_encode($request->field_of_works) : json_encode([]),
            ]);

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
