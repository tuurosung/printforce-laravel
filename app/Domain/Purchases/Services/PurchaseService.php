<?php

namespace App\Domain\Purchases\Services;

use App\Domain\Purchases\Contracts\PurchaseRepositoryInterface;
use App\Domain\Purchases\Models\Purchase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class PurchaseService
{
    public function __construct(
        private readonly PurchaseRepositoryInterface $purchases
    ){}

    public function create(array $data): Purchase
    {
        $purchase = $this->purchases->create($data);

        if (! $purchase) {
            $error = "Unable to create purchase";
            Log::error($error);
            throw new \Exception($error);
        }

        return $purchase;
    }


    public function update(Purchase $purchase, array $data): bool
    {
        $isUpdated = $this->purchases->update($purchase, $data);

        if (! $isUpdated) {
            $error = "Unable to update purchae";
            Log::error($error, ["purchase"=> $purchase, "data"=> $data]);
            throw new \Exception($error);
        }

        return true;
    }


    public function delete(Purchase $purchase): bool
    {
        $isDeleted = $this->purchases->delete($purchase);

        if (! $isDeleted) {
            $error = "Unable to delete purchase";
            Log::error($error, ["purchase"=> $purchase]);
            throw new \Exception($error);
        }

        return true;
    }


    public function generatePurchaseId()
    {
        $count = $this->purchases->getPurchaes()->count() + 1;
        return str_pad($count, 6, "0", STR_PAD_LEFT);
    }

    public function allPurchases(): Collection
    {
        return $this->purchases->getPurchaes();
    }
}
