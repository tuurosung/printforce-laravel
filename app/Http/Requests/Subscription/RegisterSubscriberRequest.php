<?php

namespace App\Http\Requests\Subscription;

use App\Models\Subscribers;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Foundation\Http\FormRequest;

class RegisterSubscriberRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'company_name' => [
                'required',
                'string',
                'max:100',
                Rule::unique(Subscribers::class, 'company_name')
            ],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(Subscribers::class, 'email'),
                Rule::unique('users', 'email')
            ],
            'password' => ['required', 'string', 'min:8'],
        ];
    }


    /**
     * Returns an array of subscriber data
     * 
     * @return array{company_address: mixed, company_email: mixed, company_name: mixed, company_phone: mixed, email: mixed, firstname: mixed, full_name: string, lastname: mixed, password: mixed, phone_number: mixed}
     */
    public function subscriberData()
    {
        return [
            'firstname' => $this->input('firstname'),
            'lastname' => $this->input('lastname'),
            'full_name' => $this->input('firstname') . ' ' . $this->input('lastname'),
            'email' => $this->input('email'),
            'phone_number' => $this->input('phone_number'),
            'company_name' => $this->input('company_name'),
            'company_address' => $this->input('address'),
            'company_phone' => $this->input('phone_number'),
            'company_email' => $this->input('email'),
            'password' => $this->input('password'),
        ];
    }


    /**
     * Returns an array of user data
     *
     * @return array{email: mixed, firstname: mixed, lastname: mixed, password: mixed, phone_number: mixed}
     */
    public function userData()
    {
        return [
            'firstname' => $this->input('firstname'),
            'lastname' => $this->input('lastname'),
            'email' => $this->input('email'),
            'password' => $this->input('password'),
            'phone_number' => $this->input('phone_number'),
        ];
    }
}
