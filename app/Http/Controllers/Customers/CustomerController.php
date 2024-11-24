<?php

namespace App\Http\Controllers\Customers;

use App\Models\Service;
use App\Models\PressJob;
use App\Models\DesignJob;
use Illuminate\Http\Request;
use App\Models\EmbroideryJob;
use App\Models\LargeFormatJob;
use App\Models\CustomerPayment;
use App\Models\CustomerCategory;
use App\Models\CustomerInvoices;
use App\Models\Customers\Customer;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    private $customer;

    public function __construct()
    {
        $this->customer = new Customer();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $customers = Customer::orderBy('name')->get();
        $customers->load('largeFormatJobs', 'embroideryJobs', 'pressJobs', 'designJobs', 'payments');

        // with(['largeFormatJobs', 'embroideryJobs'])
        // ->orderBy('name')->get();

        $totalCustomerDebit = Customer::totalCustomerDebit();
        $totalCustomerCredit = Customer::totalCustomerCredit();
        $totalCustomerBalance = Customer::totalCustomerBalance();

        if ($totalCustomerBalance < 0) {
            $totalCustomerBalance = '('. number_format(abs($totalCustomerBalance),2) .')';
        } else {
            $totalCustomerBalance = number_format($totalCustomerBalance,2);
        }

        $data = [
            'customers' =>  $customers,
            'total_customer_debit' => number_format($totalCustomerDebit,2),
            'total_customer_credit' => number_format($totalCustomerCredit,2),
            'total_customer_balance' => $totalCustomerBalance
        ];

        return view('app.customer.all-customers', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $i = 1;
        $categories = CustomerCategory::all();

        $data = [
            'categories' => $categories
        ];

        return view('customer.new-customer', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'category' => 'required'
        ]);

        $save_successful = $this->customer->create($data);

        return $save_successful
            ? redirect()->back()->with('success', 'Customer created successfully')
            : redirect()->back()->with('error', 'Ooops! Something went wrong on our side');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {

        if (is_null($customer)) {
            return redirect()->back()->with('error', 'Customer not found');
        }

        $services = Service::getAllServices();

        $customer->load('largeFormatJobs.service', 'embroideryJobs.service', 'pressJobs.service', 'designJobs.service', 'payments.account');

        return view('app.customer.customer-info', compact('customer', 'services'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($customer_id)
    {
        // check if customer id is belongs to a valid customer
        if (!$this->isCustomer($customer_id))
        {
            return redirect()->back()->with('ErrMsg', "Ooops! Not a valid customer id");
        }

        $customer = Customer::find($customer_id);
        $categories = CustomerCategory::all();

        $data = [
            'customer' => $customer,
            'categories' => $categories
        ];

        return view('Admin.customer.edit-customer', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'customer_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'category' => 'required'
        ]);

        $customer = Customer::find($request->customer_id);

        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->category = $request->category;

        if ($customer->save()) {
            return redirect()->back()->with('success', "Customer information updated successfully");
        } else {
            Log::error("Something went wrong");
            return redirect()->back()->with('error', "We could not update customer information at this time");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }


    private function isCustomer($customer_id)
    {
        return (bool) Customer::find($customer_id);
    }
}
