<?php

namespace App\Domain\Suppliers\Http\Controllers;

use App\Domain\Suppliers\Contracts\SupplierRepositoryInterface;
use App\Domain\Suppliers\Services\SupplierService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Suppliers\StoreNewSupplierRequest;
use App\Models\Suppliers\Supplier;
use App\Services\Accounting\AccountService;
use App\Traits\HandleResourceActions;

class SupplierController extends Controller
{

    use HandleResourceActions;

    /**
     * Create a new controller instance.
     */
    public function __construct(
        private readonly SupplierRepositoryInterface $suppliers,
        private readonly SupplierService $supplierService,
        protected $model = new Supplier(),
        private $modelName = "Supplier",
        private $supplier = new Supplier(),
        private $accountService = new AccountService()
    ){}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.suppliers.suppliers', [
            'suppliers' => $this->suppliers->getAllSuppliers()
        ]);
    }


    public function create()
    {
    }


    public function store(StoreNewSupplierRequest $request)
    {
        $supplier = $this->supplierService->createSupplier($request->validated());

        if (! $supplier) {
            return redirect()->back()->with('error', 'Supplier could not be created');
        }

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
        $isUpdated = $this->supplierService->updateSupplier($supplier, $request->validated());

        if (! $isUpdated) {
            return redirect()->back()->with('error', 'Supplier could not be updated');
        }

        return redirect()->back()->with('success', 'Supplier updated successfully');
    }


    public function destroy(Supplier $supplier)
    {
        try {
            $this->supplierService->deleteSupplier($supplier);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
