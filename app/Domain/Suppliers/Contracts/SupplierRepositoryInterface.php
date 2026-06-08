<?php


namespace App\Domain\Suppliers\Contracts;

// use App\Data\Suppliers\SupplierData;
// use App\Models\Suppliers\Supplier;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;


interface SupplierRepositoryInterface extends BaseRepositoryInterface
{

    public function getAllSuppliers(): Collection;

}
