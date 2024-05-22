<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubRoom>
 */
class SubRoomFactory extends Factory
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
            'place_id' => $this->faker->numberBetween(1,10),
            'place_room_type_id' => $this->faker->numberBetween(1,4),
            'capacity' => $this->faker->numberBetween(70,200),
            'cost' => $this->faker->numberBetween(2000,4000),
        ];
    }
}
