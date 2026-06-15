<?php


namespace App\Domain\Suppliers\Contracts;

// use App\Data\Suppliers\SupplierData;
// use App\Models\Suppliers\Supplier;
use App\Models\Suppliers\Supplier;
use Illuminate\Database\Eloquent\Collection;


interface SupplierRepositoryInterface
{
    public function create(array $data): Supplier;
    public function update(Supplier $supplier, array $data): bool;
    public function delete(Supplier $supplier): bool;

    public function getAllSuppliers(): Collection;

}
