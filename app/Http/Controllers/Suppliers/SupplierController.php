<?php

namespace App\Http\Controllers\Suppliers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Accounting\OperatingAccount;
use App\Models\Suppliers\Supplier;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('supplier_name')->get();

        return view('app.suppliers.suppliers', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate request
        $data = $request->validate([
            'supplier_name' => 'required',
            'supplier_phone' => 'required',
            'supplier_address' => 'required'
        ]);

        $is_created = Supplier::create($data);

        return $is_created
            ? redirect()->back()->with('success', "Bingo! Supplier created successfully")
            : redirect()->back()->with('error', "Ooops! Something went wrong on our side");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $supplier_id)
    {

        $supplier = Supplier::find($supplier_id);

        $i = 1;

        $purchases = $supplier->purchases;
        $payments = $supplier->payment;
        $operating_accounts = OperatingAccount::all();

        $date = Carbon::now();
        $today = $date->format('Y-m-d');

        $date = Carbon::now()->addDays(30);
        $suggested_due_date = $date->format('Y-m-d');

        $data = [
            'i' => $i,
            'supplier' => $supplier,
            'purchases' => $purchases,
            'payments' => $payments,
            'operating_accounts' => $operating_accounts,
            'suggested_due_date' => $suggested_due_date,
            'today' => $today
        ];

        return view('app.suppliers.supplier-info', $data);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $supplier_id)
    {
        $supplier = Supplier::find($supplier_id);

        if (is_null($supplier)) {
            return abort(404);
        }

        return view('app.suppliers.modals.edit-supplier', compact('supplier'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'supplier_id' => 'required',
            'supplier_name' => 'required',
            'supplier_address' => 'required',
            'supplier_phone' => 'required'
        ]);

        $supplier = Supplier::find($data['supplier_id']);

        if (is_null($supplier)) {
            return redirect()->back()->with('error', "Invalid supplier selected");
        }

        $is_updated = $supplier->update($data);

        return $is_updated
            ? redirect()->back()->with('success', "Supplier information updated successfully")
            : redirect()->back()->with('error', "Ooops! Something went wrong on our side");
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($supplier_id)
    {
        $supplier = Supplier::where('supplier_id', $supplier_id)->where('subscriber_id', $this->active_subscriber)->first();

        $supplier->status = 'deleted';

        try {
            $supplier->save();
            return redirect()->back()->with('success', 'Supplier deleted successfully');
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            return  redirect()->back()->with('error', 'Ooops! We could not delete the given supplier');
        }
    }

    private function supplierId()
    {
        $count = Supplier::where('status', 'active')->count() + 1;
        return str_pad($count, 6, "0", STR_PAD_LEFT);
    }

    private function validateRequest($request)
    {
        $request->validate([

        ]);
    }

    private function isSupplier($supplier_id)
    {
        return (bool) Supplier::where('supplier_id', $supplier_id)
        ->where('subscriber_id', $this->active_subscriber)
        ->where('status', 'active')
        ->first();
    }


}
