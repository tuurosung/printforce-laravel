<?php

namespace App\Domain\Invoices\Http\Controllers;


use App\Domain\Invoices\Services\InvoiceItemService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Invoices\InvoiceItems\StoreCustomerInvoiceItemRequest;
use App\Http\Requests\Invoices\InvoiceItems\UpdateCustomerInvoiceItemRequest;
use App\Models\Invoices\CustomerInvoice;
use App\Models\Invoices\CustomerInvoiceItem;
use Illuminate\Support\Facades\Log;

class CustomerInvoiceItemController extends Controller
{
    public function __construct(
        private readonly InvoiceItemService $invoiceItemService
    ){}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCustomerInvoiceItemRequest $request, CustomerInvoice $customerInvoice)
    {
        $this->invoiceItemService->addInvoiceItem($customerInvoice, $request->validated());
        return redirect()->back()->with("success", "Invoice Item Added Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerInvoiceItem $customerInvoiceItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerInvoiceItem $customerInvoiceItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerInvoiceItemRequest $request, CustomerInvoiceItem $customerInvoiceItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerInvoiceItem $customerInvoiceItem)
    {
        try {

            $this->invoiceItemService->removeInvoiceItem($customerInvoiceItem);
            return redirect()->back()->with("success","Invoice item removed successfully");

        } catch (\Exception $e) {

            Log::info($e->getMessage());
            return redirect()->back()->with("error", $e->getMessage());

        }
    }
}
