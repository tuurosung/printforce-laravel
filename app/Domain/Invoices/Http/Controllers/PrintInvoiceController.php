<?php

namespace App\Domain\Invoices\Http\Controllers;

use App\Domain\Invoices\Models\CustomerInvoice;
use App\Http\Controllers\Controller;

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
