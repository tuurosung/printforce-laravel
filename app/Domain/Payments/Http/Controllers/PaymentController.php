<?php

namespace App\Domain\Payments\Http\Controllers;

use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Domain\Payments\Contracts\PaymentRepositoryInterface;
use App\Domain\Payments\Models\CustomerPayment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\StoreNewPaymentRequest;
use App\Services\Accounting\AccountService;
use App\Services\Alerts\PaymentAlertService;
use App\Traits\HandleResourceActions;

class PaymentController extends Controller
{

    use HandleResourceActions;

    /**
     * Create a new controller instance.
     */
    public function __construct(
        private PaymentRepositoryInterface $customerPaymentService,
        private AccountService $accountService,
        private CustomerRepositoryInterface $customerService,
        private PaymentAlertService $paymentAlertService,
    ){}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $customers = Customer::all();

        $data = [
            'total' => 0,
            'payments' => $this->customerPaymentService->getLatest(),
            'statistics' => $this->customerPaymentService->getStatistics(),
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
            return redirect()->back()->with('error', 'Ooops! We are unable to process the payment at the moment');
        }

        // send payment receipt to customer
        $alertSent = $this->paymentAlertService->send(
            $data['customer_id'],
            (float) $data['amount_paid']
        );

        if ($alertSent) {
            return redirect()->back()->with('success', 'Payment receipt sent to customer');
        }

        return redirect()->back()->with('error', 'Ooops! The payment was successful, but we were unable to send a receipt to the customer at the moment');
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
