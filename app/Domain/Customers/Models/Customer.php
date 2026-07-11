<?php

namespace App\Domain\Customers\Models;

use App\Casts\MoneyFormat;
use App\Domain\Customers\Models\CustomerCategory;
use App\Domain\Payments\Models\CustomerPayment;
use App\Domain\PrintJobs\Models\PrintforceJob;
use App\Enums\Customers\CustomerCategoryEnum;
use App\Models\Invoices\CustomerInvoice;
use App\Models\Scopes\SubscriberScope;
use App\Observers\CustomerObserver;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;


#[ObservedBy([CustomerObserver::class])]
#[ScopedBy([SubscriberScope::class])]
#[Fillable(['subscriber_id', 'customer_id', 'name', 'phone', 'category'])]
class Customer extends Model
{
    use SoftDeletes;

    use Searchable;

    use HasFactory;


    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    public $incrementing = false;
    protected $keyType = 'string';


    protected function casts(): array
    {
        return [
            'name' => 'string',
            'phone' => 'string',
            'debit' => MoneyFormat::class,
            'credit' => MoneyFormat::class,
            'category' => CustomerCategoryEnum::class
        ];
    }

    public function customerCategory(): BelongsTo
    {
        return $this->belongsTo(CustomerCategory::class, 'category', 'category_id');
    }


    public function printforceJobs(): HasMany
    {
        return $this->hasMany(PrintforceJob::class, 'customer_id', 'customer_id');
    }


    public function printfoceJobs(): HasMany
    {
        return $this->hasMany(PrintforceJob::class, 'customer_id', 'customer_id');
    }


    public function payments(): HasMany
    {
        return $this->hasMany(CustomerPayment::class, 'customer_id');
    }


    public function totalPaid(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->payments->sum('amount_paid') ?? 0.00
        );
    }

    protected function debit(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->jobs_total + $this->invoice_total
        );
    }


    protected function credit(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->totalPaid
        );
    }


    protected function balance(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->debit - $this->credit
        );
    }


    public function hasBalance(): bool
    {
        return $this->balance > 0;
    }


    public function jobsTotal(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->printfoceJobs->sum("total")
        );
    }


    /**
     * Defines a belongs-to relationship with the CustomerInvoices model.
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(CustomerInvoice::class, 'customer_id')
            ->where('status', 'active');
    }


    public function invoiceCount(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->invoices->count()
        );
    }


    public function invoiceTotal(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->invoices->sum('total') ?? 0.00
        );
    }
}
