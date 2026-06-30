<?php

namespace App\Observers\Invoices;

use App\Models\Invoices\CustomerInvoiceItem;

class CustomerInvoiceItemObserver
{

    public function creating(CustomerInvoiceItem $customerInvoiceItem): void
    {
        $customerInvoiceItem->subscriber_id = auth()->user()->subscriber_id;
    }

    /**
     * Handle the CustomerInvoiceItem "created" event.
     */
    public function created(CustomerInvoiceItem $customerInvoiceItem): void
    {
        //
    }

    /**
     * Handle the CustomerInvoiceItem "updated" event.
     */
    public function updated(CustomerInvoiceItem $customerInvoiceItem): void
    {
        //
    }

    /**
     * Handle the CustomerInvoiceItem "deleted" event.
     */
    public function deleted(CustomerInvoiceItem $customerInvoiceItem): void
    {
        //
    }

    /**
     * Handle the CustomerInvoiceItem "restored" event.
     */
    public function restored(CustomerInvoiceItem $customerInvoiceItem): void
    {
        //
    }

    /**
     * Handle the CustomerInvoiceItem "force deleted" event.
     */
    public function forceDeleted(CustomerInvoiceItem $customerInvoiceItem): void
    {
        //
    }
}
