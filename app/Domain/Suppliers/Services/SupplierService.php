<?php

namespace App\Domain\Suppliers\Services;

use App\Domain\Suppliers\Contracts\SupplierRepositoryInterface;
use App\Domain\Suppliers\Models\Supplier;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class SupplierService
{
    public function __construct(
        private readonly SupplierRepositoryInterface $suppliers
    ){}


    public function getSuppliers(): Collection
    {
        return $this->suppliers->allSuppliers();
    }


    public function createSupplier(array $data): Supplier
    {
        $supplier = $this->suppliers->create($data);

        if (! $supplier) {
            $error = "Unable to create new supplier";
            Log::error($error);
            throw new \Exception($error);
        }

        return $supplier;
    }


    public function updateSupplier(Supplier $supplier, array $data): bool
    {
        $isUpdated = $this->suppliers->update($supplier, $data);

        if (! $isUpdated) {
            $error = "Unable to update supplier";
            Log::error($error);
            throw new \Exception($error);
        }

        return true;
    }


    public function deleteSupplier(Supplier $supplier): bool
    {
        if ($supplier->hasPurchases() || $supplier->hasPayments()) {
            $error = 'Cannot delete supplier with existing supplies or payments.';
            Log::error($error);
            throw new \Exception($error);
        }

        $isDeleted = $this->suppliers->delete($supplier);

        if (! $isDeleted) {
            $error = 'Unable to delete ';
            Log::error($error);
            throw new \Exception($error);
        }

        return true;
    }

}
