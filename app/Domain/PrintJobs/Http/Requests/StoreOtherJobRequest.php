<?php

namespace App\Domain\PrintJobs\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOtherJobRequest extends FormRequest
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
            'service_id' => 'required',
            'cost' => 'required|numeric',
            'qty' => 'required|numeric|min:1',
            'total' => 'required|numeric',
            'notes' => 'nullable|string|max:100',
            'date' => 'required|date',
        ];
    }
}
