<?php

namespace App\Models\Invoices;

use App\Casts\MoneyFormat;
use App\Domain\Customers\Models\Customer;
use App\Enums\Invoices\InvoiceStatusEnum;
use App\Enums\Invoices\InvoiceTypeEnum;
use App\Models\Invoices\CustomerInvoiceItem;
use App\Models\Scopes\SubscriberScope;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

#[ScopedBy(SubscriberScope::class)]
#[Fillable(['subscriber_id', 'customer_id', 'invoice_type', 'invoice_date', 'due_date', 'due_date', 'status', 'sub_total', 'total', 'paid_at'])]
class CustomerInvoice extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->subscriber_id = Auth::user()->subscriber_id;
            $model->invoice_id = generatedNumericId(10);

        });
    }

    protected $table = 'invoices';
    protected $primaryKey = 'invoice_id';
    protected $keyType = 'string';
    public $incrementing = false;


    protected function casts(): array
    {
        return [
            'invoice_type' => InvoiceTypeEnum::class,
            'invoice_date' => 'datetime',
            'due_date' => 'datetime',
            'paid_at' => 'datetime',
            'sub_total' => MoneyFormat::class,
            'total' => 'decimal:2',
            'status' => InvoiceStatusEnum::class
        ];
    }


    #[Scope]
    protected function activeInvoices(Builder $query): void
    {
        $query->where('status', 'active');
    }


    #[Scope]
    protected function draftInvoices(Builder $query): void
    {
        $query->where('status', 'draft');
    }


    public function totalValue(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->invoiceItems->sum('total')
        );
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id')
            ->withDefault([
                'name' => 'Unknown Customer',
            ]);
    }


    public function invoiceItems()
    {
        return $this->hasMany(CustomerInvoiceItem::class, 'invoice_id', 'invoice_id');
    }


    public function hasServiceItems(): bool
    {
        return $this->invoiceItems()->exists();
    }


    public function items(): HasMany
    {
        return $this->hasMany(CustomerInvoiceItem::class,'invoice_id', 'invoice_id');
    }


    public function isDraft(): bool
    {
        return $this->status == InvoiceStatusEnum::DRAFT;
    }

}
