<?php

namespace App\Observers\Purchases;

use App\Domain\Purchases\Models\Purchase;

class PurchaseObserver
{

    public function creating(Purchase $purchase): void
    {
        $purchase->purchase_id = generateDashedRandomNumber();
        $purchase->subscriber_id = auth()->user()->subscriber_id;
    }

    /**
     * Handle the Purchase "created" event.
     */
    public function created(Purchase $purchase): void
    {
        //
    }

    /**
     * Handle the Purchase "updated" event.
     */
    public function updated(Purchase $purchase): void
    {
        //
    }

    /**
     * Handle the Purchase "deleted" event.
     */
    public function deleted(Purchase $purchase): void
    {
        //
    }

    /**
     * Handle the Purchase "restored" event.
     */
    public function restored(Purchase $purchase): void
    {
        //
    }

    /**
     * Handle the Purchase "force deleted" event.
     */
    public function forceDeleted(Purchase $purchase): void
    {
        //
    }
}
