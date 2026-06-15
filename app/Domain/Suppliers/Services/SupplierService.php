<?php

namespace App\Domain\Suppliers\Services;

use App\Domain\Suppliers\Contracts\SupplierRepositoryInterface;
use App\Models\Suppliers\Supplier;

class SupplierService
{
    public function __construct(
        private readonly SupplierRepositoryInterface $suppliers
    ){}


    public function createSupplier(array $data): Supplier
    {
        return $this->suppliers->create($data);
    }

    public function updateSupplier(Supplier $supplier, array $data): bool
    {
        return $this->suppliers->update($supplier, $data);
    }

    public function deleteSupplier(Supplier $supplier): bool
    {
        if ($supplier->hasPurchases() || $supplier->hasPayments()) {
            throw new \RuntimeException('Cannot delete supplier with existing supplies or payments.');
            return false;
        }
        
        return $this->suppliers->delete($supplier);
    }

}
