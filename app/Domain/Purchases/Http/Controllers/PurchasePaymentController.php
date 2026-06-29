<?php

namespace App\Domain\Purchases\Http\Controllers;

use App\Domain\Purchases\Models\PurchasePayment;
use App\Domain\Purchases\Services\PurchasePaymentService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\StorePurchasePaymentRequest;
use App\Services\Accounting\AccountService;
use App\Traits\HandleResourceActions;

class PurchasePaymentController extends Controller
{

    use HandleResourceActions;



    /**
     * Create a new controller instance.
     */
    public function __construct(
        private AccountService $accountService,
        private PurchasePaymentService $purchasePaymentService
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = $this->purchasePaymentService->getRecentPayments();
        return view('app.purchase-payments.purchase-payments', [
            'payments' => $payments
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
    public function store(StorePurchasePaymentRequest $request)
    {
        $this->purchasePaymentService->createPurchase($request->validated());
        return redirect()->back()->with('success', "Purchase payment recorded successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchasePayment $purchasePayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchasePayment $purchasePayment)
    {
        return view('app.purchase-payments.modals.edit-purchase-payment', [
            'purchasePayment' => $purchasePayment,
            'supplier' => $purchasePayment->supplier,
            'operating_accounts' => $this->accountService->getAssetAccounts()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePurchasePaymentRequest $request, PurchasePayment $purchasePayment)
    {
        $this->purchasePaymentService->updatePayment($purchasePayment, $request->validated());
        return redirect()->back()->with('success', 'Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchasePayment $purchasePayment)
    {
        $this->purchasePaymentService->deletePayment($purchasePayment);
        return redirect()->back()->with('success','Payment deleted successfully');
    }

}
