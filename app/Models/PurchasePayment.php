<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePayment extends Model
{
    use HasFactory;

    protected $table = 'purchase_payments';
    protected $primaryKey = 'payment_id';
    public $incrementing = false;

    public function paymentAccount()
    {
        return $this->belongsTo(OperatingAccount::class, 'account_number');
    }
}
