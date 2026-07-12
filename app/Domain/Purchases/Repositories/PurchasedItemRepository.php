<?php

namespace App\Domain\Purchases\Repositories;

use App\Domain\Purchases\Contracts\PurchasedItemRepositoryInterface;
use App\Domain\Purchases\Models\Purchase;
use App\Domain\Purchases\Models\PurchasedItem;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PurchasedItemRepository extends BaseRepository implements PurchasedItemRepositoryInterface
{

    public function __construct(PurchasedItem $model)
    {
        parent::__construct($model);
    }


    public function addToCart(Purchase $purchase, array $data)
    {
        return DB::transaction(function () use ($purchase, $data) {

            // prevent editing locked invoices
            if ($purchase->lockstatus == 'locked') {
                $error = "Invoice is locked. You cannot edit it";
                Log::error($error);
                throw new \Exception($error);
            }

            return $purchase->purchasedItems()->create($data);
        });
    }


    public function removeFromCart(PurchasedItem $purchasedItem): bool
    {
        return $this->transaction(function () use ($purchasedItem) {
            return $purchasedItem->delete();
        });
    }
}
