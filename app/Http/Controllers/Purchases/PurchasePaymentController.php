<?php

namespace App\Http\Controllers\Purchases;

use App\Purchases\PurchasePaymentService;
use App\Services\Accounting\AccountService;
use App\Traits\HandleResourceActions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\StorePurchasePaymentRequest;
use App\Models\Purchases\PurchasePayment;
use App\Models\Suppliers\Supplier;

class PurchasePaymentController extends Controller
{

    use HandleResourceActions;



    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected $model = new PurchasePayment(),
        private $modelName = "PurchasePayment",
        private $accountService = new AccountService(),
        private $purchasePaymentService = new PurchasePaymentService()
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
    public function store(StorePurchasePaymentRequest $request, Supplier $supplier)
    {
        $data = $request->validated() + [
            'supplier_id' => $supplier->supplier_id,
        ];

        return $this->handleStore($data);
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
        return $this->handleUpdate($request, $purchasePayment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchasePayment $purchasePayment)
    {
        return $this->handleDelete($purchasePayment);
    }

}
