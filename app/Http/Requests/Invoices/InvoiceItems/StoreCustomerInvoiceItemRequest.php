<?php

namespace App\Http\Requests\Invoices\InvoiceItems;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerInvoiceItemRequest extends FormRequest
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
        return [
            'service_id' => [
                'required',
            ],
            'service_category_id' => [
                'nullable',
            ],
            'unit_cost' => [
                'required',
                'numeric',
            ],
            'width' => [
                'required',
                'numeric',
            ],
            'height' => [
                'required',
                'numeric',
            ],
            'measuring_unit' => [
                'required',
            ],
            'quantity' => [
                'required',
                'numeric',
            ],
            'sub_total' => [
                'required',
                'numeric',
            ],
            'material_unit_cost' => [
                'nullable',
                'numeric',
            ],
            'material_total_cost' => [
                'nullable',
                'numeric',
            ],
            'total' => [
                'required',
                'numeric',
            ],
            'notes'=> [
                'nullable',
                'max:255',
            ]
        ];
    }


    public function messages(): array
    {
        return [
            'service_id.required' => 'Please select a service.',
            'unit_cost.required' => 'Please enter the unit cost.',
            'unit_cost.numeric' => 'The unit cost must be a numeric value.',
            'width.required' => 'Please enter the width.',
            'width.numeric' => 'The width must be a numeric value.',
            'height.required' => 'Please enter the height.',
            'height.numeric' => 'The height must be a numeric value.',
            'measuring_unit.required' => 'Please select a measuring unit.',
            'quantity.required' => 'Please enter the quantity.',
            'quantity.numeric' => 'The quantity must be a numeric value.',
            'sub_total.required' => 'Please enter the sub total.',
            'sub_total.numeric' => 'The sub total must be a numeric value.',
            'material_unit_cost.numeric' => 'The material unit cost must be a numeric value.',
            'material_total_cost.numeric' => 'The material total cost must be a numeric value.',
            'total.required' => 'Please enter the total amount.',
            'total.numeric' => 'The total amount must be a numeric value.',
        ];
    }
}
