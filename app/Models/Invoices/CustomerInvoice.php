<?php

namespace App\Models\Invoices;

use App\Models\Customers\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Scopes\SubscriberScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Invoices\CustomerInvoiceItem;
use App\Services\Invoices\CustomerInvoiceService;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[ScopedBy(SubscriberScope::class)]
class CustomerInvoice extends Model
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->subscriber_id = Auth::user()->subscriber_id;
            $model->invoice_id = CustomerInvoiceService::generateInvoiceNumber();
        });
    }

    use HasFactory;
    protected $table = 'invoices';
    protected $primaryKey = 'invoice_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'subscriber_id',
        'customer_id',
        'invoice_type',
        'invoice_date',
        'due_date',
    ];


    #[Scope]
    protected function activeInvoices(Builder $query): void
    {
        $query->where('status', 'active');
    }


    /**
     * Relationships ------------------------------------------------------------------------------------
     */


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id')
            ->withDefault([
                'name' => 'Unknown Customer',
            ]);
    }


    public function customerInvoiceItems()
    {
        return $this->hasMany(CustomerInvoiceItem::class, 'invoice_id', 'invoice_id');
    }


    private function calculateTotalAmount()
    {
        return $this->customerInvoiceItems->sum(function ($item) {
            return $item->total;
        });
    }

    public function updateSubTotal()
    {
        $this->sub_total = $this->calculateTotalAmount();
        $this->save();
    }
}
