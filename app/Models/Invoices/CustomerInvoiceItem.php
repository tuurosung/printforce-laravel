<?php

namespace App\Models\Invoices;

use App\Models\Services\Service;
use Illuminate\Support\Facades\Auth;
use App\Models\Services\PrintService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class CustomerInvoiceItem extends Model
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->subscriber_id = Auth::user()->subscriber_id;
        });
    }

    protected $table = 'invoice_items';
    protected $primaryKey = 'sn';

    protected $fillable = [
        'invoice_id',
        'service_id',
        'service_category_id',
        'unit_cost',
        'width',
        'height',
        'measuring_unit',
        'quantity',
        'material_unit_cost',
        'details',
    ];


    public function details(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->builddetails(),
        );
    }


    public function service()
    {
        return $this->belongsTo(PrintService::class, 'service_id', 'service_id');
    }


    public function builddetails()
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
