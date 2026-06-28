<?php

namespace App\Domain\Purchases\Http\Controllers;

use App\Domain\Purchases\Contracts\PurchaseRepositoryInterface;
use App\Domain\Purchases\Models\Purchase;
use App\Domain\Purchases\Services\PurchaseService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\StorePurchaseRequest;
use App\Traits\HandleResourceActions;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    use HandleResourceActions;


    /**
     * Create a new controller instance.
     */
    public function __construct(
        private readonly PurchaseService $purchaseService,
        protected $model = new Purchase(),
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.purchases.purchases', [
            'purchases' => $this->purchaseService->allPurchases()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePurchaseRequest $request)
    {
        $purchase = $this->purchaseService->create($request->validated());
        return redirect()->route('purchases.prepare-invoice', $purchase);
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        $this->purchaseService->update($purchase, $request->validated());
        return redirect()->back()->with('success', "Purchase updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        $this->purchaseService->delete($purchase);
        return redirect()->back()->with('success','Purchase deleted successfully');
    }
}
