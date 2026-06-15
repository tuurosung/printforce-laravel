<?php

namespace App\Domain\Suppliers\Repositories;

use App\Domain\Suppliers\Contracts\SupplierRepositoryInterface;
use App\Models\Suppliers\Supplier;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class SupplierRepository implements SupplierRepositoryInterface
{

    public function __construct(
        private Supplier $model
    ){}

    public function create(array $data): Supplier
    {
        return $this->model->create($data);
    }

    public function update(Supplier $supplier, array $data): bool
    {
        return $supplier->update($data);
    }

    public function delete(Supplier $supplier): bool
    {
        return $supplier->delete();
    }


    public function getAllSuppliers(): Collection
    {
        return Supplier::orderBy('supplier_name', 'asc')->get();
    }
}
