<?php

namespace App\Domain\Payments\Models;

use App\Domain\Customers\Models\Customer;
use App\Models\Accounting\OperatingAccount;
use App\Models\Scopes\SubscriberScope;
use App\Observers\CustomerPaymentObserver;
use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ScopedBy([SubscriberScope::class])]
#[ObservedBy([CustomerPaymentObserver::class])]
#[Fillable(['subscriber_id', 'customer_id', 'payment_id', 'amount_paid', 'account_number', 'payment_date'])]
class CustomerPayment extends Model
{
    use SoftDeletes;

    use HasFactory;
    use ScopedActive;

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
