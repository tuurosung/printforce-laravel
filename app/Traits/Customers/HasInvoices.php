<?php

namespace App\Traits\Customers;

use App\Models\Customers\Customer;
use App\Models\Invoices\CustomerInvoice;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasInvoices
{
    /**
     * Defines a belongs-to relationship with the CustomerInvoices model.
     *
     * @return HasMany<CustomerInvoice, Customer>
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(CustomerInvoice::class, 'customer_id')
            ->where('status', 'active');
    }


    public function invoiceCount(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->invoices->count()
        );
    }

    public function invoiceTotal(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->invoices->sum('total') ?? 0.00
        );
    }

}
