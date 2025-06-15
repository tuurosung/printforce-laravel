<?php

namespace App\Models\Suppliers;

use App\Traits\ScopedActive;
use App\Models\Purchases\Purchase;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchases\PurchasedItem;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchases\PurchasePayment;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    // use ScopedActive;
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


    /**
     * Attributes --------------------------------------------------------------------------
     */

    /**
     * Get the total amount of purchases made from the supplier.
     */
    public function totalPurchase() : Attribute
    {
        return Attribute::make(
            get: fn () => $this->calculateTotalPurchase()
        );
    }


    /**
     * Get the total amount paid to the supplier.
     *
     * @return float
     */
    public function totalPayment() : Attribute
    {
        return Attribute::make(
            get: fn () => $this->calculateTotalPayment()
        );
    }


    /**
     * Calculate the supplier's balance by subtracting total payments from total purchases.
     *
     * @return float
     */
    public function supplierBalance() : Attribute
    {
        return Attribute::make(
            get: fn () => $this->calculateBalance()
        );
    }


    /**
     * Return the number of invoices (purchases) associated with the supplier.
     * @return int
     */
    public function numberOfInvoices() : Attribute
    {
        return Attribute::make(
            get: fn () => $this->countPurchases()
        );
    }




    /**
     * Relationships ----------------------------------------------------------------------
     */


    /**
     * Define the relationship with the Purchase model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Purchase, Supplier>
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'supplier_id');
    }


    /**
     * Define the relationship with the PurchasePayment model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<PurchasePayment, Supplier>
     */
    public function payment()
    {
        return $this->hasMany(PurchasePayment::class, 'supplier_id');
    }


    /**
     * Methods --------------------------------------------------------------------------
     */

    /**
     * Calculate the total amount of purchases made from the supplier.
     *
     * @return float
     */
    public function calculateTotalPurchase()
    {
        // check if the relationship is loaded
        if ($this->relationLoaded('purchases')) {
            return $this->purchases->sum(
                function ($purchase)
                {
                    return $purchase->purchasedItems->sum('sub_total');
                }
            );
        }

        // If not loaded, fetch the purchases and calculate the sum
        return $this->purchases()
            ->with('purchasedItems')
            ->get()
            ->sum(function ($purchase) {
                return $purchase->purchasedItems->sum('sub_total');
            });
    }


    /**
     * Calculate the total amount paid to the supplier.
     *
     * @return float
     */
    public function calculateTotalPayment()
    {
        return $this->payment->sum('amount_paid') ?? 0.0;
    }


    /**
     * Calculate the supplier's balance by subtracting total payments from total purchases.
     * returns the balance as a float. If the balance is negative, balance
     * should be braced in parentheses to indicate a negative value.
     *
     */
    public function calculateBalance()
    {
        $balance = $this->total_purchase - $this->total_payment;
        return $balance;
    }


    /**
     * Count the number of purchases (invoices) associated with the supplier.
     *
     * @return int
     */
    public function countPurchases()
    {
        return $this->purchases->count() ?? 0;
    }


    /**
     * Check if the supplier has any purchases.
     */
    public function hasPurchases(): bool
    {
        return $this->purchases()->exists();
    }


    /**
     * Check if the supplier has any payments.
     */
    public function hasPayments(): bool
    {
        return $this->payment()->exists();
    }



    /**
     * Load relationships when retrieving suppliers.
     */
    public function scopeWithRelationships($query)
    {
        return $query->with(['purchases', 'payment']);
    }


    /**
     * Eager load the relationship on a given supplier instance.
     */
    public function loadRelationships()
    {
        return $this->load(['purchases', 'payment.paymentAccount']);
    }

}
