<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscribers extends Model
{
    use HasFactory;

    protected $activeSubscriber;

    protected $table = 'subscriptions';
    protected $primaryKey = 'subscriber_id';
    protected $fillable = ['user_id', 'plan_id', 'status', 'start_date', 'end_date'];
    public $incrementing = false;


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

        return $currentDate->diffInDays($expiryDate);
    }

    public function isExpired(): bool
    {
        return Carbon::parse($this->next_payment_date)->isBefore(Carbon::now());
    }


}
