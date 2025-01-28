<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Http\Requests\Website\DocumentRequest;
use ReCaptcha\ReCaptcha;
use App\Traits\FileHandler;
use App\Models\AIIASetting;


class DocumentController extends Controller
{
	use FileHandler;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobSeeker = auth()->user();
        $document = $jobSeeker->document;

        return view('website.pages.document', compact('jobSeeker', 'document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentRequest $request)
    {
    	$jobSeeker = auth()->user();
        if (AIIASetting::getValue('recaptcha_validation')) {
            $response = (new ReCaptcha(env('RECAPTCHA_SECRET_KEY')))
                ->setExpectedHostname(env('APP_HOSTNAME'))
                ->setExpectedAction('document')
                ->verify($request->recaptcha_key, $request->ip());

            if (!$response->isSuccess()) {
                return response()->json([
                    'message' => 'ReCaptcha Error, mohon ulangi lagi',
                    'success' => false
                ], 400);
            }
        }

        $jobSeekerDoc = $jobSeeker->document;

        if ($jobSeekerDoc) {
        	$document = [];
        } else {
        	$document = new Document();
        }

        if ($cv = $request->file('cv')) {
        	if ($jobSeekerDoc) {
        		$document['cv'] = $this->uploadFiles($cv, 'cv', $jobSeeker->name, $jobSeekerDoc->cv);
        	} else {
        		$document->cv = $this->uploadFiles($cv, 'cv', $jobSeeker->name);
        	}
        }

        if ($ktp = $request->file('ktp')) {
        	if ($jobSeekerDoc) {
        		$document['ktp'] = $this->uploadFiles($ktp, 'ktp', $jobSeeker->name, $jobSeekerDoc->ktp);
        	} else {
        		$document->ktp = $this->uploadFiles($ktp, 'ktp', $jobSeeker->name);
        	}
        }

        if ($kk = $request->file('kk')) {
        	if ($jobSeekerDoc) {
        		$document['kk'] = $this->uploadFiles($kk, 'kk', $jobSeeker->name, $jobSeekerDoc->kk);
        	} else {
        		$document->kk = $this->uploadFiles($kk, 'kk', $jobSeeker->name);
        	}
        }

        if ($npwp = $request->file('npwp')) {
        	if ($jobSeekerDoc) {
        		$document['npwp'] = $this->uploadFiles($npwp, 'npwp', $jobSeeker->name, $jobSeekerDoc->npwp);
        	} else {
        		$document->npwp = $this->uploadFiles($npwp, 'npwp', $jobSeeker->name);
        	}
        }

        if ($certificate = $request->file('certificate')) {
        	if ($jobSeekerDoc) {
        		$document['certificate'] = $this->uploadFiles($certificate, 'certificate', $jobSeeker->name, $jobSeekerDoc->certificate);
        	} else {
        		$document->certificate = $this->uploadFiles($certificate, 'certificate', $jobSeeker->name);
        	}
        }

        if ($transcripts = $request->file('transcripts')) {
        	if ($jobSeekerDoc) {
        		$document['transcripts'] = $this->uploadFiles($transcripts, 'transcripts', $jobSeeker->name, $jobSeekerDoc->transcripts);
        	} else {
        		$document->transcripts = $this->uploadFiles($transcripts, 'transcripts', $jobSeeker->name);
        	}
        }

        if ($jobSeeker->document) {
        	$jobSeeker->document->update($document);
        } else {
        	$jobSeeker->document->save($document);
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diupdate'
            ]);
        }

        return redirect()->back()->with('message', 'Data berhasil diupdate');
    }

    /**
     * Download Photo
     * @return Illuminate\Http\Response
     */
    public function getFile($type)
    {
        $jobSeeker = auth()->user();
        $path = 'uploads/'.$type.'/' . $jobSeeker->document->{$type};

        if (!Storage::exists($path)) {
            abort(404);
        }

        return response()->download(storage_path('app/' . $path));
    }
}
