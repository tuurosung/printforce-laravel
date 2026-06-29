<?php

namespace App\Domain\Purchases\Services;

use App\Domain\Purchases\Contracts\PurchasePaymentRepositoryInterface;
use App\Domain\Purchases\Models\PurchasePayment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class PurchasePaymentService
{
    public function __construct(
        private PurchasePaymentRepositoryInterface $purchases
    ){}


    public function createPurchase(array $data): PurchasePayment
    {
        $purchasePayment = $this->purchases->create($data);

        if (! $purchasePayment) {
            $error = "Unable to create to Purchase Payment";
            Log::error($error);
            throw new \Exception($error);
        }

        return $purchasePayment;
    }


    public function updatePayment(PurchasePayment $purchasePayment, array $data): bool
    {
        $isUpdated = $purchasePayment->update($data);

        if (! $isUpdated) {
            $error = "Unable to update purchase payment";
            Log::error($error);
            throw new \Exception($error);
        }

        return true;
    }


    public function deletePayment(PurchasePayment $purchasePayment): bool
    {
        $isDeleted = $purchasePayment->delete();
        
        if (! $isDeleted) {
            $error = "Unable to delete purchase payment";
            Log::error($error);
            throw new \Exception($error);
        }

        return true;
    }

    public function getRecentPayments(): Collection
    {
        return $this->purchases->recentPayments();
    }
}
