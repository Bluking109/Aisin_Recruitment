<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use App\Models\JobApplication;
use App\Models\JobSeeker;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalVacancies = JobVacancy::active()
            ->get()
            ->count();

        $totalApplicationProcess = JobApplication::where('status', JobApplication::STATUS_IN_PROCESS)
            ->get()
            ->count();

        $totalJobSeekers = JobSeeker::get()->count();

        $jobApplication = JobApplication::with('jobSeeker')
            ->with(['jobVacancy' => function($q) {
                $q->with('position', 'section');
            }])
            ->whereHas('jobVacancy', function($q) {
                $q->active();
            })
            ->get()
            ->toArray();

        $jobApplication = collect($jobApplication)->groupBy('job_vacancy_id')->toArray();

        $todayApplications = JobApplication::with('jobSeeker.educationLevel')
            ->with(['jobVacancy' => function($q) {
                $q->with('position', 'section');
            }])
            ->whereHas('jobVacancy', function($q) {
                $q->active();
            })
            ->whereDate('created_at', date('Y-m-d'))
            ->orderBy('created_at', 'asc')
            ->limit(10)
            ->get();

        return view('admin.pages.dashboard', compact('totalVacancies', 'totalApplicationProcess', 'totalJobSeekers', 'jobApplication', 'todayApplications'));
    }
}
