<?php

namespace App\Http\Controllers\Customers;

use App\Models\CustomerCategory;
use App\Models\Services\Service;
use App\Models\Customers\Customer;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Accounting\OperatingAccount;
use App\Http\Requests\Customers\StoreCustomerRequest;
use App\Http\Requests\Customers\UpdateCustomerRequest;

class CustomerController extends Controller
{

    public function __construct(
        private $customer = new Customer()
    )
    {
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = new Customer();

        $customers = Customer::with([
                'largeFormatJobs',
                'embroideryJobs',
                'pressJobs',
                'designJobs',
                'photography_jobs',
                'payments'
            ])
            ->latest()
            ->limit(10)
            ->get();


        $newCustomers = Customer::countNewCustomers();
        $countAllCustomers = Customer::countAllCustomers();

        // initialize variables
        $total_jobs = 0;
        $total_payments = 0;
        $total_balance = 0;

        $data = [
            'customers' =>  $customers,
            'new_customers' => $newCustomers,
            'count_all_customers' => $countAllCustomers,
            'total_jobs' => $total_jobs,
            'total_payments' => $total_payments,
            'total_balance' => $total_balance,
        ];

        return view('app.customer.customers', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.new-customer', [
            'categories' => CustomerCategory::all(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $data = $request->validated();

        if (!$this->customer->create($data)) {
            return redirect()->back()->with('error', 'Ooops! Something went wrong on our side');
        }

        return redirect()->back()->with('success', 'Customer created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('app.customer.customer-info', [
            'customer' => $customer->loadRelations(),
            'payment_accounts' => OperatingAccount::filterByType(1),
            'services' => Service::getAllServices(),
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('app.customer.modals.edit-customer', compact('customer'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $data = $request->validated();

        try {

            $customer->update($data);
            return redirect()->back()->with('success', 'Customer updated successfully');

        } catch (\Exception $e) {

            Log::error('Error updating customer: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ooops! Something went wrong on our side'.$e->getMessage());

        }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        if (!$customer->delete()) {
            return redirect()->back()->with('error', 'Ooops! Something went wrong on our side');
        }
        return redirect()->back()->with('success', 'Customer deleted successfully');
    }
}
