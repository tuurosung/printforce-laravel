<?php

namespace App\Services\Invoices;

use Illuminate\Support\Facades\Session;
use App\Models\Invoices\CustomerInvoice;

class CustomerInvoiceService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public static function generateInvoiceNumber()
    {
        return generatedNumericId(10);
    }


    public static function checkoutCustomerInvoice(CustomerInvoice $customerInvoice)
    {
        // Logic to finalize the checkout process for the customer invoice
        $customerInvoice->status = 'active';

        $customerInvoice->updateSubTotal();
        $customerInvoice->save();

        // destroy session data related to the invoice
        Session::forget('active_customer_invoice');
    }
}
