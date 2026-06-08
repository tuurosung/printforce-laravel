<?php

namespace App\Domain\Customers\Http\Controllers;

use App\Data\CustomerData;
use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Domain\Customers\Services\CustomerService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customers\StoreCustomerRequest;
use App\Http\Requests\Customers\UpdateCustomerRequest;
use App\Models\Customers\Customer;
use App\Traits\HandleResourceActions;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{

    use HandleResourceActions;

    public function __construct(
        private readonly CustomerRepositoryInterface $customers,
        private readonly CustomerService $customerService,
    ){}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('app.customer.customers', $this->customerService->getIndexData());
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('customer.new-customer', [
        //     'categories' => CustomerCategory::all(),
        // ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request): RedirectResponse
    {
        $customer = $this->customers->createCustomer(
            CustomerData::from($request)
        );

        return redirect()->route('customers.customer.info', $customer);
    }


    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('app.customer.customer-info',
            $this->customerService->getShowData($customer)
        );
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
    public function update(UpdateCustomerRequest $request, Customer $customer): RedirectResponse
    {
       $this->customers->updateCustomer($customer, CustomerData::from($request));
       return redirect()->back()->with('success', 'Customer updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        $this->customers->deleteCustomer($customer);
        return redirect()->back()->with('success', 'Customer deleted successfully');
    }
}
