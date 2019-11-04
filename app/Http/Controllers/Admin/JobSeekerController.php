<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\JobSeeker;
use App\Models\JobApplication;
use App\Traits\FileHandler;
use DataTables;
use PDF;

class JobSeekerController extends Controller
{
    use FileHandler;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blacklist = $request->query('blacklist');

        if ($request->ajax()) {
            $jobSeekers = JobSeeker::allData()
                ->when($blacklist, function($q) {
                    $q->blacklist();
                }, function($q) {
                    $q->unBlacklist();
                })
                ->with('educationLevel');

            return DataTables::eloquent($jobSeekers)->toJson();
        }

        return view('admin.pages.job_seekers.index');
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
    public function show($id)
    {
        $jobSeeker = JobSeeker::allData()->findOrFail($id);

        return view('admin.pages.job_seekers.show', compact('jobSeeker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        DB::transaction(function () use ($id) {
            $jobSeeker = JobSeeker::allData()->findOrFail($id);
            $jobSeeker->delete();

            if ($photo = $jobSeeker->photo) {
                $this->deleteFile('uploads/foto/' . $photo);
            }

            if ($document = $jobSeeker->document) {
                $this->deleteFile('uploads/certificate/'.$document->certificate);
                $this->deleteFile('uploads/cv/'.$document->cv);
                $this->deleteFile('uploads/transcripts/'.$document->transcripts);
                $this->deleteFile('uploads/ktp/'.$document->ktp);
                $this->deleteFile('uploads/kk/'.$document->kk);
                $this->deleteFile('uploads/npwp/'.$document->npwp);
            }
        });

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
     * Download Photo
     * @return Illuminate\Http\Response
     */
    public function getPhoto($id)
    {
        $jobSeeker = JobSeeker::allData()->findOrFail($id);

        $path = public_path('admin/images/avatar/avatar.jpg');

        if ($jobSeeker->photo) {
            $path = 'uploads/foto/' . $jobSeeker->photo;
            if (!Storage::exists($path)) {
                abort(404);
            }

            $path = storage_path('app/' . $path);
        }

        return response()->file($path);
    }

    /**
     * Set jobseeker to blacklist
     * @param  int $id
     * @return Illuminate\Http\Response
     */
    public function updateBlacklist(Request $request, $id)
    {
        $jobSeeker = JobSeeker::allData()->findOrFail($id);

        $jobSeeker->update([
            'is_blacklist' => JobSeeker::STATUS_BLACKLIST,
            'blacklist_until' => $request->blacklist_until ?? date("Y-m-d", strtotime(date("Y-m-d") . " + 730 day"))
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Updated !',
                'message' => 'Job seekers have been blacklisted successfully'
            ], 200);
        }

        return redirect()->route('admin.pages.job_seekers.index')
            ->with('success', true)
            ->with('message', 'Job seekers have been blacklisted successfully');
    }

    /**
     * Set jobseeker to whitelist
     * @param  Request $request
     * @param  int  $id
     * @return Illuminate\Http\Response
     */
    public function updateUnblacklist(Request $request, $id)
    {
        $jobSeeker = JobSeeker::allData()->findOrFail($id);

        $jobSeeker->update([
            'is_blacklist' => JobSeeker::STATUS_UNBLACKLIST,
            'blacklist_until' => null
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'title' => 'Updated !',
                'message' => 'Job seekers have been unblacklisted successfully'
            ], 200);
        }

        return redirect()->route('admin.pages.job_seekers.index')
            ->with('success', true)
            ->with('message', 'Job seekers have been unblacklisted successfully');
    }

    /**
     * Download document
     * @return Illuminate\Http\Response
     */
    public function getDocument($job_seeker, $type)
    {
        $jobSeeker = JobSeeker::allData()->findOrFail($job_seeker);
        $path = 'uploads/'.$type.'/' . $jobSeeker->document->{$type};

        if (!Storage::exists($path)) {
            abort(404);
        }

        return response()->download(storage_path('app/' . $path));
    }

    public function test()
    {
        // $pdf = PDF::loadView('admin.pdf.job_seeker_smk');
        // return $pdf->download('Pelamar.pdf');
    }

    /**
     * download pdf jobseekers
     * @return file
     */
    public function getPdf($id)
    {
        $jobSeeker = JobSeeker::allData()->findOrFail($id);

        $path = public_path('admin/images/avatar/avatar.jpg');

        if ($jobSeeker->photo) {
            $path = 'uploads/foto/' . $jobSeeker->photo;
            if (!Storage::exists($path)) {
                abort(404);
            }

            $path = storage_path('app/' . $path);
        }

        $imagedata = file_get_contents($path);
             // alternatively specify an URL, if PHP settings allow
        $profilPhoto = 'data:image/jpg;base64,' . base64_encode($imagedata);

        if ($jobSeeker->educationLevel->isAssociateForm()) {
            $pdf = PDF::loadView('admin.pdf.job_seeker_d3_s1', compact('jobSeeker', 'profilPhoto'));
            return $pdf->download('Data-'.$jobSeeker->name.'.pdf');
        } elseif ($jobSeeker->educationLevel->isHighSchoolForm()) {
            $pdf = PDF::loadView('admin.pdf.job_seeker_smk', compact('jobSeeker', 'profilPhoto'));
            return $pdf->download('Data-'.$jobSeeker->name.'.pdf');
        }
    }
}
