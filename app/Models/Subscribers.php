<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscribers extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // $model->subscriber_id = generateDashedRandomNumber();
        });
    }

    protected $activeSubscriber;

    protected $table = 'subscriptions';
    protected $primaryKey = 'subscriber_id';
    public $incrementing = false;


    protected $fillable = [
        'subscriber_id',
        'full_name',
        'email',
        'phone_number',
        'company_name',
        'company_email',
        'company_phone',
        'company_address',
        'user_id',
        'plan_id',
        'status',
        'start_date',
        'end_date',
        'subscription_plan',
        'last_payment_date',
        'next_payment_date'
    ];





    static function activeSubscriber()
    {
    }


    public function displayDaysRemaining(): string
    {
        if ($this->isExpired()) {
            return 'Subscription expired';
        }

        $daysRemaining = $this->daysRemaining();
        return $daysRemaining . ' days remaining';
    }

    public function daysRemaining(): int
    {
        $expiryDate = Carbon::parse($this->next_payment_date);
        $currentDate = Carbon::now();

        if ($expiryDate->isBefore($currentDate)) {
            return 0; // Subscription has expired
        }

        $daysRemaining = $currentDate->diffInDays($expiryDate, true);

        // return the absolute value of days remaining
        return $daysRemaining;
    }

    public function isExpired(): bool
    {
        return Carbon::parse($this->next_payment_date)->isBefore(Carbon::now());
    }


}
