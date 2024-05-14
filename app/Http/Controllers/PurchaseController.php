<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    private $active_subscriber = '187635294';

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
    public function store(Request $request)
    {
        // validate the request
        $this->validateRequest($request);

        // generate the payment id
        $purchase_id = $this->purchaseId();

        $purchase = new Purchase();

        $purchase->subscriber_id = $this->active_subscriber;
        $purchase->purchase_id = $purchase_id;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->reference = $request->reference;
        $purchase->date_issued = $request->date_issued;
        $purchase->due_date = $request->due_date;
        $purchase->notes = $request->notes;

        try {
            $purchase->save();
            return redirect()->back()->with('success', "Purchased recorded successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Something went wrong on our side".$e->getMessage());
        }
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
        $request->validate([
            'supplier_id' => 'required',
            'date_issued' => 'required',
            'due_date' => 'required',
            'due_date' => 'required',
        ]);
    }

    private function purchaseId()
    {
        $count = Purchase::where('subscriber_id', $this->active_subscriber)->count() + 1;
        return str_pad($count, 6, "0", STR_PAD_LEFT);
    }
}
