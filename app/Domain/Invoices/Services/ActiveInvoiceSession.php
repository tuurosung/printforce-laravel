<?php

declare(strict_types = 1);

namespace App\Domain\Invoices\Services;

use App\Domain\Invoices\Models\CustomerInvoice;
use Illuminate\Support\Facades\Session;

final class ActiveInvoiceSession
{
    public static function set(CustomerInvoice $invoice): void
    {
        Session::put('active_customer_invoice', [
            'invoice_id' => $invoice->invoice_id,
            'customer_id' => $invoice->customer_id,
            'customer_category' => $invoice->customer->category
        ]);
    }


    public static function get()
    {
        return Session::get('active_customer_invoice.invoice_id');
    }


    public static function clear()
    {
        Session::forget('active_customer_invoice');
    }
}
