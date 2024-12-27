<?php

namespace App\Models\Purchases;

use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchasedItem extends Model
{
    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->subscriber_id = Auth::user()->subscriber_id;
        });
    }


    protected $primaryKey = 'sn';
    public $incrementing = true;

    protected $fillable = [
        'subscriber_id',
        'supplier_id',
        'purchase_id',
        'description',
        'unit_cost',
        'qty',
        'sub_total',
    ];

    public static function offloadCart(string $purchase_id)
    {
        $is_offloaded = PurchasedItem::withoutGlobalScope('status')
        ->where('purchase_id', $purchase_id)
            ->where('status', 'cart')
            ->update([
                'status' => 'active'
            ]);


        return $is_offloaded > 0
            ? true
            : false;
    }
}
