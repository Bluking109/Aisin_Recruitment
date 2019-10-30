<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobSeeker;
use App\Http\Requests\Admin\RejectApplication;
use App\Http\Requests\Admin\NextStageApplication;
use App\Mail\ApplicationAccepted;
use DataTables;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	 if ($request->ajax()) {
    	 	$stage = $request->stage;
    	 	$job = $request->job;
            $confirm = $request->confirm;
            $examDate = $request->exam_date;

    	 	$applications = JobApplication::with('jobSeeker', 'jobApplicationStages.stage')
    	 		->with(['jobVacancy' => function($q) {
    	 			$q->with('position', 'section', 'stages');
    	 		}])
    	 		->when($stage, function($q, $stage) {
    	 			$q->whereHas('jobApplicationStages', function($q) use($stage) {
    	 				$q->where('stage_id', $stage);
    	 			})->where('status', JobApplication::STATUS_IN_PROCESS);
    	 		})
                ->has('jobSeeker')
    	 		->when($job, function($q, $job) {
    	 			$q->where('job_vacancy_id', $job);
    	 		})->get();

            if ($confirm) {
                $applications = $applications->filter(function($value, $key) use($confirm) {
                    $lastStage = $value->jobApplicationStages->last();
                    return $lastStage->status == $confirm;
                });
            }

            if ($examDate) {
                $applications = $applications->filter(function($value, $key) use($examDate) {
                    $lastStage = $value->jobApplicationStages->last();
                    return date('Y-m-d', strtotime($lastStage->exam_at)) == $examDate;
                });
            }

            return DataTables::collection($applications)->toJson();
        }

    	return view('admin.pages.job_applications.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$jobApplication = JobApplication::findOrFail($id);
    	$jobSeeker = $jobApplication->jobSeeker;

        return view('admin.pages.job_applications.show', compact('jobSeeker', 'jobApplication'));
    }

    /**
     * Reject application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reject(RejectApplication $request, $id)
    {
    	$application = JobApplication::findOrFail($id);

    	// get stage terakhir
    	$stages = $application->jobApplicationStages;

    	if (!$stages->count()) {
    		// jika gagal tapi dalam proses seleksi dokumen
    		$application->update([
				'status' => JobApplication::STATUS_REJECT
    		]);

    		return response()->json(['title' => 'Success Reject', 'message' => 'Job application successfully rejected']);
    	}

    	$lastStage = $stages->last();

    	if ($lastStage->stage->switch_vacancy == '1') {
    		$applicationId = $request->job_vacancy;
    		$date = $request->date_test;
    		$time = $request->time_test;

    		if ($application && $date && $time) {
    			// application di alihkan ke vacancy lain
    			$hasApply = $application->jobSeeker
    				->applications()
                    ->whereHas('jobVacancy', function($q) use($applicationId) {
                        $q->where('id', $applicationId);
                    })
    				->first();

    			if ($hasApply) {
    				// jika aplikasi sudah di lamar oleh js maka salin stagenya ke aplikasi yang dilamar tersebut
                    foreach ($stages as $key => $value) {
                        $stageToSave = [
                            'stage_id' => $value->stage_id,
                            'vendor_id' => $value->vendor_id,
                            'note' => $value->note,
                            'exam_at' => $value->exam_at
                        ];
                        // exam at yang diupdate hanya yang stage terakhir
                        if ($key == ($stages->count() - 1)) {
                            $stageToSave['exam_at'] = date('Y-m-d H:i:s', strtotime($date . ' ' . $time));
                        }

                        $hasApply->jobApplicationStages()->create($stageToSave);
                    }

                    $application->update([
                        'status' => JobApplication::STATUS_REJECT
                    ]);
    			} else {
    				if ($application->jobSeeker->applications->count() >= 3) {
    					// timpa $application dengan vacancy yang baru
    					$application->update([
	    					'job_vacancy_id' => $applicationId
	    				]);

	    				$lastStage->update([
	    					'exam_at' => date('Y-m-d H:i:s', strtotime($date . ' ' . $time))
	    				]);
    				} else {
    					// tambahkan vacancy ke application jobseeker dengan merubah status application sebelumnya menjadi reject
                        $jobSeeker = $application->jobSeeker;
                        $newApplication = $jobSeeker->applications()->create([
                            'job_vacancy_id' => $applicationId,
                            'status' => JobApplication::STATUS_IN_PROCESS,
                        ]);

                        foreach ($stages as $key => $value) {
                            $stageToSave = [
                                'stage_id' => $value->stage_id,
                                'vendor_id' => $value->vendor_id,
                                'note' => $value->note,
                                'exam_at' => $value->exam_at
                            ];
                            // exam at yang diupdate hanya yang stage terakhir
                            if ($key == ($stages->count() - 1)) {
                                $stageToSave['exam_at'] = date('Y-m-d H:i:s', strtotime($date . ' ' . $time));
                            }

                            $newApplication->jobApplicationStages()->create($stageToSave);
                        }

                        $application->update([
                            'status' => JobApplication::STATUS_REJECT
                        ]);
    				}
    			}

                $message = 'Job applications successfully rejected and replaced with other job';
    		} else {
                $application->update([
                    'status' => JobApplication::STATUS_REJECT
                ]);

                $application->jobSeeker->update([
                    'is_blacklist' => JobSeeker::STATUS_BLACKLIST,
                    'blacklist_until' => date("Y-m-d", strtotime(date("Y-m-d") . " + 1 year"))
                ]);

                $message = 'Job application successfully rejected';
            }

    	} else {
    		// reject application dan masukan jobseeker ke dalam daftar blacklist selama 1 tahun
    		$application->update([
				'status' => JobApplication::STATUS_REJECT
    		]);

    		$application->jobSeeker->update([
    			'is_blacklist' => JobSeeker::STATUS_BLACKLIST,
                'blacklist_until' => date("Y-m-d", strtotime(date("Y-m-d") . " + 1 year"))
    		]);

            $message = 'Job application successfully rejected';
    	}

        return response()->json([
            'title' => 'Success Reject',
            'message' => $message
        ]);
    }

    /**
     * Accept Jobseeker
     */
    public function acceptApplication(Request $request, $id)
    {
        $application = JobApplication::find($id);

        $application->update([
            'status' => JobApplication::STATUS_ACCEPTED
        ]);

        return response()->json([
            'title' => 'Success',
            'message' => 'Job application has been successfully accepted'
        ]);
    }

    /**
     * Next stage application
     */
    public function nextStage(NextStageApplication $request, $id)
    {
        $application = JobApplication::findOrFail($id);

        $vendor = $request->vendor;
        $dateExam = $request->date_exam;
        $timeExam = $request->time_exam;

        $vacancyStages = $application->jobVacancy->stages;

        $nextStage = $vacancyStages[0];

        if ($application->jobApplicationStages->count()) {
            $nextIndex = 0;
            foreach ($vacancyStages as $key => $value) {
                if ($value->id == $application->jobApplicationStages->last()->stage_id) {
                    if ($key < $vacancyStages->count() -1) {
                        $nextIndex = $key + 1;
                    }
                }
            }

            $nextStage = $vacancyStages[$nextIndex];
        } else {
            $application->update([
                'status' => JobApplication::STATUS_IN_PROCESS
            ]);
        }

        if ($application->jobApplicationStages->count() == $vacancyStages->count()) {
            // validasi tidak ada lanjutan step lagi alias finish
            return response()->json(['message' => 'Bad Request'], 400);
        }

        // validasi vendor
        if ($nextStage->by_vendor == '1') {
            if (!$vendor) {
                return response()->json(['message' => 'Data invalid'], 422);
            }
        }

        $application->jobApplicationStages()->create([
            'stage_id' => $nextStage->id,
            'vendor_id' => $vendor,
            'exam_at' => date('Y-m-d H:i:s', strtotime($dateExam . ' ' . $timeExam)),
        ]);

        $application = $application->fresh();

        Mail::to($application->jobSeeker->email)->send(new ApplicationAccepted($application));

        return response()->json([
            'title' => 'Success',
            'message' => 'Job application has been successfully accepted'
        ]);
    }

    /**
     * Send SMS
     */
    protected function sendSMS()
    {
        // $this->client->request('GET', 'plain', [
        //     'query' => [
        //         'user'      => env('SMS_GATEWAY_USER'),
        //         'password'  => env('SMS_GATEWAY_PASSWORD'),
        //         'SMSText'   => 'REAL TIME ALERT: '.$error.', LINE: '.$line.', STATUS: '.$textstatus. ', DOWNTIME: '.$time.' Minutes',
        //         'GSM'       => $user->phone_number,
        //     ],
        // ]);
    }
}
