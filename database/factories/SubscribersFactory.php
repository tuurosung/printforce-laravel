<?php

namespace Database\Factories;

use App\Models\Subscribers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subscribers>
 */
class SubscribersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }


    public function existing(): static
    {
        return $this->state(function (array $attributes) {
            $attributes["subscriber_id"] = 187635294;
            return $attributes;
        });
    }
}
