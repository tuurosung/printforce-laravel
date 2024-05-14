<?php

namespace App\Http\Controllers;

use App\Models\PurchasePayment;
use Illuminate\Http\Request;

class PurchasePaymentController extends Controller
{
    private $active_subscriber = '187635294';


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $all
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
        $this->validateRequest($request);

        $payment = new PurchasePayment();

        $payment->subscriber_id = $this->active_subscriber;
        $payment->payment_id = $this->paymentId();
        $payment->supplier_id = $request->supplier_id;
        $payment->amount_paid = $request->amount_paid;
        $payment->reference = $request->reference;
        $payment->date = $request->date;
        $payment->account_number = $request->account_number;
        $payment->notes = $request->notes;

        try {

            if ($payment->save()) {
                return redirect()->back()->with('success', "Bingo! Payment saved successfully");
            }

            return redirect()->back()->with('error', "Ooops! Something went wrong on our side");
        } catch (\Exception $e) {

            return redirect()->back()->with('error', "Ooops! Something went wrong on our side".$e->getMessage());
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchasePayment $purchasePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchasePayment $purchasePayment)
    {
        //
    }

    private function validateRequest($request)
    {
        $request->validate([
            'amount_paid' => 'required',
            'date' => 'required',
            'account_number' => 'required',
            'notes' => 'required'
        ]);
    }

    private function paymentId()
    {
        $count = PurchasePayment::where('subscriber_id', $this->active_subscriber)->count() + 1;
        return str_pad($count, 6, "0", STR_PAD_LEFT);
    }
}
