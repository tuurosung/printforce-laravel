<?php

namespace App\Http\Controllers\Invoices;

use Illuminate\Http\Request;
use App\Models\CustomerInvoices;
use App\Models\Customers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Invoices\CustomerInvoice;
use App\Http\Requests\Customers\StoreCustomerRequest;
use App\Http\Requests\Invoices\StoreCustomerInvoiceRequest;
use App\Services\CustomerService;

class CustomerInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.invoices.invoices', [
            'customerInvoices' => CustomerInvoice::activeInvoices()->get(),
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
        $invoiceCreated = CustomerInvoice::create(
            $request->validated()
        );

        if (!$invoiceCreated) {
            return redirect()->back()->with('error', 'Failed to create invoice. Please try again.');
        }

        Session::put('active_customer_invoice', [
            'invoice_id' => $invoiceCreated->invoice_id,
            'customer_id' => $invoiceCreated->customer_id,
            'customer_category' => $invoiceCreated->customer->category,
        ]);

        return to_route('invoices.prepare-customer-invoice', $invoiceCreated);
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerInvoice $customerInvoices)
    {
        //
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
