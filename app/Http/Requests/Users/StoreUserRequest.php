<?php

namespace App\Http\Requests\Users;

use App\Models\User;
use App\Facades\PhoneNumber;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique(User::class, 'email')
            ],
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


    public function getUserData(): array
    {
        $data = $this->validated();

        return [
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'name' => $data['firstname'] . ' ' . $data['lastname'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'access_level' => $data['access_level'],
            'password' => Hash::make($data['password']),
            'subscriber_id' => Auth::user()->subscriber_id
        ];
    }
}
