<?php

namespace App\Http\Controllers\Customers;

use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Models\Customers\Customer;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Traits\HandleResourceActions;
use App\Services\CustomerPaymentService;
use App\Models\Customers\CustomerPayment;
use App\Models\Accounting\OperatingAccount;
use App\Services\Accounting\AccountService;
use App\Services\Payments\SendPaymentAlert;
use App\Services\Alerts\PaymentAlertService;
use App\Http\Requests\Payments\StoreNewPaymentRequest;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

class CustomerPaymentController extends Controller
{

    use HandleResourceActions;

    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected $model = new CustomerPayment(),
        private $modelName = 'Customer Payment',
        private $accountService = new AccountService(),
        private $customerService = new CustomerService(),
        private $customerPaymentService = new CustomerPaymentService(),
        private $paymentAlertService = new PaymentAlertService()
    ){}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $customers = Customer::all();

        $data = [
            'total' => 0,
            'payments' => $this->customerPaymentService->getLatestPayments(),
            'statistics' => $this->customerPaymentService->getPaymentStatistics(),
            'payment_accounts' => $this->accountService->getAssetAccounts()
        ];

        return view('app.payments.payments', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($customer_id)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewPaymentRequest $request)
    {
        $data = $request->validated();

        // create the payment record
        $paymentCreated = CustomerPayment::create($data);

        if (!$paymentCreated) {
            return redirect()->back()->with('error', 'Ooops! Something went wrong on our side');
        }

        // send payment receipt to customer
        $alertSent = $this->paymentAlertService->send(
            $data['customer_id'],
            $data['amount_paid']
        );

        if ($alertSent) {
            return redirect()->back()->with('success', 'Payment receipt sent to customer');
        }

        return redirect()->back()->with('error', 'Ooops! Something went wrong on our side');
    }


    /**
     * Display the specified resource.
     */
    public function show(CustomerPayment $customerPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerPayment $customerPayment)
    {
        $payment_id = $customerPayment->id;

        $payment = CustomerPayment::find($payment_id);

        $data = [
            'payment' => $payment,
            'customers' => $this->customerService->getCustomersArray(),
            'payment_accounts' => $this->accountService->getAssetAccounts(),
            'customerPayment' => $customerPayment,
        ];

        return view('app.payments.modals.edit-payment', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreNewPaymentRequest $request, CustomerPayment $customerPayment)
    {
       return $this->handleUpdate($request, $customerPayment);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerPayment $customerPayment)
    {
        return $this->handleDelete($customerPayment);
    }

}
