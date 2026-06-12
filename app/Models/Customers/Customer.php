<?php

namespace App\Models\Customers;

use App\Casts\MoneyFormat;
use App\Enums\Customers\CustomerCategoryEnum;
use App\Traits\Customers\HasBalance;
use App\Traits\Customers\HasCategories;
use App\Traits\Customers\HasInvoices;
use App\Traits\Customers\HasJobs;
use App\Traits\Customers\HasPayments;
use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

#[Fillable(['subscriber_id', 'customer_id', 'name', 'phone', 'category'])]
class Customer extends Model
{
    use SoftDeletes;

    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    use HasCategories;
    use HasJobs;
    use HasPayments;
    use HasInvoices;
    use HasBalance;


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($customer) {
            $customer->subscriber_id = Auth::user()->subscriber_id;
            $customer->customer_id = generateRandomString();
        });

    }


    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    public $incrementing = false;
    protected $keyType = 'string';


    protected function casts(): array
    {
        return [
            'name' => 'string',
            'phone' => 'string',
            'debit' => MoneyFormat::class,
            'credit' => MoneyFormat::class,
            'category' => CustomerCategoryEnum::class
        ];
    }
}
