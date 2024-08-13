<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodShop>
 */
class FoodShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->name(),
            'address' => $this->faker->unique()->address(),
            'phone_number' =>fake()->numberBetween(+900000000,+999999999),
            'media_id'=>$this->faker->unique()->numberBetween(1,300),
        ];
    }
}
