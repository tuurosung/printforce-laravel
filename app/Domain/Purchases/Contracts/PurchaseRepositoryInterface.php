<?php

namespace App\Domain\Purchases\Contracts;

use App\Domain\Purchases\Models\Purchase;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface PurchaseRepositoryInterface
{
    public function create(array $data): Purchase;
    public function update(Purchase $purchase, array $data): bool;
    public function delete(Purchase $purchase): bool;

    public function getPurchaes(): Collection;
}
