<?php

namespace App\Models\Purchases;

use App\Traits\ScopedActive;
use App\Models\Suppliers\Supplier;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory;
    // use ScopedActive;
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
        'lockstatus',
        'created_by',
    ];

    /**
     * Scopes -----------------------------------------------------------------------
     */



    /**
     * Attributes -----------------------------------------------------------------------
     */


    public function invoiceId() : Attribute
    {
        return Attribute::make(
            get: fn () => '#'.str_pad($this->sn, 6, '0', STR_PAD_LEFT)
        );
    }


    public function invoiceStatus() : Attribute
    {
        return Attribute::make(
            get: fn () => $this->lockstatus === 'locked' ? 'Locked' : 'Draft'
        );
    }


    /**
     * Returns the sum of all items in the cart as subtotal.
     *
     * @return float
     */
    public function cartSubTotal() : Attribute
    {
        return Attribute::make(
            get: function ()  {
                // Cache the result to avoid multiple queries
                if ($this->relationLoaded('cartItems')) {
                    return $this->cartItems->sum('sub_total');
                }


                // If not loaded, fetch the cart items and calculate the sum
                $this->cartItems()->sum('sub_total');
            }
        );
    }


    /**
     * Returns the total amount of all purchased items.
     * This excludes items in the cart.
     *
     * @return Attribute
     */
    public function total() : Attribute
    {
        return Attribute::make(
            get: function()  {
                // Cache the result to avoid multiple queries
                if ($this->relationLoaded('purchasedItems')) {
                    return $this->purchasedItems->sum('sub_total');
                }

                // If not loaded, fetch the purchased items and calculate the sum
                $this->purchasedItems()->sum('sub_total');
            }
        );
    }




    /**
     * Relationships ---------------------------------------------------------------
     */


    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }


    /**
     * Get all cart items associated with this purchase.
     */
    public function cartItems()
    {
        return $this->hasMany(PurchasedItem::class, 'purchase_id')
            ->cart();
    }


    /**
     * Get all purchased items associated with this purchase.
     * This excludes items in the cart.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<PurchasedItem, Purchase>
     */
    public function purchasedItems()
    {
        return $this->hasMany(PurchasedItem::class, 'purchase_id');
            // ->active();
    }


}
