<?php

namespace App\Observers\Accounts;

use App\Domain\Accounts\Models\OperatingAccount;
use Illuminate\Support\Facades\Auth;

class OperatingAccountObserver
{
    /**
     * Handle the OperatingAccount "created" event.
     */
    public function creating(OperatingAccount $operatingAccount): void
    {
        $operatingAccount->account_number = self::generateAccountNumber();
        $operatingAccount->subscriber_id = Auth::user()->subscriber_id;
    }

    /**
     * Handle the OperatingAccount "updated" event.
     */
    public function updated(OperatingAccount $operatingAccount): void
    {
        //
    }

    /**
     * Handle the OperatingAccount "deleted" event.
     */
    public function deleted(OperatingAccount $operatingAccount): void
    {
        //
    }

    /**
     * Handle the OperatingAccount "restored" event.
     */
    public function restored(OperatingAccount $operatingAccount): void
    {
        //
    }

    /**
     * Handle the OperatingAccount "force deleted" event.
     */
    public function forceDeleted(OperatingAccount $operatingAccount): void
    {
        //
    }

    private static function generateAccountNumber()
    {
        $count = OperatingAccount::count() + 1;
        return 1000000 + $count;
    }
}
