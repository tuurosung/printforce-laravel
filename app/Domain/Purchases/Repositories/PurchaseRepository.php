<?php

namespace App\Domain\Purchases\Repositories;

use App\Domain\Purchases\Contracts\PurchaseRepositoryInterface;
use App\Domain\Purchases\Models\Purchase;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Override;

class PurchaseRepository implements PurchaseRepositoryInterface
{

    public function __construct(
        private Purchase $model
    ){}

    public function create(array $data): Purchase
    {
        return $this->model->create($data);
    }


    public function update(Purchase $purchase, array $data): bool
    {
        return $purchase->update($data);
    }


    public function delete(Purchase $purchase): bool
    {
        return $purchase->delete();
    }


    public function getPurchaes(): Collection
    {
        return $this->model->with(['supplier', 'purchasedItems'])->orderBy('date_issued', 'desc')->get();
    }
}
