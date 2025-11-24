<?php

namespace App\Traits\Customers;

use App\Models\Customers\Customer;
use App\Models\Customers\CustomerPayment;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasPayments
{
    /**
     * Defines a has-many relationship with the CustomerPayment model.
     *
     * @return HasMany<CustomerPayment, Customer>
     */
    public function payments(): HasMany
    {
        return $this->hasMany(CustomerPayment::class, 'customer_id');
    }

    /**
     * Returns the total amount paid by the customer.
     *
     * @return float
     */
    public function totalPaid(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->payments->sum('amount_paid') ?? 0.00
        );
    }
}
