<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'food_category_id' => $this->faker->numberBetween(1,4),
            'name' => $this->faker->unique()->word(),
            'media_id'=>$this->faker->unique()->numberBetween(1,300),
            'price'=>$this->faker->numberBetween(1,100),
            'description'=>$this->faker->sentence(10),
        ];
    }
}
