<?php

namespace App\Http\Requests\Jobs;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmbroideryJobRequest extends FormRequest
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
            'service_id' => 'required',
            'unit_cost' => 'required',
            'qty' => 'required',
            'embroidery_cost' => 'required',
            'mat_supply' => 'required',
            'mat_unit_cost' => 'required',
            'purchase_cost' => 'required',
            'total' => 'required',
            'notes' => 'nullable',
        ];
    }
}
