<?php

namespace App\Http\Controllers\Purchases;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchases\PurchasedItem;
use App\Models\Purchases\PurchasedItems;

class PurchasedItemController extends Controller
{
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
    public function addToCart(Request $request)
    {
        $data = $request->validate([
            'purchase_id' => 'required',
            'supplier_id' => 'required',
            'description' => 'required',
            'unit_cost' => 'required',
            'qty' => 'required',
            'sub_total' => 'required',
        ]);

        $is_added = PurchasedItem::create($data);

        return $is_added
            ? redirect()->back()->with('success', 'Item added successfully')
            : redirect()->back()->with('error', 'Failed to add item');
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
    public function destroy(PurchasedItem $purchasedItems)
    {
        //
    }
}
