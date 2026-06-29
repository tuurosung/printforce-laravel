<?php

namespace App\Domain\Purchases\Contracts;

use App\Domain\Purchases\Models\PurchasePayment;
use Illuminate\Database\Eloquent\Collection;

interface PurchasePaymentRepositoryInterface
{
    public function create(array $data): PurchasePayment;
    public function update(PurchasePayment $purchasePayment, array $data): bool;
    public function delete(PurchasePayment $purchasePayment): bool;


    public function allPayments(): Collection;
    public function recentPayments(): Collection;
}
