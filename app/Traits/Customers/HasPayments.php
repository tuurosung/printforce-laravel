<?php

namespace App\Traits\Customers;

use App\Domain\Payments\Models\CustomerPayment;
use App\Models\Customers\Customer;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasPayments
{

    public function payments(): HasMany
    {
        return $this->hasMany(CustomerPayment::class, 'customer_id');
    }

    public function totalPaid(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->payments->sum('amount_paid') ?? 0.00
        );
    }
}
