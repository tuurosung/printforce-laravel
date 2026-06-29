<?php

namespace App\Domain\Purchases\Models;

use App\Domain\Suppliers\Models\Supplier;
use App\Models\Accounting\OperatingAccount;
use App\Models\Scopes\SubscriberScope;
use App\Observers\Purchases\PurchasePaymentObserver;
use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ScopedBy([SubscriberScope::class])]
#[ObservedBy([PurchasePaymentObserver::class])]
#[Fillable(["subscriber_id", "payment_id", "amount_paid", "reference", "date", "account_number", "notes", "supplier_id"])]
class PurchasePayment extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'purchase_payments';
    protected $primaryKey = 'payment_id';
    public $incrementing = false;


    /**
     * Define the relationship witht the Purchase model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Purchase, PurchasePayment>
     */
    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id', 'purchase_id');
    }


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
