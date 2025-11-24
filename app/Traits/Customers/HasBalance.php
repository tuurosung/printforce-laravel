<?php

namespace App\Traits\Customers;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasBalance
{
    public function debit(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->jobs_total + $this->invoice_total
        );
    }



    public function credit(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->totalPaid
        );
    }


    public function balance(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->debit - $this->credit
        );
    }
}
