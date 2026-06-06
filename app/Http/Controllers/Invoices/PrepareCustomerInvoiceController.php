<?php

namespace App\Http\Controllers\Invoices;

use App\Facades\PrintServices;
use App\Http\Controllers\Controller;
use App\Models\Customers\Customer;
use App\Models\Invoices\CustomerInvoice;
use App\Models\Services\PrintService;
use Illuminate\Http\Request;

class PrepareCustomerInvoiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CustomerInvoice $customerInvoice)
    {
        if ($customerInvoice->status === 'active') {
            return redirect()->route('invoices.index')->with('error', 'Cannot prepare an already active invoice.');
        }

        return view('app.invoices.prepare-invoice',[
            'customerInvoice' => $customerInvoice,
            'printServices' => PrintServices::getAllServices()
        ]);
    }
}
