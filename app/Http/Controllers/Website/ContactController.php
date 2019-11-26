<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Requests\Website\ContactRequest;
use App\Http\Controllers\Controller;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use ReCaptcha\ReCaptcha;
use AIIASetting;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.pages.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        if (AIIASetting::getValue('recaptcha_validation')) {
            $response = (new ReCaptcha(env('RECAPTCHA_SECRET_KEY')))
                ->setExpectedHostname(env('APP_HOSTNAME'))
                ->setExpectedAction('contact')
                ->verify($request->recaptcha_key, $request->ip());

            if (!$response->isSuccess()) {
                return redirect()->back()->with('error', 'ReCaptcha Error');
            }
        }

        $data = $request->all();

        Mail::to(AIIASetting::getValue('email_contact'))->send(new ContactMessage($data));

        return redirect()->back()->with('success', 'Pesan terkirim, Terimakasih');
    }
}
