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
            'media_id'=>1,
            'place_room_type_id' => $this->faker->numberBetween(1,9),
            'capacity' => 10*$this->faker->numberBetween(7,20),
            'cost' => 100*$this->faker->numberBetween(20,40),
        ];
    }
}
