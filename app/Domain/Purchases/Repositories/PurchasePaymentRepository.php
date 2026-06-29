<?php

namespace App\Domain\Purchases\Repositories;

use App\Domain\Purchases\Contracts\PurchasePaymentRepositoryInterface;
use App\Domain\Purchases\Models\PurchasePayment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class PurchasePaymentRepository implements PurchasePaymentRepositoryInterface
{

    public function __construct(
        private PurchasePayment $model
    ){}

    public function create(array $data): PurchasePayment
    {
        return $this->model->create($data);
    }


    public function update(PurchasePayment $purchasePayment, array $data): bool
    {
        return $purchasePayment->update($data);
    }


    public function delete(PurchasePayment $purchasePayment): bool
    {
        return $purchasePayment->delete();
    }


    public function allPayments(): Collection
    {
        return $this->baseQuery()->get();
    }


    public function recentPayments(): Collection
    {
        return $this->baseQuery()->take(100)->get();
    }


    private function baseQuery(): Builder
    {
        return $this->model->newQuery()->orderByDesc('created_at');
    }
}
