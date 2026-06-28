<?php

namespace App\Domain\Suppliers\Models;

use App\Domain\Purchases\Models\Purchase;
use App\Domain\Purchases\Models\PurchasePayment;
use App\Models\Scopes\SubscriberScope;
use App\Observers\Suppliers\SupplierObserver;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


#[ObservedBy([SupplierObserver::class])]
#[ScopedBy([SubscriberScope::class])]
#[Fillable(['subscriber_id', 'supplier_id', 'supplier_name', 'supplier_address', 'supplier_phone'])]
class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'suppliers';
    protected $primaryKey = 'supplier_id';
    public $incrementing = false;

    protected $keyType = 'string';


    public function totalPurchase() : Attribute
    {
        return Attribute::make(
            get: fn () => $this->calculateTotalPurchase()
        );
    }


    public function totalPayment() : Attribute
    {
        return Attribute::make(
            get: fn () => $this->calculateTotalPayment()
        );
    }


    public function supplierBalance() : Attribute
    {
        return Attribute::make(
            get: fn () => $this->calculateBalance()
        );
    }


    public function numberOfInvoices() : Attribute
    {
        return Attribute::make(
            get: fn () => $this->countPurchases()
        );
    }



    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'supplier_id');
    }


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
