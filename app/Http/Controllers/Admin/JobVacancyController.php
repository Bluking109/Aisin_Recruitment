<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
            $jobvacancies = JobVacancy::with('position', 'educationLevel', 'section')
                ->orderBy('id', 'desc')
                ->get();
            return DataTables::collection($jobvacancies)->toJson();
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
        DB::transaction(function () use ($request) {
            $section = $request->section;

            $secType = explode('_', $section);

            $newJob = JobVacancy::create([
                'position_id' => $request->position_id,
                'section_type' => $secType[0],
                'section_id' => $secType[1],
                'image' => $request->image,
                'education_level_id' => $request->education_level_id,
                'open_date' => $request->open_date,
                'close_date' => $request->close_date,
                'gender' => $request->gender,
                'min_gpa' => $request->min_gpa ?? 0,
                'max_age' => $request->max_age,
                'min_math_score' => $request->min_math_score ?? 0,
                'descriptions' => $request->descriptions,
                'requirements' => $request->requirements,
            ]);

            $stages = [];
            foreach ($request->stages as $key => $value) {
                $stages[$value] = [
                    'order_index' => (int) $key + 1
                ];
            }

            $newJob->stages()->attach($stages);

            $newJob->update([
                'slug' => Str::slug($newJob->position->name . ' ' . $newJob->section->name . ' ' . uniqid(), '-')
            ]);
        });

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Inserted !',
                'message' => 'Data has been inserted'
            ], 200);
        }

        return redirect()->route('admin.job-vacancies.index')
            ->with('success', true)
            ->with('message', 'Job Vacancy has been inserted');
    }

    /**
     * Show edit page
     *
     * @param  integer $id id of vacancies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobVacancy = JobVacancy::with('position', 'educationLevel', 'section')->with(['stages' => function($q) {
            $q->orderBy('order_index', 'asc');
        }])->findOrFail($id);

        return view('admin.pages.jobvacancies.create_update', compact('jobVacancy'));
    }

    /**
     * Create view
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.jobvacancies.create_update');
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
        DB::transaction(function () use ($request, $id) {
            $section = $request->section;

            $secType = explode('_', $section);

            $updtJob = JobVacancy::findOrFail($id);

            $updtJob->update([
                'position_id' => $request->position_id,
                'section_type' => $secType[0],
                'section_id' => $secType[1],
                'image' => $request->image,
                'education_level_id' => $request->education_level_id,
                'open_date' => $request->open_date,
                'close_date' => $request->close_date,
                'gender' => $request->gender,
                'min_gpa' => $request->min_gpa,
                'max_age' => $request->max_age,
                'min_math_score' => $request->min_math_score,
                'descriptions' => $request->descriptions,
                'requirements' => $request->requirements,
            ]);

            $stages = [];

            foreach ($request->stages as $key => $value) {
                $stages[$value] = [
                    'order_index' => (int) $key + 1
                ];
            }

            $updtJob->stages()->sync($stages);

            $updtJob->update([
                'slug' => Str::slug($updtJob->position->name . ' ' . $updtJob->section->name . ' ' . uniqid(), '-')
            ]);
        });

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Updated !',
                'message' => 'Job Vacancy has been updated'
            ], 200);
        }

        return redirect()->route('admin.job-vacancies.index')
            ->with('success', true)
            ->with('message', 'Job Vacancy has been updated');
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

    /**
     * Display listing of job vacancy
     *
     * @return \Illuminate\Http\Response
     */
    public function getJobVacancies(Request $request)
    {
        $search = $request->search;
        $jobVacancies = JobVacancy::with('position', 'section')
            ->when($search, function($q, $search) {
                $q->whereHas('position', function($q) use($search) {
                    $q->where('name', 'like', '%'.$search.'%');
                })->orWhereHasMorph('section',
                    ['App\Models\Section', 'App\Models\Department'], function($q) use($search) {
                    $q->where('name', 'LIKE', '%'. $search .'%')
                        ->orWhere('code', 'LIKE', '%'. $search .'%');
                });
            })
            ->get();

        return response()->json($jobVacancies, 200);
    }
}
