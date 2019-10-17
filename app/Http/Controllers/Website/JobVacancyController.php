<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
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

    	$jobs = JobVacancy::active()->when($search, function($q, $search) {
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
    	$job = JobVacancy::slug($slug)->first();

    	if (!$job) {
    		abort(404);
    	}

        return view('website.pages.job', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
