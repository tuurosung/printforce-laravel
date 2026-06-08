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
        $supplier =  $this->suppliers->create($request->validated());

        return redirect()->back()->with('success', 'Supplier created successfully');
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
        $supplier = $this->suppliers->update($supplier, $request->validated());

        return redirect()->back()->with('success', 'Supplier updated successfully');
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
