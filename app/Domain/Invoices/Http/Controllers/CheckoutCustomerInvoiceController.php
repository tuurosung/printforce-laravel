<?php

namespace App\Domain\Invoices\Http\Controllers;

use App\Domain\Invoices\Contracts\InvoiceRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Invoices\CustomerInvoice;

class CheckoutCustomerInvoiceController extends Controller
{
    public function __construct(
        private readonly InvoiceRepositoryInterface $invoiceService
    ) {}

    
    /**
     * Handle the incoming request.
     */
    public function __invoke(CustomerInvoice $customerInvoice)
    {
        $this->invoiceService->checkout($customerInvoice);
        $this->invoiceService->clearActiveInvoiceSession();
        return redirect()->route('invoices.index')->with('success', 'Invoice checked out successfully.');
    }
}
