<?php

namespace App\Observers\Expenditure;

use App\Domain\Expenditure\Models\Expenditure;
use Illuminate\Support\Facades\Auth;

class ExpenditureObserver
{
    /**
     * Handle the Expenditure "created" event.
     */
    public function creating(Expenditure $expenditure): void
    {
        $expenditure->expenditure_id = generateDashedRandomNumber();
        $expenditure->subscriber_id = Auth::user()->subscriber_id;
    }

    /**
     * Handle the Expenditure "updated" event.
     */
    public function updated(Expenditure $expenditure): void
    {
        //
    }

    /**
     * Handle the Expenditure "deleted" event.
     */
    public function deleted(Expenditure $expenditure): void
    {
        //
    }

    /**
     * Handle the Expenditure "restored" event.
     */
    public function restored(Expenditure $expenditure): void
    {
        //
    }

    /**
     * Handle the Expenditure "force deleted" event.
     */
    public function forceDeleted(Expenditure $expenditure): void
    {
        //
    }
}
