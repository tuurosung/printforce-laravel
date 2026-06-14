<?php

namespace App\Domain\Payments\Http\Controllers;

use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Domain\Payments\Models\CustomerPayment;
use App\Domain\Payments\Services\PaymentAlertService;
use App\Domain\Payments\Services\PaymentService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\StoreNewPaymentRequest;
use App\Services\Accounting\AccountService;
use App\Traits\HandleResourceActions;

class PaymentController extends Controller
{

    use HandleResourceActions;

    /**
     * Create a new controller instance.
     */
    public function __construct(
        private PaymentService $paymentService,
        private AccountService $accountService,
        private CustomerRepositoryInterface $customerService,
        private PaymentAlertService $paymentAlertService,
    ){}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.payments.payments', $this->paymentService->IndexData());
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

        try {

            $data = $request->validated();
            $customerPayment = $this->paymentService->createPayment($data);

            // send payment receipt to customer
            $alertSent = $this->paymentAlertService->send(
                $data['customer_id'],
                (float) $data['amount_paid']
            );

            if ($alertSent) {
                return redirect()->back()->with('success', 'Payment receipt sent to customer');
            }

            return redirect()->back()->with('Success', 'Bingo! The payment was successful, but we were unable to send a receipt to the customer at the moment');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

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
        $data = [
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
        try {

            $data = $request->validated();
            $this->paymentService->updatePayment($customerPayment, $data);

            return redirect()->back()->with('success', 'Payment updated successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerPayment $customerPayment)
    {
        try {

            $this->paymentService->deletePayment($customerPayment);
            return redirect()->back()->with('success', 'Payment deleted successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
