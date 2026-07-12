<?php


namespace App\Domain\Purchases\Contracts;

use App\Domain\Purchases\Models\Purchase;
use App\Domain\Purchases\Models\PurchasedItem;
use App\Repositories\Contracts\BaseRepositoryInterface;

interface PurchasedItemRepositoryInterface extends BaseRepositoryInterface
{
    public function addToCart(Purchase $purchase, array $data);
    public function removeFromCart(PurchasedItem $purchasedItem): bool;
}
