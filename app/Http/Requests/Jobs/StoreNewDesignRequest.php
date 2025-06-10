<?php

namespace App\Http\Requests\Jobs;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewDesignRequest extends FormRequest
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
            'unit_cost' => 'required|numeric',
            'copies' => 'required|numeric|min:1',
            'total' => 'required|numeric',
            'notes' => 'nullable|string|max:100',
            'date' => 'required|date',
        ];
    }
}
