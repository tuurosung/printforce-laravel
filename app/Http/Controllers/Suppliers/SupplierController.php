<?php

namespace App\Http\Controllers\Suppliers;

use App\Services\Accounting\AccountService;
use App\Traits\HandleResourceActions;
use App\Models\Suppliers\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Requests\Suppliers\StoreNewSupplierRequest;

class SupplierController extends Controller
{

    use HandleResourceActions;

    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected $model = new Supplier(),
        private $modelName = "Supplier",
        private $supplier = new Supplier(),
        private $accountService = new AccountService()
    )
    {
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::withRelationships()
            ->get()
            ->sortBy('supplier_name');

        return view('app.suppliers.suppliers', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewSupplierRequest $request)
    {
        return $this->handleStore($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        $supplier->loadRelationships();
        $operating_accounts = $this->accountService->getAssetAccounts();

        return view('app.suppliers.supplier-info', [
            'supplier' => $supplier,
            'operating_accounts' => $operating_accounts,
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('app.suppliers.modals.edit-supplier', compact('supplier'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(StoreNewSupplierRequest $request, Supplier $supplier)
    {
        return $this->handleUpdate($request, $supplier);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        // Prevent deletion of suppliers with supplies or payments
        if ($supplier->hasPurchases() || $supplier->hasPayments()) {
            return redirect()->back()->with('error', "Cannot delete supplier with existing supplies or payments.");
        }

        return $this->handleDelete($supplier);
    }
}
