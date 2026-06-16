<?php

namespace App\Domain\Payments\Models;

use Carbon\Carbon;
use App\Traits\ScopedActive;
use App\Models\Customers\Customer;
use App\Traits\ScopedToSubscriber;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Accounting\OperatingAccount;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['subscriber_id', 'customer_id', 'payment_id', 'amount_paid', 'account_number', 'payment_date'])]
class CustomerPayment extends Model
{
    use SoftDeletes;
    
    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($customerPayment) {
            $customerPayment->payment_id = generateDashedRandomNumber();
            $customerPayment->subscriber_id = Auth::user()->subscriber_id;
        });

    }



    protected $table = 'payments';
    protected $primaryKey = 'payment_id';
    public $incrementing = false;


    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


    public function account():BelongsTo
    {
        return $this->belongsTo(OperatingAccount::class, 'account_number');
    }


    public function getPaymentAccountNameAttribute()
    {
        return $this->account->account_name;
    }


    // BEGIN STATIC FUNCTIONS


    static function totalPaymentPeriod($start_date, $end_date)
    {
        $total_payment = CustomerPayment::whereBetween('payment_date', [$start_date, $end_date])
            ->sum('amount_paid');

        return $total_payment;
    }

    public static function paymentGraph()
    {
        $total_payment = CustomerPayment::select('payment_date', \DB::raw('SUM(amount_paid) as total_payment'))
            ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->groupBy('payment_date')
            ->get();

        return $total_payment->toJson();
    }


    public static function sumOfCustomerPayments()
    {
        return CustomerPayment::sum('amount_paid');
    }
}
