<?php

namespace App\Listeners\Auth;

use App\Notifications\LoginNotification;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class HandleSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }


    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        Session::put('active_subscriber', $event->user->subscriber_id);

        Log::info('Successful login', [
            'email' => $event->user->email,
            'ip'    => request()->ip(),
            'time'  => now()->toDateTimeString(),
        ]);

        try {
            Notification::route('mail', 'info@printforcepos.com')
                ->notify(new LoginNotification([
                    'ip'   => request()->ip(),
                    'time' => now()->toDateTimeString(),
                ]));
        } catch (\Exception $e) {
            Log::error('Failed to send login notification', ['error' => $e->getMessage()]);
        }
    }
}
