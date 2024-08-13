<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Accessory>
 */
class AccessoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'media_id'=>$this->faker->unique()->numberBetween(1,300),
            'accessory_type_id' => $this->faker->numberBetween(1,7),
            'name' => $this->faker->unique()->word(),
            'price'=>$this->faker->numberBetween(1,200),
        ];
    }
}
