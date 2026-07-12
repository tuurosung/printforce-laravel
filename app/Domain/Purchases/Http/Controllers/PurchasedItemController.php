<?php

namespace App\Domain\Purchases\Http\Controllers;

use App\Domain\Purchases\Models\Purchase;
use App\Domain\Purchases\Models\PurchasedItem;
use App\Domain\Purchases\Repositories\PurchasedItemRepository;
use App\Domain\Purchases\Services\PurchasedItemService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\StorePurchasedItemRequest;
use App\Traits\HandleResourceActions;
use Illuminate\Http\Request;

class PurchasedItemController extends Controller
{

    use HandleResourceActions;

    /**
     * Create a new controller instance.
     */
    public function __construct(
        private readonly PurchasedItemRepository $purchases,
        private readonly PurchasedItemService $purchasedItemService,
        protected $model = new PurchasedItem(),
    ) {}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePurchasedItemRequest $request, Purchase $purchase)
    {
        // dd($purchase);

        $purchasedItem = $this->purchases->addToCart($purchase, $request->validated());
        return redirect()->back()->with('success', 'Item added to cart');
        // // exit if purchase is not active
        // if ($purchase->lockstatus == 'locked') {
        //     return redirect()->back()->with('error', 'Cannot add items to a purchase that is not active');
        // }

        // $data = $request->validated() + [
        //     'purchase_id' => $purchase->purchase_id,
        //     'supplier_id' => $purchase->supplier_id,
        // ];

        // return $this->handleStore($data);
    }


    /**
     * Display the specified resource.
     */
    public function show(PurchasedItem $purchasedItems)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchasedItem $purchasedItems)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchasedItem $purchasedItems)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function removeFromCart(PurchasedItem $purchasedItem)
    {
        return $this->handleDelete($purchasedItem);
    }

}
