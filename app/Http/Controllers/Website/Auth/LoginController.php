<?php

namespace App\Http\Controllers\Website\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use ReCaptcha\ReCaptcha;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    /**
     * constuct
     */
    public function __construct()
    {
        $this->redirectTo = route('home');
        $this->middleware('guest:job_seekers')->except('logout');
    }

    public function guard()
    {
        return Auth::guard('job_seekers');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($request->ajax()) {
            $redirectTo = session()->get('redirect_to_sess');
            session()->forget('redirect_to_sess');

            return response()->json([
                'message' => 'Log in success',
                'success' => true,
                'redirect' => $redirectTo
            ]);
        }
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $response = (new ReCaptcha(env('RECAPTCHA_SECRET_KEY')))
            ->setExpectedHostname(env('APP_HOSTNAME'))
            ->setExpectedAction('homepage')
            ->verify($request->recaptcha_key, $request->ip());

        if (!$response->isSuccess()) {
            return response()->json([
                'message' => 'ReCaptcha Error, mohon ulangi lagi',
                'success' => false
            ], 400);
        }

        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
