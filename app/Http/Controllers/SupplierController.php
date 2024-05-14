<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\OperatingAccount;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{
    private $active_subscriber = '187635294';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = 1;
        $all_suppliers = Supplier::where('status', 'active')->where('subscriber_id', $this->active_subscriber)->get()->sortBy('supplier_name');

        $data = [
            'i' => $i,
            'all_suppliers' => $all_suppliers
        ];
        return view('Admin.suppliers.index', $data);
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
        $this->validateRequest($request);

        $supplier = new Supplier();
        $supplier->subscriber_id = $this->active_subscriber;
        $supplier->supplier_id = $this->supplierId();
        $supplier->supplier_name = $request->supplier_name;
        $supplier->supplier_phone = $request->supplier_phone;
        $supplier->supplier_address = $request->supplier_address;

        try {
            if ($supplier->save()) {
                return redirect()->back()->with('success', "Bingo! Supplier created successfully");
            } else {
                return redirect()->back()->with('error', "Ooops! Something went wrong on our side");
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Ooops! Something went wrong on our side".$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($supplier_id)
    {
        $this->panic($supplier_id);

        $supplier = Supplier::where('supplier_id', $supplier_id)
            ->where('subscriber_id', $this->active_subscriber)
            ->where('status', 'active')
            ->first();

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

        return view('Admin.suppliers.info', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($supplier_id)
    {
        if (!$this->isSupplier($supplier_id)) {
            return redirect()->back()->with('error', 'Ooops! Invalid supplier selected');
        }

        $supplier = Supplier::where('supplier_id', $supplier_id)->where('status', 'active')->where('subscriber_id', $this->active_subscriber)->first();

        $data = [
            'supplier' => $supplier
        ];
        return view('Admin.suppliers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $this->validateRequest($request);

        if (!$this->isSupplier($request->supplier_id)) {
            return redirect()->back()->with('error', "Invalid supplier selected");
        }

        $supplier = Supplier::where('supplier_id', $request->supplier_id)
            ->where('subscriber_id', $this->active_subscriber)
            ->where('status', 'active')
            ->first();

        $supplier->supplier_name = $request->supplier_name;
        $supplier->supplier_address = $request->supplier_address;
        $supplier->supplier_phone = $request->supplier_phone;

        try {

            if ($supplier->save()) {
                return redirect()->back()->with('success', "Supplier information updated successfully");
            }

            return redirect()->back()->with('error', "Ooops! Something went wrong on our side");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Ooops! Something went wrong on our side");
        }
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
            'supplier_name' => 'required',
            'supplier_phone' => 'required',
            'supplier_address' => 'required'
        ]);
    }

    private function isSupplier($supplier_id)
    {
        return (bool) Supplier::where('supplier_id', $supplier_id)
        ->where('subscriber_id', $this->active_subscriber)
        ->where('status', 'active')
        ->first();
    }

    private function panic($supplier_id) {
        if (!$this->isSupplier($supplier_id)) {
            return redirect()->back()->with('error', "Invalid supplier id passed");
        }
    }

}
