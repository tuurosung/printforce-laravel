<?php

namespace App\Domain\Invoices\Http\Controllers;


use App\Facades\PrintServices;
use App\Http\Controllers\Controller;
use App\Models\Invoices\CustomerInvoice;

class PrepareCustomerInvoiceController extends Controller
{
    public function __construct(

    ) {}


    /**
     * Handle the incoming request.
     */
    public function __invoke(CustomerInvoice $customerInvoice)
    {
        $this->guardActive($customerInvoice);

        return view('app.invoices.prepare-invoice',[
            'customerInvoice' => $customerInvoice,
        ]);
    }


    private function guardActive(CustomerInvoice $customerInvoice)
    {
        if (!$customerInvoice->isDraft()) {
            return redirect()->back()->with("error", "Invoice is already checked out and cannot be edited");
        }
    }
}
