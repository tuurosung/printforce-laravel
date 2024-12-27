<?php

namespace App\Models\Purchases;

use App\Traits\ScopedActive;
use App\Models\Suppliers\Supplier;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($purchase) {
            $purchase->purchase_id = generateDashedRandomNumber();
            $purchase->subscriber_id = Auth::user()->subscriber_id;
        });
    }

    protected $table = 'purchases';
    protected $primaryKey = 'purchase_id';
    public $incrementing = false;

    protected  $keyType = 'string';

    protected $fillable = [
        'purchase_id',
        'subscriber_id',
        'reference',
        'supplier_id',
        'date_issued',
        'due_date',
        'notes',
    ];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function cartItems()
    {
        return $this->hasMany(PurchasedItem::class, 'purchase_id')->withoutGlobalScope('status')->where('status', 'cart');
    }

    public function purchasedItems()
    {
        return $this->hasMany(PurchasedItem::class, 'purchase_id');
    }


}
