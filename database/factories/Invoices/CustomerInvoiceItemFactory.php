<?php

namespace Database\Factories\Invoices;

use App\Models\Invoices\CustomerInvoiceItem;
use App\Models\Services\PrintService;
use App\Traits\Testing\DefaultValuesTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
use Resend\Service\Service;

/**
 * @extends Factory<CustomerInvoiceItem>
 */
class CustomerInvoiceItemFactory extends Factory
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
            'invoice_id' => '',
            'service_id' => $this->faker->randomElement(PrintService::pluck('service_id')->toArray()),
            'quantity' => $this->faker->randomNumber(2),
            'unit_cost' => $this->faker->randomFloat(2, 1, 99),
        ];
    }
}
