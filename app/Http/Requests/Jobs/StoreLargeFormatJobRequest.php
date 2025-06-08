<?php

namespace App\Http\Requests\Jobs;

use Illuminate\Foundation\Http\FormRequest;

class StoreLargeFormatJobRequest extends FormRequest
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
            'cost' => 'required|numeric|gt:0',
            'measuring_unit' => 'required',
            'discount' => 'required|numeric|min:0',
            'premium' => 'required|numeric|min:0',
            'width' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'copies' => 'required|numeric|min:0',
            'total' => 'required|numeric',
            'date' => 'required|date',
            'notes' => 'nullable|string|max:255',
        ];
    }
}
