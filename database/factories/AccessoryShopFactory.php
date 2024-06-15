<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccessoryShop>
 */
class AccessoryShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'media_id'=> $this->faker->numberBetween(1,30),
            'name'=> $this->faker->name(),
            'address' => $this->faker->unique()->address(),
            'phone_number' =>fake()->numberBetween(+900000000,+999999999),
        ];
    }
}
