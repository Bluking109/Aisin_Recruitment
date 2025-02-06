<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\FamilyRequest;
use App\Models\BiologicalParent;
use ReCaptcha\ReCaptcha;
use AIIASetting;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$jobSeeker = auth()->user();
    	$maritalStatus = $jobSeeker->maritalStatus;
    	$partner = $jobSeeker->partner;
    	$children = $jobSeeker->children;
        $father = $jobSeeker->parents()->father()->first();
        $mother = $jobSeeker->parents()->mother()->first();
        $siblings = $jobSeeker->siblings;

        return view('website.pages.family_environment', compact(
        	'jobSeeker',
        	'maritalStatus',
        	'partner',
        	'children',
            'father',
            'mother',
            'siblings'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FamilyRequest $request)
    {
        if (AIIASetting::getValue('recaptcha_validation')) {
            $response = (new ReCaptcha(env('RECAPTCHA_SECRET_KEY')))
                ->setExpectedHostname(env('APP_HOSTNAME'))
                ->setExpectedAction('family')
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

            $jobSeeker->maritalStatus()->delete();
            $jobSeeker->maritalStatus()->create([
                'status_ktp' => $request->marital_status_ktp,
                'status_actual' => $request->marital_status_actual,
                'date_ktp' => $request->marital_status_date_ktp,
                'date_actual' => $request->marital_status_date_actual
            ]);

            $jobSeeker->partner()->delete();
            if ($request->partner_name) {
                $jobSeeker->partner()->create([
                    'name' => $request->partner_name,
                    'place_of_birth' => $request->partner_place_of_birth,
                    'date_of_birth' => $request->partner_date_of_birth,
                    'gender' => $request->partner_gender,
                    'last_education' => $request->partner_last_education,
                    'job' => $request->partner_job,
                ]);
            }

            $jobSeeker->children()->delete();
            foreach ($request->children as $key => $value) {
                if (isset($value['name'])) {
                    $jobSeeker->children()->create([
                        'name' => $value['name'],
                        'place_of_birth' => $value['place_of_birth'],
                        'date_of_birth' => $value['date_of_birth'],
                        'gender' => $value['gender'],
                        'last_education' => $value['last_education'],
                        'job' => $value['job']
                    ]);
                }
            }

            $jobSeeker->parents()->delete();
            $jobSeeker->parents()->create([
                'name' => $request->father_name,
                'place_of_birth' => $request->father_place_of_birth,
                'date_of_birth' => $request->father_date_of_birth,
                'last_education' => $request->father_last_education,
                'job' => $request->father_job,
                'is' => BiologicalParent::IS_FATHER
            ]);

            $jobSeeker->parents()->create([
                'name' => $request->mother_name,
                'place_of_birth' => $request->mother_place_of_birth,
                'date_of_birth' => $request->mother_date_of_birth,
                'last_education' => $request->mother_last_education,
                'job' => $request->mother_job,
                'is' => BiologicalParent::IS_MOTHER
            ]);

            $jobSeeker->siblings()->delete();
            foreach ($request->siblings as $key => $value) {
                if (isset($value['name'])) {
                    $jobSeeker->siblings()->create([
                        'name' => $value['name'],
                        'place_of_birth' => $value['place_of_birth'],
                        'date_of_birth' => $value['date_of_birth'],
                        'gender' => $value['gender'],
                        'last_education' => $value['last_education'],
                        'job' => $value['job']
                    ]);
                }
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
