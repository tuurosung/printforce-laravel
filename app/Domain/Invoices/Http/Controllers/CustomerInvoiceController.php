<?php

namespace App\Domain\Invoices\Http\Controllers;

use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Domain\Invoices\Services\InvoiceService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Invoices\StoreCustomerInvoiceRequest;
use App\Models\Invoices\CustomerInvoice;
use Illuminate\Http\Request;

class CustomerInvoiceController extends Controller
{

    public function __construct(
        private readonly InvoiceService $invoiceService,
        private readonly CustomerRepositoryInterface $customerService
    ){}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.invoices.invoices', [
            'customerInvoices' => $this->invoiceService->getInvoices(),
            'customers' => $this->customerService->getAllCustomers(),
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
        try {

            $invoice = $this->invoiceService->createInvoice(
                $request->validated()
            );

            return to_route('invoices.prepare-customer-invoice', $invoice);

        } catch (\DomainException $e) {
            \Illuminate\Support\Facades\Log::error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
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
    public function destroy(CustomerInvoice $customerInvoice)
    {
        try {

            $this->invoiceService->deleteInvoice($customerInvoice);
            return redirect()->back()->with('success','Invoice Deleted Successfully');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());

        }
    }
}
