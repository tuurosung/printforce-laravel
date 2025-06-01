<?php

namespace App\Http\Requests\Customers;

use Illuminate\Validation\Rule;
use App\Models\Customers\Customer;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
        $customerId = request()->route('customer')?->customer_id ?? null;

        return [
            'name' => [
                'required',
                'string',
                Rule::unique(Customer::class)
                    ->where('subscriber_id', session('active_subscriber'))
                    ->whereNot('customer_id', $customerId)
            ],
            'phone' => [
                'required',
                'size:10',
                'regex:/^[0-9]{10}$/',
                Rule::unique(Customer::class)
                    ->where('subscriber_id', session('active_subscriber'))
                    ->whereNot('customer_id', $customerId)
            ],
            'category' => 'required'
        ];
    }
}
