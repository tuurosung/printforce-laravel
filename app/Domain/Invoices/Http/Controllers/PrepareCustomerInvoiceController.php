<?php

namespace App\Domain\Invoices\Http\Controllers;

use App\Domain\PrintServices\Services\PrintServicesHandler;
use App\Facades\PrintServices;
use App\Http\Controllers\Controller;
use App\Models\Invoices\CustomerInvoice;
use App\Services\PrintServicesManager;

class PrepareCustomerInvoiceController extends Controller
{
    public function __construct(
        private readonly PrintServicesHandler $printServicesHandler
    ){}


    /**
     * Handle the incoming request.
     */
    public function __invoke(CustomerInvoice $customerInvoice)
    {
        if (!$customerInvoice->isDraft()) {
            return redirect()->back()->with("error","Invoice is already checked out and cannot be edited");
        }

        return view('app.invoices.prepare-invoice',[
            'customerInvoice' => $customerInvoice,
            'printServices' => $this->printServicesHandler->getPrintServices()
        ]);
    }
}
