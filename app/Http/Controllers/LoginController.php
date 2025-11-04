<?php

namespace App\Http\Controllers;

use App\Services\Alerts\LoginAlertService;
use App\Services\Alerts\MessagingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

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
            $this->loginAlertService->send($request);

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password',
        ])->onlyInput('email');
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
