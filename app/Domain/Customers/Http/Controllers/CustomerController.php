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
        private readonly CustomerService $customerService,
    ) {}


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
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request): RedirectResponse
    {
        $data = $request->toData();

        $customer = $this->customerService->createCustomer($data);
        return redirect()->route('customers.customer.info', $customer);
    }


    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view(
            'app.customer.customer-info',
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
        $data = $request->toData();
        $this->customerService->updateCustomer($customer, $data);
        return redirect()->back()->with('success', 'Customer updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        $this->customerService->deleteCustomer($customer);
        return redirect()->back()->with('success', 'Customer deleted successfully');
    }
}
