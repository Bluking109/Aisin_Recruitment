<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a personal identity page
     *
     * @return \Illuminate\Http\Response
     */
    public function indexIdentity(Request $request)
    {
        return view('website.pages.personal_identity');
    }

    /**
     * Display a education page
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEducation(Request $request)
    {
        return view('website.pages.education');
    }

    /**
     * Display a family environtment
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFamilyEnvirontment(Request $request)
    {
        return view('website.pages.family_environment');
    }

     /**
     * Display a work experience page
     *
     * @return \Illuminate\Http\Response
     */
    public function indexWorkExperience(Request $request)
    {
        return view('website.pages.work_experience');
    }

    /**
     * Display a personal interest page
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPersonalInterestConcept(Request $request)
    {
        return view('website.pages.personal_interest_concept');
    }

    /**
     * Display a document page
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDocument(Request $request)
    {
        return view('website.pages.document');
    }

    /**
     * Display a social activity
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSocialActivity(Request $request)
    {
        return view('website.pages.social_activity');
    }

    /**
     * Display a other page
     *
     * @return \Illuminate\Http\Response
     */
    public function indexOther(Request $request)
    {
        return view('website.pages.other');
    }

    /**
     * Display a applied job
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAppliedJob(Request $request)
    {
        return view('website.pages.applied_job');
    }
}
