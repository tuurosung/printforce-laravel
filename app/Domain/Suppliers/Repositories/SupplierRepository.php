<?php

namespace App\Domain\Suppliers\Repositories;

use App\Domain\Suppliers\Contracts\SupplierRepositoryInterface;
use App\Models\Suppliers\Supplier;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class SupplierRepository extends BaseRepository implements SupplierRepositoryInterface
{

    public function __construct(){
        parent::__construct(new Supplier());
    }


    public function getAllSuppliers(): Collection
    {
        return Supplier::orderBy('supplier_name', 'asc')->get();
    }
}
