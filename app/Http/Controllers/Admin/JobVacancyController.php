<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobVacancy as JobVacanyRequest;
use App\Models\JobVacancy;
use DataTables;

class JobVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $jobvacancies = JobVacancy::with('position', 'education_level')->select('job_vacancies.*');
            return DataTables::eloquent($jobvacancies)->toJson();
        }

        return view('admin.pages.jobvacancies.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobVacanyRequest $request)
    {
        // dd($request->all());
        $newJob = JobVacancy::create($request->all());

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Inserted !',
                'message' => $request['name'].' has been inserted'
            ], 200);
        }

        return redirect()->back()->with([
            'success' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobVacanyRequest $request, $id)
    {
        $updateJob = JobVacancy::findOrFail($id);
        $updateJob->fill([
            'position_id' => $request->position_id,
            'education_level_id' => $request->education_level_id,
            'open_date' => $request->open_date,
            'close_date' => $request->close_date,
            'gender' => $request->gender,
            'min_gpa' => $request->min_gpa,
            'descriptions' => $request->descriptions,
            'requirements' => $request->requirements,
        ]);

        if ($updateJob->isClean()) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'no changes'
                ], 422);
            }
            return redirect()->back()->with([
                'success' => true
            ]);
        }

        $updateJob->save();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Updated !',
                'message' => 'Job Vacancy has been updated'
            ], 200);
        }

        return redirect()->back()->with([
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobvacancy = JobVacancy::findOrFail($id);
        $jobvacancy->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Deleted !',
                'message' => $jobvacancy->position->name.' has been deleted'
            ], 200);
        };

        return redirect()->back()->with([
            'message' => 'success'
        ]);
    }
}
