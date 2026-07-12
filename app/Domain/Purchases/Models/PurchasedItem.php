<?php

namespace App\Domain\Purchases\Models;

use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchasedItem extends Model
{
    use HasFactory;
    // use ScopedActive;
    use ScopedToSubscriber;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->subscriber_id = Auth::user()->subscriber_id;
        });
    }

    protected $table = 'purchased_items';
    protected $primaryKey = 'sn';
    protected $keyType = 'int';
    public $incrementing = true;

    protected $fillable = [
        'subscriber_id',
        'supplier_id',
        'purchase_id',
        'description',
        'unit_cost',
        'qty',
        'sub_total',
        'status',
    ];

    /**
     * Scopes -----------------------------------------------------------------------
     */


    /**
     * Scope to filter purchased items that are active
     *
     * @param Builder $query
     * @return void
     */
    #[Scope]
    protected function active(Builder $query) : void
    {
        $query->where('status', 'active');
    }


    /**
     * Scope to filter purchased items that are in cart status
     *
     * @param Builder $query
     * @return void
     */
    #[Scope]
    public function cart(Builder $query)
    {
        $query->where('status', 'cart');
    }

    /**
     * Scope to filter purchased items that are in draft status
     *
     * @param Builder $query
     * @return void
     */
    #[Scope]
    protected function draft($query)
    {
        return $query->where('status', 'draft');
    }



    /**
     * Attributes -------------------------------------------------------------------
     */




    /**
     * Relationships ----------------------------------------------------------------
     */



    /**
     * Methods -----------------------------------------------------------------------
     */

    /**
     * Offloads the cart items to active status
     *
     * @param string $purchase_id
     * @return bool
     */
    public static function offloadCart(string $purchase_id)
    {
        $is_offloaded = PurchasedItem::scopeCart()
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
