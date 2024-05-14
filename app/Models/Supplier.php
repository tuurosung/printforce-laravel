<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $primaryKey = 'supplier_id';
    public $incrementing = false;

    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'supplier_id');

        // ->where('status', 'active')->where('subscriber_id', $this->active_subscriber);
    }

    public function totalPurchase()
    {
        return $this->purchases->sum('purchase_total');
    }

    public function payment()
    {
        return $this->hasMany(PurchasePayment::class, 'supplier_id');
        // ->where('status', 'active')->where('subscriber_id', $this->active_subscriber);
    }

    public function totalPayment()
    {
        return $this->payment()->sum('amount_paid');
    }

    public function supplierBalance()
    {
        return $this->totalPurchase() - $this->totalPayment();
    }

    public function countInvoices()
    {
        return $this->purchases->count();
    }
}
