<?php

namespace App\Models\Invoices;

use App\Casts\MoneyFormat;
use App\Domain\PrintServices\Models\PrintService;
use App\Models\Scopes\SubscriberScope;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

#[ScopedBy([SubscriberScope::class])]
#[Fillable(['subscriber_id', 'invoice_id', 'service_id', 'service_category_id', 'unit_cost', 'width', 'height', 'measuring_unit', 'quantity', 'material_unit_cost', 'details'])]

class CustomerInvoiceItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->subscriber_id = Auth::user()->subscriber_id;
        });
    }

    protected $table = 'invoice_items';
    protected $primaryKey = 'sn';
    protected $keyType = 'int';


    protected $casts = [
        'unit_cost' => MoneyFormat::class,
        'total' => 'decimal:2'
    ];


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
        if ($this->service_category_id === '001') {
            return "{$this->width} x {$this->height} {$this->measuring_unit} ({$this->quantity} pcs)";
        } elseif ($this->service_category_id === '003') {
            return "Materials {$this->material_unit_cost} x  ({$this->quantity} pcs)";
        } else {
            return "N/A";
        }
    }
}
