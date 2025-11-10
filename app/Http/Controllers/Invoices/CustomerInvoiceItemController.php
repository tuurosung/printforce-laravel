<?php

namespace App\Http\Controllers\Invoices;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Invoices\CustomerInvoiceItem;
use App\Http\Requests\Invoices\InvoiceItems\StoreCustomerInvoiceItemRequest;
use App\Http\Requests\Invoices\InvoiceItems\UpdateCustomerInvoiceItemRequest;
use App\Models\Invoices\CustomerInvoice;

class CustomerInvoiceItemController extends Controller
{
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

        if (!Session::has('active_customer_invoice.invoice_id')) {
            return redirect()->back()->with('error', 'No active customer invoice found in session.');
        }

        $data = [
            'invoice_id' => Session::get('active_customer_invoice.invoice_id'),
            ...$request->validated()
        ];

        if (CustomerInvoiceItem::create($data)) {

            $customerInvoice->updateSubTotal();

            return redirect()->back()->with('success', 'Invoice item added successfully.');
        }

        return redirect()->back()->with('error', 'Failed to add invoice item.');
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
        //
    }
}
