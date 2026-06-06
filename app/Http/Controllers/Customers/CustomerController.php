<?php

namespace App\Http\Controllers\Customers;

use App\Contracts\Customers\CustomerServiceContract;
use App\Data\CustomerData;
use App\Facades\PrintServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customers\StoreCustomerRequest;
use App\Http\Requests\Customers\UpdateCustomerRequest;
use App\Models\Accounting\OperatingAccount;
use App\Models\CustomerCategory;
use App\Models\Customers\Customer;
use App\Models\Services\Service;
use App\Services\Accounting\AccountService;
use App\Traits\HandleResourceActions;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{

    use HandleResourceActions;

    public function __construct(
        private readonly CustomerServiceContract $customerService,
        protected $model = new Customer(),
        private $modelName = 'Customer',
        private $customer = new Customer(),
        private $accountService = new AccountService(),
        // private $customerService = new CustomerService()
    ){}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'customers' =>  $this->customerService->getLatestCustomers(),
            'statistics' => $this->customerService->getCustomerStatistics(),
            'total_jobs' => 0,
            'total_payments' => 0,
            'total_balance' => 0,
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
        $customer = $this->customerService->createCustomer(
            CustomerData::from($request)
        );

        return redirect()->route('customers.customer.info', $customer);
    }


    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        Session::put([
            'current_customer' => $customer->customer_id
        ]);

        return view('app.customer.customer-info', [
            'customer' => $customer,
            'payment_accounts' => $this->accountService->getAssetAccounts(),
            'largeformat_services' => PrintServices::getLargeFormatServicesArray(),
            'design_services' => PrintServices::getDesignServicesArray(),
            'embroidery_services' => PrintServices::getEmbroideryServicesArray(),
            'press_services' => PrintServices::getPressServicesArray(),
            'photography_services' => PrintServices::getPhotographyServicesArray(),
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
       return $this->handleUpdate($request, $customer);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        // Check if the customer has any jobs or payments
        if ($customer->customerJobsCount > 0  || $customer->customerCredit > 0) {
            return redirect()->back()->with('error', 'Customer cannot be deleted because they have associated jobs or payments.');
        }

        return $this->handleDelete($customer);
    }
}
