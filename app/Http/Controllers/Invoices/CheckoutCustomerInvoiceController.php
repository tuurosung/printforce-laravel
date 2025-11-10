<?php

namespace App\Http\Controllers\Invoices;

use App\Http\Controllers\Controller;
use App\Models\Invoices\CustomerInvoice;
use App\Services\Invoices\CustomerInvoiceService;
use Illuminate\Http\Request;
use Session;

class CheckoutCustomerInvoiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CustomerInvoice $customerInvoice)
    {
        CustomerInvoiceService::checkoutCustomerInvoice($customerInvoice);
        return redirect()->route('invoices.index')->with('success', 'Invoice checked out successfully.');
    }
}
