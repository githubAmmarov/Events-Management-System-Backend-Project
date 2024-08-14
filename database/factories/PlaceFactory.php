<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
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
            'place_room_type_id' => $this->faker->numberBetween(1,6),
            'media_id'=> $this->faker->unique()->numberBetween(1,300),
            'name' => $this->faker->unique()->word(),
            'phone_number' => fake()->phoneNumber(10),
            'address' => $this->faker->word(),
        ];
    }
}
