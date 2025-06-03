<?php

namespace App\Http\Requests\Users;

use App\Facades\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'access_level' => $this->access_level ?? 'user',
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'phone_number' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!PhoneNumber::isValid($value)) {
                        $fail('The ' . $attribute . ' is not a valid phone number.');
                    }
                }

            ],
            'access_level' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ];
    }
}
