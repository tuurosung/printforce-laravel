<?php

namespace App\Observers\Purchases;

use App\Domain\Purchases\Models\PurchasePayment;

class PurchasePaymentObserver
{

    public function creating(PurchasePayment $purchasePayment): void
    {
        $purchasePayment->subscriber_id = auth()->user()->subscriber_id;
        $purchasePayment->payment_id = generateRandomString();
    }

    /**
     * Handle the PurchasePayment "created" event.
     */
    public function created(PurchasePayment $purchasePayment): void
    {
        //
    }

    /**
     * Handle the PurchasePayment "updated" event.
     */
    public function updated(PurchasePayment $purchasePayment): void
    {
        //
    }

    /**
     * Handle the PurchasePayment "deleted" event.
     */
    public function deleted(PurchasePayment $purchasePayment): void
    {
        //
    }

    /**
     * Handle the PurchasePayment "restored" event.
     */
    public function restored(PurchasePayment $purchasePayment): void
    {
        //
    }

    /**
     * Handle the PurchasePayment "force deleted" event.
     */
    public function forceDeleted(PurchasePayment $purchasePayment): void
    {
        //
    }
}
