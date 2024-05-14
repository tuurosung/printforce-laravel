<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundTransfer extends Model
{
    use HasFactory;
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
