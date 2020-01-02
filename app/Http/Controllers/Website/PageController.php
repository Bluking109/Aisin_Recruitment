<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Announcement;
use App\Models\HowToApply;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        $about = About::active()->first();
        $announcements = Announcement::active()->get();

        return view('website.pages.home', compact('about','announcements'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function howToApply(Request $request)
    {
        $howToApply = HowToApply::active()->first();

        return view('website.pages.how_to_apply', compact('howToApply'));
    }
}
