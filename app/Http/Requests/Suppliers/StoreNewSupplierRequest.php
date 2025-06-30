<?php

namespace App\Http\Requests\Suppliers;

use Illuminate\Validation\Rule;
use App\Models\Suppliers\Supplier;
use Illuminate\Foundation\Http\FormRequest;

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


        return [
            'supplier_name' => [
                'required',
                'string',
                Rule::unique(Supplier::class, 'supplier_name')
                    ->where('subscriber_id', session('active_subscriber'))
                    ->ignore($supplierId, 'supplier_id')
            ],
            'supplier_phone' => [
                'required',
                'string',
                Rule::unique(Supplier::class, 'supplier_phone')
                    ->where('subscriber_id', session('active_subscriber'))
                    ->ignore($supplierId, 'supplier_id')
            ],
            'supplier_address' => 'required'
        ];
    }
}
