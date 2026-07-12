<?php

namespace Database\Factories\Invoices;

use App\Domain\Customers\Models\Customer;
use App\Enums\Invoices\InvoiceTypeEnum;
use App\Models\Invoices\CustomerInvoice;
use App\Models\Subscribers;
use App\Services\Invoices\CustomerInvoiceService;
use App\Traits\Testing\DefaultValuesTrait;
use Database\Factories\SubscribersFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Auth;

/**
 * @extends Factory<CustomerInvoice>
 */
class CustomerInvoiceFactory extends Factory
{
    use DefaultValuesTrait;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subscriber_id' => self::DEFAULT_SUBSCRIBER_ID,
            'invoice_id' => CustomerInvoiceService::generateInvoiceNumber(),
            // 'invoice_uuid' => Str::uuid(),
            'invoice_type' => $this->faker->randomElement(InvoiceTypeEnum::values()),
            'customer_id' => $this->faker->randomElement(Customer::pluck('customer_id')->toArray()),
            'invoice_date' => $this->faker->date(),
            'due_date' => $this->faker->dateTimeBetween('now', '+30 days') , //date plus 30 days
        ];
    }
}
