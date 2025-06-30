<?php

namespace App\Http\Requests\PrintServices;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewPrintServiceRequest extends FormRequest
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
            'service_name' => 'required',
            'category_id' => 'required',
            'individual' => 'required|numeric',
            'artist' => 'required|numeric',
            'institution' => 'required|numeric',
        ];
    }
}
