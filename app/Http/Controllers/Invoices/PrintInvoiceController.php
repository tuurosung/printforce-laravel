<?php

namespace App\Http\Controllers\Invoices;

use App\Http\Controllers\Controller;
use App\Models\Invoices\CustomerInvoice;

class PrintInvoiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CustomerInvoice $customerInvoice)
    {
        return view('app.invoices.print-invoice', [
            'customerInvoice' => $customerInvoice
        ]);
    }
}
