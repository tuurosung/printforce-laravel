<?php

namespace App\Data;

use App\Models\Customers\Customer;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

class CustomerData extends Data
{
    public function __construct(

        public string $name,
        public string $phone,
        public string $category

    ) {}


    public static function rules(): array
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
