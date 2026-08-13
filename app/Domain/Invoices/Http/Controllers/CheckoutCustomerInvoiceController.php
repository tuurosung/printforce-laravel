<?php

namespace App\Domain\Invoices\Http\Controllers;


use App\Domain\Invoices\Models\CustomerInvoice;
use App\Domain\Invoices\Services\ActiveInvoiceSession;
use App\Domain\Invoices\Services\InvoiceFlow;
use App\Http\Controllers\Controller;

class CheckoutCustomerInvoiceController extends Controller
{
    public function __construct(
        private readonly InvoiceFlow $invoiceFlow,
    ) {}


    /**
     * Handle the incoming request.
     */
    public function __invoke(CustomerInvoice $customerInvoice)
    {
        $this->invoiceFlow->checkout($customerInvoice);
        ActiveInvoiceSession::clear();
        return redirect()->route('invoices.index')->with('success', 'Invoice checked out successfully.');
    }
}
