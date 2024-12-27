<?php

namespace App\Models\Purchases;

use App\Models\Accounting\OperatingAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
