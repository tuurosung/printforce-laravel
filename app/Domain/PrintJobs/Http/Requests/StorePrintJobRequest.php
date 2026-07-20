<?php

namespace App\Domain\PrintJobs\Http\Requests;

use App\DTOs\Jobs\NewPrintJobData;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePrintJobRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required',
            'service_id' => 'required',
            'service_category_id' => 'nullable',

            'unit_cost' => 'required | numeric',

            'width' => 'required | numeric',
            'height' => 'required | numeric',
            'measuring_unit' => 'required | string',

            'quantity' => 'required | numeric',
            'sub_total' => 'required | numeric',

            'mat_supply' => 'nullable',
            'material_unit_cost' => 'nullable | numeric',
            'material_total_cost' => 'nullable | numeric',
            'purchase_cost' => 'nullable',

            'total' => 'required | numeric',

            'notes' => 'nullable | max:255',
        ];
    }

    public function toData()
    {
        return NewPrintJobData::fromRequest($this);
    }
}
