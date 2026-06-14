<?php

namespace App\Traits\Customers;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasBalance
{
    protected function debit(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->jobs_total + $this->invoice_total
        );
    }



    protected function credit(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->totalPaid
        );
    }


    protected function balance(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->debit - $this->credit
        );
    }


    public function hasBalance(): bool
    {
        return $this->balance > 0;
    }


}
