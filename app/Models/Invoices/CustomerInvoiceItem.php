<?php

namespace App\Models\Invoices;

use App\Casts\MoneyFormat;
use App\Domain\PrintServices\Models\PrintService;
use App\Enums\Services\ServiceCategoryEnum;
use App\Models\Scopes\SubscriberScope;
use App\Observers\Invoices\CustomerInvoiceItemObserver;
use App\Observers\Invoices\CustomerInvoiceObserver;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([CustomerInvoiceItemObserver::class])]
#[ScopedBy([SubscriberScope::class])]
#[Fillable(['subscriber_id', 'invoice_id', 'service_id', 'service_category_id', 'unit_cost', 'width', 'height', 'measuring_unit', 'quantity', 'notes', 'material_unit_cost', 'details', 'sub_total', 'total'])]
class CustomerInvoiceItem extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'invoice_items';
    protected $primaryKey = 'sn';
    protected $keyType = 'int';

    protected function casts(): array
    {
        return [
            'unit_cost' => MoneyFormat::class,
            'total' => 'decimal:2',
            'service_category_id' => ServiceCategoryEnum::class,
        ];
    }


    public function details(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->buildDetails(),
        );
    }


    public function service(): BelongsTo
    {
        return $this->belongsTo(PrintService::class, 'service_id', 'service_id')
            ->withDefault([
                'service_name' => 'Undefined'
            ]);
    }


    public function buildDetails()
    {
        return $this->service->category_id?->buildDetails($this);
    }
}
