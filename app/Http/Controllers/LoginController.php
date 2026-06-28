<?php

namespace App\Http\Controllers;

use App\Mail\LoginAlertMail;
use App\Notifications\LoginNotification;
use App\Services\Alerts\LoginAlertService;
use App\Services\Alerts\MessagingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Resend;

class LoginController extends Controller
{


    public function __construct(
        private $loginAlertService = new LoginAlertService()
    ){}



    public function authenticate(Request $request): RedirectResponse
    {
        $credentials =  $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // default password test_admin
        // $2y$12$ycSjjkcyu3xXXPBZIY0cD.4c4jAwG1OeDqSAkkD8krCVNe2F1srs6

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // set subscriber session
            Session::put('active_subscriber', Auth::user()->subscriber_id);

            // send login alert
            // $this->loginAlertService->send($request);
            // Mail::to(Auth::user()->email)->send(new LoginAlertMail(Auth::user(), $request->ip(), now()));
            // $resend = Resend::client(env('RESEND_API_KEY'));

            // $resend->emails->send([
            //     'from' => 'onboarding@resend.dev',
            //     'to' => 'info@printforcepos.com',
            //     'subject' => 'Hello World',
            //     'html' => '<p>Congrats on sending your <strong>first email</strong>!</p>'
            // ]);

            $details = [
                'ip' => $request->ip(),
                'time' => now()->toDateTimeString(),
            ];

            Notification::route('mail', 'info@printforcepos.com')
                ->notify(new LoginNotification($details));

            return redirect()->intended('dashboard');
        }

        Log::error('Login failed');

        return back()->withErrors([
            'email' => 'Invalid email or password',
        ])->onlyInput('email');
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
