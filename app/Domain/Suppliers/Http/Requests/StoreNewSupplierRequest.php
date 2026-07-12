<?php

namespace App\Domain\Suppliers\Http\Requests;

use App\Domain\Suppliers\Models\Supplier;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNewSupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $supplierId = $this->route('supplier') ? $this->route('supplier')->supplier_id : null;

        $subscriberId = session('active_subscriber');

        $nameRule = Rule::unique(Supplier::class, 'supplier_name')
            ->where('subscriber_id', $subscriberId)
            ->ignore($supplierId, 'supplier_id');

        $phoneRule = Rule::unique(Supplier::class,'supplier_phone')
            ->where('subscriber_id', $supplierId)
            ->ignore($supplierId, 'supplier_id');


        return [
            'supplier_name' =>  [
                'required',
                'string',
                $nameRule
            ],
            'supplier_phone'    =>  [
                'required',
                'string',
                $phoneRule
            ],
            'supplier_address'  =>  [
                'required'
            ]
        ];
    }
}
