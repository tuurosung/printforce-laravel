<?php

namespace App\Models\Customers;

use App\Enums\Customers\CustomerCategoryEnum;
use App\Traits\Customers\HasBalance;
use App\Traits\Customers\HasCategories;
use App\Traits\Customers\HasInvoices;
use App\Traits\Customers\HasJobs;
use App\Traits\Customers\HasPayments;
use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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


    protected $fillable = [
        'subscriber_id',
        'customer_id',
        'name',
        'phone',
        'category',
    ];


    protected $casts = [
        'created_at' => 'datetime',
        'debit' => 'decimal: 2',
        'credit' => 'decimal: 2',
        'category' => CustomerCategoryEnum::class
    ];



}
