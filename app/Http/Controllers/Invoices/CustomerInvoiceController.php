<?php

namespace App\Http\Controllers\Invoices;

use App\Contracts\Invoices\InvoiceServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Invoices\StoreCustomerInvoiceRequest;
use App\Models\Invoices\CustomerInvoice;
use App\Services\Customers\CustomerService;
use Illuminate\Http\Request;

class CustomerInvoiceController extends Controller
{

    public function __construct(
        private readonly InvoiceServiceContract $invoiceService
    ){}



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.invoices.invoices', [
            'customerInvoices' => $this->invoiceService->getInvoices(),
            'customers' => (new CustomerService())->getAllCustomers(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerInvoiceRequest $request)
    {
        $invoice = $this->invoiceService->createInvoice($request->validated());

        $this->invoiceService->setActiveInvoiceSession($invoice);

        return to_route('invoices.prepare-customer-invoice', $invoice);
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerInvoice $customerInvoice)
    {

        return view('app.invoices.show', [
            'customerInvoice' => $customerInvoice
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerInvoice $customerInvoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerInvoice $customerInvoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerInvoice $customerInvoices)
    {
        //
    }
}
