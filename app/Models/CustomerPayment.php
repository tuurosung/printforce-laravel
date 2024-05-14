<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerPayment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'payments';
    protected $primaryKey = 'payment_id';
    public $incrementing = false;
    protected $fillable = ['subscriber_id', 'customer_id', 'payment_id', 'amount_paid'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function account():BelongsTo
    {
        return $this->belongsTo(OperatingAccount::class, 'account_number');
    }


    static function totalPaymentPeriod($start_date, $end_date)
    {
        $total_payment = CustomerPayment::whereBetween('payment_date', [$start_date, $end_date])
            ->where('status', 'active')
            ->where('subscriber_id', '187635294')
            ->sum('amount_paid');

        return $total_payment;
    }
}
