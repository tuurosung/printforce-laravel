<?php

namespace App\Domain\Suppliers\Http\Controllers;

use App\Domain\Suppliers\Http\Requests\StoreNewSupplierRequest;
use App\Domain\Suppliers\Models\Supplier;
use App\Domain\Suppliers\Services\SupplierService;
use App\Http\Controllers\Controller;
use App\Services\Accounting\AccountService;
use App\Traits\HandleResourceActions;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{

    use HandleResourceActions;

    /**
     * Create a new controller instance.
     */
    public function __construct(
        private readonly SupplierService $supplierService,
        private readonly AccountService $accountService
    ){}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.suppliers.suppliers', [
            'suppliers' => $this->supplierService->getSuppliers()
        ]);
    }


    public function create()
    {
    }


    public function store(StoreNewSupplierRequest $request)
    {
        $this->supplierService->createSupplier(
            $request->validated()
        );

        return redirect()->back()->with('success', 'Supplier created successfully');
    }


    public function show(Supplier $supplier)
    {
        $supplier->loadRelationships();
        $operating_accounts = $this->accountService->getAssetAccounts();

        return view('app.suppliers.supplier-info', [
            'supplier' => $supplier,
            'operating_accounts' => $operating_accounts,
        ]);
    }


    public function edit(Supplier $supplier)
    {
        return view('app.suppliers.modals.edit-supplier', compact('supplier'));
    }


    public function update(StoreNewSupplierRequest $request, Supplier $supplier)
    {
        $this->supplierService->updateSupplier($supplier, $request->validated());
        return redirect()->back()->with('success', 'Supplier updated successfully');
    }


    public function destroy(Supplier $supplier)
    {
        $this->supplierService->deleteSupplier($supplier);
        return redirect()->back()->with('success', 'Supplier deleted successfully');
    }
}
