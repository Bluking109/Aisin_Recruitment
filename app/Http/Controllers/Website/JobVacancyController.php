<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use App\Models\JobSeeker;
use App\Models\JobApplication;
use App\Models\EducationLevel;

class JobVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$search =  $request->query('s');
    	$filter = $request->query('f');

        $jobSeeker = auth()->guard('job_seekers')->user();

    	$jobs = JobVacancy::active()
            ->when($jobSeeker, function($q, $jobSeeker) {
                $formalEducations = $jobSeeker->formalEducations;
                $majors = [];

                foreach ($formalEducations as $key => $value) {
                    $majors[] = $value->major->id;
                }
                $q->where('education_level_id', $jobSeeker->educationLevel->id)
                    ->whereHas('majors', function($q) use($majors) {
                        $q->whereIn('id', $majors);
                    });
            })
            ->when($search, function($q, $search) {
    			$q->whereHas('position', function($q) use($search) {
    				$q->where('name', 'LIKE', '%'. $search .'%');
    			})->orWhereHasMorph('section',
    				['App\Models\Section', 'App\Models\Department'], function($q) use($search) {
					$q->where('name', 'LIKE', '%'. $search .'%');
				});
    		})
    		->when($filter, function($q, $filter) {
    			$q->whereHas('educationLevel', function($q) use($filter) {
    				$q->where('name', $filter);
    			});
    		})->paginate(12);

    	$educationLevels = EducationLevel::all();

        return view('website.pages.job_list', compact('jobs', 'educationLevels'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $jobSeeker = auth()->guard('job_seekers')->user();

    	$job = JobVacancy::active()->slug($slug)
            ->when($jobSeeker, function($q, $jobSeeker) {
                $q->where('education_level_id', $jobSeeker->educationLevel->id);
            })
            ->first();

    	if (!$job) {
    		abort(404);
    	}

        return view('website.pages.job', compact('job'));
    }

    /**
     * Apply Job Vacancy
     * @return \Illuminate\Http\Response
     */
    public function applyJob(Request $request, $slug)
    {
        $jobSeeker = auth()->user();
        $job = JobVacancy::active()->slug($slug)
            ->where('education_level_id', $jobSeeker->educationLevel->id)
            ->first();

        if (!$job) {
            abort(404);
        }

        $formalEducations = $jobSeeker->formalEducations;

        $majorPass = false;

        foreach ($formalEducations as $key => $value) {
            $majors = $job->majors;

            foreach ($majors as $k => $v) {
                if ($v->id == $value->major->id) {
                    $majorPass = true;
                }
            }
        }

        if (!$majorPass) {
            return back()->with('error', 'Mohon maaf jurusan pendidikan Anda tidak sesuai kualifikasi');
        }

        if (!$jobSeeker->canApply()) {
            return back()->with('error', 'Mohon lengkapi profil Anda terlebih dahulu !');
        }

        // check verifikasi email
        if (!$jobSeeker->hasVerifiedEmail()) {
            return back()->with('error', 'Mohon verifikasi email Anda terlebih dahulu, apabila tidak ada email kunjungi halaman profil Anda untuk mengirim ulang email verifikasi.');
        }

        // check jenis kelamin
        $gender = $jobSeeker->gender;
        $genderValidation = true;

        if ($job->gender == JobVacancy::GENDER_MALE) {
            if ($gender == JobSeeker::GENDER_WOMAN) {
                $genderValidation = false;
            }
        }

        if ($job->gender == JobVacancy::GENDER_FEMALE) {
            if ($gender == JobSeeker::GENDER_MAN) {
                $genderValidation = false;
            }
        }

        if (!$genderValidation) {
            return back()->with('error', 'Mohon maaf jenis kelamin Anda tidak sesuai dengan kualifikasi !');
        }

        // check umur
        if ($jobSeeker->age >= $job->max_age) {
            return back()->with('error', 'Mohon maaf umur Anda melebiihi batas yang di bolehkan');
        }

        $eduLevel = $job->educationLevel->hierarchy;
        $edu = $jobSeeker->formalEducations()->where('class', $eduLevel)->first();
        // check ipk apabila D3/S1
        if ($jobSeeker->educationLevel->isDiplomaForm()) {
            if ($edu) {
                if ($edu->grade_point < $job->min_gpa) {
                    return back()->with('error', 'Mohon maaf IPK Anda tidak memenuhi kualifikasi');
                }
            }
        }

        // validasi tidak ada proses recruitment berjalan
        $runningApp = $jobSeeker->applications()
            ->whereHas('jobApplicationStages', function($q) {
                $q->where('accepted_at', null)
                    ->where('rejected_at', null);
            })
            ->first();

        if ($runningApp) {
            return back()->with('error', 'Mohon maaf Anda tidak dapat melamar pekerjaan karena sedang ada proses recruitment berjalan');
        }

        // validasi apabila jobseeker punya applikasi yang sudah di terima.
        $acceptedAt = $jobSeeker->applications()
            ->where('status', JobApplication::STATUS_ACCEPTED)
            ->first();

        if ($acceptedAt) {
            return back()->with('error', 'Mohon maaf Anda tidak dapat melamar pekerjaan karena pernah bekerja di AIIA');
        }

        // check matematika apabila SMA
        if ($jobSeeker->educationLevel->isHighSchoolForm()) {
            if ($edu) {
                if (($edu->un_math_score + $edu->average_math_score) / 2 < $job->min_math_score) {
                    return back()->with('error', 'Mohon maaf Nilai Rata-rata MTK Anda tidak memenuhi kualifikasi');
                }
            }
        }

        // maksimal melamar loker adalah 3
        if ($jobSeeker->applications->count() >= 3) {
            return back()->with('error', 'Mohon batas maksimal loker yang dapat dilamar adalah 3 !');
        }

        // validasi apakah sudah pernah di apply sebelumnya
        if ($jobSeeker->applications()->where('job_vacancy_id', $job->id)->first()) {
            return back()->with('error', 'Anda sudah melamar lowongan ini');
        }

        $jobSeeker->applications()->create([
            'job_vacancy_id' => $job->id,
            'status' => JobApplication::STATUS_IN_PROCESS
        ]);

        return back()->with('success', 'Terimakasih sudah melamar untuk pekerjaan ini :D');
    }
}
