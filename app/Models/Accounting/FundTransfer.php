<?php

namespace App\Models\Accounting;

use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FundTransfer extends Model
{
    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transfer) {
            $transfer->transfer_id = generateDashedRandomNumber();
            $transfer->subscriber_id = Auth::user()->subscriber_id;
        });
    }

    protected $table = 'fund_transfers';
    protected $primaryKey = 'transfer_id';
    protected $fillable = ['subscriber_id', 'transfer_id', 'amount', 'date', 'source_account', 'destination_account', 'notes'];
    public $incrementing = false;


    public function sourceAccount()
    {
        return $this->belongsTo(OperatingAccount::class, 'source_account');
    }

    public function destinationAccount()
    {
        return $this->belongsTo(OperatingAccount::class, 'destination_account');
    }


}
