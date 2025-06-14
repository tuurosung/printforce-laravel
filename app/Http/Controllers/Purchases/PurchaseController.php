<?php

namespace App\Http\Controllers\Purchases;

use App\Traits\HandleResourceActions;
use Illuminate\Http\Request;
use App\Models\Purchases\Purchase;
use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\StorePurchaseRequest;
use App\Models\Purchases\PurchasedItem;

class PurchaseController extends Controller
{
    use HandleResourceActions;


    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected $model = new Purchase(),
        private $modelName = 'Purchase',
        private $purchase = new Purchase()
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::with(['supplier', 'purchasedItems'])
            ->orderBy('date_issued', 'desc')->get();

        return view('app.purchases.purchases', compact('purchases'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePurchaseRequest $request)
    {
        $data = $request->validated();

        $is_created = Purchase::create($data);

        return $is_created
            ? redirect()->to(route('purchases.prepare-invoice', $is_created->purchase_id))->with('success', "Bingo! Purchase created successfully")
            : redirect()->back()->with('error', "Ooops! Something went wrong on our side");


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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }

    private function validateRequest($request)
    {

    }

    private function purchaseId()
    {
        $count = Purchase::where('subscriber_id', $this->active_subscriber)->count() + 1;
        return str_pad($count, 6, "0", STR_PAD_LEFT);
    }
}
