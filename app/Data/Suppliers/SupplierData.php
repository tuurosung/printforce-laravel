<?php

namespace App\Data\Suppliers;

use App\Models\Suppliers\Supplier;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

class SupplierData extends Data
{
    public function __construct(

        public string $supplier_name,
        public string $supplier_phone,
        public string $supplier_address

    ) {}


    public static function rules(): array
    {
        $supplierId = request()->route('supplier')?->supplier_id;

        $nameRule = Rule::unique(Supplier::class, 'supplier_name')
            ->where('subscriber_id', session('active_subscriber'));

        $phoneRule = Rule::unique(Supplier::class, 'supplier_phone')
            ->where('subscriber_id', session('active_subscriber'));

        if ($supplierId) {
            $nameRule->ignore($supplierId, 'supplier_id');
            $phoneRule->ignore($supplierId, 'supplier_id');
        }


        return [
            'supplier_name' => ['required', 'string', $nameRule],
            'supplier_phone' => ['required', 'string', $phoneRule],
            'supplier_address' => ['required', 'string']
        ];
    }
}
