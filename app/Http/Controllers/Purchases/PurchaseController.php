<?php

namespace App\Http\Controllers\Purchases;

use Illuminate\Http\Request;
use App\Models\Purchases\Purchase;
use App\Http\Controllers\Controller;
use App\Models\Purchases\PurchasedItem;

class PurchaseController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::orderBy('date_issued', 'desc')->get();

        return view('app.purchases.purchases', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function prepareInvoice(string $purchase_id)
    {
        $purchase = Purchase::find($purchase_id);

        if (is_null($purchase)) {
            return redirect()->back()->with('error', "Ooops! Something went wrong on our side");
        }

        $purchase->load('supplier', 'cartItems');

        return view('app.suppliers.prepare-invoice', compact('purchase'));
    }


    public function offloadCart(Request $request)
    {
        $data = $request->validate([
            'purchase_id' => 'required',
            'supply_cost' => 'required',
            // taxes will be added later
        ]);

        $purchase = Purchase::find($data['purchase_id']);


        if (is_null($purchase)) {
            return redirect()->back()->with('error', "Ooops! Something went wrong on our side");
        }

        $purchase->supply_cost = $data['supply_cost'];
        $purchase->total_tax = 0;
        $purchase->transportation = 0;
        $purchase->purchase_total = $data['supply_cost'];
        $purchase->lockstatus = 'locked';

        $is_updated = $purchase->save();

       if (!$is_updated) {
           return redirect()->back()->with('error', "Ooops! Something went wrong on our side");
       }

      //    offload cart items
       $is_offloaded = PurchasedItem::offloadCart($data['purchase_id']);

        return $is_offloaded
            ? redirect()->to(route('purchases'))->with('success', "Bingo! Cart offloaded successfully")
            : redirect()->back()->with('error', "Ooops! Something went wrong on our side");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'reference' => 'required',
            'supplier_id' => 'required',
            'date_issued' => 'required',
            'due_date' => 'required',
            'notes' => 'nullable',
        ]);

        $is_created = Purchase::create($data);

        return $is_created
            ? redirect()->to(route('prepare-invoice', $is_created->purchase_id))->with('success', "Bingo! Purchase created successfully")
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
