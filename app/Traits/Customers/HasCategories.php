<?php

namespace App\Traits\Customers;

use App\Models\Customers\Customer;
use App\Models\Customers\CustomerCategory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasCategories
{
    /**
     * Defines a belongs-to relationship with the Customer Category
     *
     * @return BelongsTo<CustomerCategory, Customer>
     */
    public function customerCategory(): BelongsTo
    {
        return $this->belongsTo(CustomerCategory::class, 'category', 'category_id');
    }
}
