<?php

namespace App\Models\Suppliers;

use App\Traits\ScopedActive;
use App\Models\Purchases\Purchase;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchases\PurchasePayment;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($supplier) {
            $supplier->supplier_id = generateRandomString();
            $supplier->subscriber_id = Auth::user()->subscriber_id;
        });
    }

    protected $table = 'suppliers';
    protected $primaryKey = 'supplier_id';
    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'subscriber_id',
        'supplier_id',
        'supplier_name',
        'supplier_address',
        'supplier_phone'
    ];

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
