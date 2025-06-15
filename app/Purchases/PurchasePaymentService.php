<?php

namespace App\Purchases;

use App\Models\Purchases\PurchasePayment;

class PurchasePaymentService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private $purchaePayment = new PurchasePayment()
    )
    {}


    /**
     * Return the recent 100 purchase payments.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRecentPayments()
    {
        return $this->purchaePayment->with(['supplier', 'paymentAccount'])
            ->orderBy('created_at', 'desc')
            ->take(100)
            ->get();
    }
}
