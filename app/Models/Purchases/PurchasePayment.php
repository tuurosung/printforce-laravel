<?php

namespace App\Models\Purchases;

use App\Traits\ScopedActive;
use App\Models\Suppliers\Supplier;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Accounting\OperatingAccount;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchasePayment extends Model
{
    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;


    protected static function boot()
    {
        parent::boot();

        // Automatically set the subscriber_id when creating a new PurchasePayment
        static::creating(function ($purchasePayment) {
            if (Auth::check()) {
                $purchasePayment->subscriber_id = session('active_subscriber');
                $purchasePayment->payment_id = generateRandomString();
            }
        });
    }

    protected $table = 'purchase_payments';
    protected $primaryKey = 'payment_id';
    public $incrementing = false;


    protected $fillable = [
        'subscriber_id',
        'payment_id',
        'amount_paid',
        'reference',
        'date',
        'account_number',
        'notes',
        'supplier_id'
    ];


    /**
     * Relationships --------------------------------------------------------------------------
     */

    // /**
    //  * Define the relationship witht the Purchase model.
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Purchase, PurchasePayment>
    //  */
    // public function purchase()
    // {
    //     return $this->belongsTo(Purchase::class, 'purchase_id', 'purchase_id');
    // }


    /**
     * Define the relationship with the Payment model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<OperatingAccount, PurchasePayment>
     */
    public function paymentAccount()
    {
        return $this->belongsTo(OperatingAccount::class, 'account_number')->withDefault([
            'account_name' => 'Undefined Account'
        ]);
    }



    /**
     * Define the relationship with the Supplier model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Supplier, PurchasePayment>
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'supplier_id')->withDefault([
            'supplier_name' => 'Undefined Supplier'
        ]);
    }


}
