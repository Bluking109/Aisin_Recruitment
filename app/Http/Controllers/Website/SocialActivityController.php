<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\SocialActivityRequest;
use ReCaptcha\ReCaptcha;

class SocialActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobSeeker = auth()->user();
        $friends = $jobSeeker->friends;
        $organizations = $jobSeeker->organizations;

        return view('website.pages.social_activity', compact(
            'friends',
            'organizations'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialActivityRequest $request)
    {
        $response = (new ReCaptcha(env('RECAPTCHA_SECRET_KEY')))
            ->setExpectedHostname(env('APP_HOSTNAME'))
            ->setExpectedAction('social_activity')
            ->verify($request->recaptcha_key, $request->ip());

        if (!$response->isSuccess()) {
            return response()->json([
                'message' => 'ReCaptcha Error, mohon ulangi lagi',
                'success' => false
            ], 400);
        }

        $profile = DB::transaction(function () use ($request) {
            $jobSeeker = auth()->user();

            $jobSeeker->friends()->delete();
            foreach ($request->friends as $key => $value) {
                $jobSeeker->friends()->create([
                    'name' => $value['name'],
                    'position' => $value['position'],
                    'telephone_number' => $value['telephone_number'],
                    'relationship' => $value['relationship']
                ]);
            }

            $jobSeeker->organizations()->delete();
            foreach ($request->organizations as $key => $value) {
                if ($value['name']) {
                    $jobSeeker->organizations()->create([
                        'name' => $value['name'],
                        'place' => $value['place'],
                        'position' => $value['position'],
                        'start_date' => $value['start_date'],
                        'end_date' => $value['end_date']
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
