<?php

namespace App\Listeners\Auth;

use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogFailedLogin
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
    public function handle(Failed $event): void
    {
        Log::warning('Failed login attempt', [
            'email' => $event->credentials['email'] ?? null,
            'ip'    => request()->ip(),
            'time'  => now()->toDateTimeString(),
        ]);
    }
}
