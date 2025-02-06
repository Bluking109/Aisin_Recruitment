<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ChangePasswordRequest;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('home');
        $this->middleware('guest');
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        return redirect()->route('home')->with(
            ['token' => $token, 'email' => $request->email, 'reset_password' => true]
        );
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse(Request $request, $response)
    {
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => trans($response)
            ], 200);
        }

        return redirect($this->redirectPath())
                            ->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        if ($request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => trans($response)
            ], 422);
        }

        return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('job_seekers');
    }

    /**
     * Change password controller
     *
     * @return \Illuminate\Http\Response
     */
    public function change(ChangePasswordRequest $request)
    {
        $jobSeeker = auth()->guard('job_seekers')->user();

        if (!password_verify($request->old_password, $jobSeeker->password)) {
            return response()->json([
                'errors' => [
                    'old_password' => ['Password lama salah']
                ],
                'message' => "The given data was invalid."
            ], 422);
        }

        if ($request->old_password === $request->password) {
            return response()->json([
                'errors' => [
                    'password' => ['Password baru tidak boleh sama dengan password lama']
                ],
                'message' => "The given data was invalid."
            ], 422);
        }

        $jobSeeker->update(['password' => Hash::make($request->password)]);

        return response()->json([
            'success' => true,
            'message' => 'Password berhasil di ubah'
        ], 200);
    }
}
