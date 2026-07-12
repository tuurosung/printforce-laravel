<?php

namespace App\Observers;

use App\Domain\Payments\Models\CustomerPayment;

class CustomerPaymentObserver
{

    public function creating(CustomerPayment $customerPayment)
    {
            $customerPayment->payment_id = generateDashedRandomNumber();
            $customerPayment->subscriber_id = auth()->user()->subscriber_id;
    }


    /**
     * Handle the CustomerPayment "created" event.
     */
    public function created(CustomerPayment $customerPayment): void
    {
        //
    }

    /**
     * Handle the CustomerPayment "updated" event.
     */
    public function updated(CustomerPayment $customerPayment): void
    {
        //
    }

    /**
     * Handle the CustomerPayment "deleted" event.
     */
    public function deleted(CustomerPayment $customerPayment): void
    {
        //
    }

    /**
     * Handle the CustomerPayment "restored" event.
     */
    public function restored(CustomerPayment $customerPayment): void
    {
        //
    }

    /**
     * Handle the CustomerPayment "force deleted" event.
     */
    public function forceDeleted(CustomerPayment $customerPayment): void
    {
        //
    }
}
