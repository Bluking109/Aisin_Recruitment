<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobApplicationExport;
use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobSeeker;
use App\Models\JobVacancy;
use App\Http\Requests\Admin\RejectApplication;
use App\Http\Requests\Admin\NextStageApplication;
use App\Mail\ApplicationAccepted;
use DB;
use DataTables;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexInProcess(Request $request)
    {
    	 if ($request->ajax()) {
    	 	$applications = $this->getData($request);

            return DataTables::eloquent($applications)->toJson();
        }

    	return view('admin.pages.job_applications.index_in_process');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexRejected(Request $request)
    {
         if ($request->ajax()) {
            $applications = $this->getData($request, JobApplication::STATUS_REJECT);

            return DataTables::eloquent($applications)->toJson();
        }

        return view('admin.pages.job_applications.index_rejected');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAccepted(Request $request)
    {
         if ($request->ajax()) {
            $applications = $this->getData($request, JobApplication::STATUS_ACCEPTED);

            return DataTables::eloquent($applications)->toJson();
        }

        return view('admin.pages.job_applications.index_accepted');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAssign(Request $request)
    {
         if ($request->ajax()) {
            $jobSeekers = JobSeeker::has('applications', '<', 3)
                ->whereDoesntHave('applications', function($q) {
                    $q->where('status', JobApplication::STATUS_IN_PROCESS)
                        ->orWhere('status', JobApplication::STATUS_ACCEPTED);
                })
                ->with('educationLevel');

            return DataTables::eloquent($jobSeekers)->toJson();
        }

        return view('admin.pages.job_applications.index_assign');
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
				'status' => JobApplication::STATUS_REJECT,
                'finished_at' => date('Y-m-d H:i:s')
    		]);

    		return response()->json(['title' => 'Success Reject', 'message' => 'Job application successfully rejected']);
    	}

    	$lastStage = $stages->last();

    	if ($lastStage->stage->switch_vacancy == '1') {
    		$vacancyId = $request->job_vacancy;
    		$date = $request->date_test;
    		$time = $request->time_test;

    		if ($application && $date && $time) {
    			// application di alihkan ke vacancy lain
    			$hasApply = $application->jobSeeker
    				->applications()
                    ->where('job_vacancy_id', $vacancyId)
    				->first();

    			if ($hasApply) {
    				// jika aplikasi sudah di lamar oleh js maka salin stagenya ke aplikasi yang dilamar tersebut
                    $hasApply->jobApplicationStages()->delete();
                    foreach ($stages as $key => $value) {
                        $stageToSave = [
                            'stage_id' => $value->stage_id,
                            'vendor_id' => $value->vendor_id,
                            'note' => $value->note,
                            'exam_at' => $value->exam_at,
                            'accepted_at' => $value->accepted_at,
                            'rejected_at' => $value->rejected_at
                        ];
                        // exam at yang diupdate hanya yang stage terakhir
                        if ($key == ($stages->count() - 1)) {
                            $stageToSave['exam_at'] = date('Y-m-d H:i:s', strtotime($date . ' ' . $time));
                        }

                        $hasApply->jobApplicationStages()->create($stageToSave);
                        $hasApply->update([
                            'status' => JobApplication::STATUS_IN_PROCESS
                        ]);
                    }

                    $application->update([
                        'status' => JobApplication::STATUS_REJECT,
                        'finished_at' => date('Y-m-d H:i:s')
                    ]);
                    $application = $hasApply;
    			} else {
    				if ($application->jobSeeker->applications->count() >= 3) {
    					// timpa $application dengan vacancy yang baru
    					$application->update([
	    					'job_vacancy_id' => $vacancyId
	    				]);

	    				$lastStage->update([
	    					'exam_at' => date('Y-m-d H:i:s', strtotime($date . ' ' . $time))
	    				]);
    				} else {
    					// tambahkan vacancy ke application jobseeker dengan merubah status application sebelumnya menjadi reject
                        $jobSeeker = $application->jobSeeker;
                        $newApplication = $jobSeeker->applications()->create([
                            'job_vacancy_id' => $vacancyId,
                            'status' => JobApplication::STATUS_IN_PROCESS,
                        ]);

                        foreach ($stages as $key => $value) {
                            $stageToSave = [
                                'stage_id' => $value->stage_id,
                                'vendor_id' => $value->vendor_id,
                                'note' => $value->note,
                                'exam_at' => $value->exam_at,
                                'accepted_at' => $value->accepted_at,
                                'rejected_at' => $value->rejected_at
                            ];
                            // exam at yang diupdate hanya yang stage terakhir
                            if ($key == ($stages->count() - 1)) {
                                $stageToSave['exam_at'] = date('Y-m-d H:i:s', strtotime($date . ' ' . $time));
                            }

                            $newApplication->jobApplicationStages()->create($stageToSave);
                        }

                        $application->update([
                            'status' => JobApplication::STATUS_REJECT,
                            'finished_at' => date('Y-m-d H:i:s')
                        ]);

                        $application = $newApplication;
    				}
    			}

                $message = 'Job applications successfully rejected and replaced with other job';

                $application = $application->fresh();
                Mail::to($application->jobSeeker->email)->send(new ApplicationAccepted($application));
    		} else {
                // Reject semua application
                $application->jobSeeker->applications()->update([
                    'status' => JobApplication::STATUS_REJECT,
                    'finished_at' => date('Y-m-d H:i:s')
                ]);

                $application->jobSeeker->update([
                    'is_blacklist' => JobSeeker::STATUS_BLACKLIST,
                    'blacklist_until' => date("Y-m-d", strtotime(date("Y-m-d") . " + 1 year"))
                ]);

                $message = 'Job application successfully rejected';
            }

    	} else {
    		// reject application dan masukan jobseeker ke dalam daftar blacklist selama 1 tahun
            // Reject semua application
    		$application->jobSeeker->applications()->update([
                'status' => JobApplication::STATUS_REJECT,
                'finished_at' => date('Y-m-d H:i:s')
            ]);

    		$application->jobSeeker->update([
    			'is_blacklist' => JobSeeker::STATUS_BLACKLIST,
                'blacklist_until' => date("Y-m-d", strtotime(date("Y-m-d") . " + 1 year"))
    		]);

            $message = 'Job application successfully rejected';
    	}

        $lastStage->rejected_at = date('Y-m-d H:i:s');
        $lastStage->update();

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

        $currentStage = $application->jobApplicationStages->last();
        $currentStage->accepted_at = date('Y-m-d H:i:s');
        $currentStage->update();

        $application->jobSeeker
            ->applications()
            ->where('id', '!=', $id)
            ->update([
                'status' => JobApplication::STATUS_REJECT,
                'finished_at' => date('Y-m-d H:i:s')
            ]);

        $application->update([
            'status' => JobApplication::STATUS_ACCEPTED,
            'finished_at' => date('Y-m-d H:i:s')
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

            $currentStage = $application->jobApplicationStages->last();
            $currentStage->accepted_at = date('Y-m-d H:i:s');
            $currentStage->update();

            $nextStage = $vacancyStages[$nextIndex];
        } else {
            $application->update([
                'status' => JobApplication::STATUS_IN_PROCESS
            ]);

            $application->jobSeeker
                ->applications()
                ->where('id', '!=', $id)
                ->update([
                    'status' => JobApplication::STATUS_REJECT,
                    'finished_at' => date('Y-m-d H:i:s')
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
     * Export excel based on filter
     */
    public function export(Request $request)
    {
        $status = $request->status ?? JobApplication::STATUS_IN_PROCESS;

        $filename = 'applications_in_process.xlsx';

        if ($status == JobApplication::STATUS_REJECT) {
            $filename = 'applications_rejected.xlsx';
        } elseif ($status == JobApplication::STATUS_ACCEPTED) {
            $filename = 'applications_accepted.xlsx';
        }

        $applications = $this->getData($request, $status)->get();

        return Excel::download(new JobApplicationExport($applications, $status), $filename);
    }

    /**
     * Get data filter
     */
    protected function getData($request, $status = '1')
    {
        $stage = $request->stage;
        $district = $request->district;
        $major = $request->major;
        $job = $request->job;
        $confirm = $request->confirm;
        $examDate = $request->exam_date;
        $finishedAt = $request->finish_at;

        $applications = JobApplication::with(['jobApplicationStages' => function($q) {
                $q->with('stage');
            }])
            ->with(['jobSeeker' => function($q) use($district) {
                $q->allData();
            }])
            ->with(['jobVacancy' => function($q) {
                $q->with('position', 'section', 'stages');
            }])
            ->when($district, function($q, $district) {
                $q->whereHas('jobSeeker', function($q) use($district) {
                    $q->whereHas('domicileVillage', function($p) use($district) {
                        $p->whereHas('subDistrict', function($r) use($district) {
                            $r->where('district_id', $district);
                        });
                    });
                });
            })
            ->when($major, function($q, $major) {
                $q->whereHas('jobSeeker', function($q) use($major) {
                    $q->whereHas('formalEducations', function($p) use($major) {
                        $p->where('major_id', $major);
                    });
                });
            })
            ->when($stage, function($q, $stage) use($status) {
                if ($stage == 'none') {
                    $q->doesntHave('jobApplicationStages');
                } else {
                    $q->whereHas('jobApplicationStages', function($q) use($stage, $status) {
                        $q->where('stage_id', $stage);

                        if ($status == JobApplication::STATUS_REJECT) {
                            $q->whereNull('accepted_at')
                                ->whereNotNull('rejected_at');
                        }

                        if ($status == JobApplication::STATUS_IN_PROCESS) {
                            $q->whereNull('accepted_at')
                                ->whereNull('rejected_at');
                        }
                    });
                }
            })
            ->when($job, function($q, $job) {
                $q->where('job_vacancy_id', $job);
            })
            ->when($confirm != null, function($q) use($confirm) {
                $q->whereHas('jobApplicationStages', function($q) use($confirm) {
                    $q->where('accepted_at', null)
                        ->where('rejected_at', null)
                        ->where('status', $confirm);
                });
            })
            ->when($examDate, function($q) use($examDate) {
                $q->whereHas('jobApplicationStages', function($q) use($examDate) {
                    $q->where('accepted_at', null)
                        ->where('rejected_at', null)
                        ->whereDate('exam_at', $examDate);
                });
            })
            ->when($finishedAt, function($q) use($finishedAt) {
                $q->whereDate('finished_at', $finishedAt);
            })
            ->where('status', $status);

        return $applications;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = JobApplication::findOrFail($id);

        if ($application->status != JobApplication::STATUS_REJECT) {
            return response()->json([
                'success' => true,
                'title' => 'Error',
                'message' => 'Data cannot be deleted!'
            ], 400);
        }

        $application->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Deleted !',
                'message' => 'Data has been deleted'
            ], 200);
        };

        return redirect()->back()->with([
            'message' => 'success'
        ]);
    }

    /**
     *
     */
    public function assignVacancy(Request $request, $id)
    {
        $jobVacancy = JobVacancy::findOrFail($id);
        $jobSeeker = JobSeeker::findOrFail($request->job_seeker_id);

        if ($jobSeeker->applications->count() >= 3) {
            return response()->json([
                'success' => true,
                'title' => 'Error',
                'message' => 'Cannot assign job vacancy because job seeker has more than 2 applications'
            ], 400);
        }

        if ($jobSeeker->applications()->where('id', $jobVacancy->id)->first()) {
            return response()->json([
                'success' => true,
                'title' => 'Error',
                'message' => 'Cannot assign job vacancy because job vacancy alredy assigned'
            ], 400);
        }

        if ($jobSeeker->applications()->where('status', JobApplication::STATUS_IN_PROCESS)->first()) {
            return response()->json([
                'success' => true,
                'title' => 'Error',
                'message' => 'Cannot assign job vacancy because job seeker in another recruitment process'
            ], 400);
        }

        if ($jobSeeker->applications()->where('status', JobApplication::STATUS_ACCEPTED)->first()) {
            return response()->json([
                'success' => true,
                'title' => 'Error',
                'message' => 'Cannot assign job vacancy because job seeker has accepted'
            ], 400);
        }

        $jobSeeker->applications()->create([
            'job_vacancy_id' => $jobVacancy->id,
            'status' => JobApplication::STATUS_IN_PROCESS
        ]);

        return response()->json([
            'title' => 'Success',
            'message' => 'Job vacancy has been successfully assigned'
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
