<?php

namespace Database\Factories;

use App\Models\EventType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
            return [
            // 'user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'user_id' => User::inRandomOrder()->first()->id,
            'event_type_id' => EventType::inRandomOrder()->firstOr()->id,
            'sub_room_id' => $this->faker->numberBetween(1,10),
            'description' => $this->faker->paragraph,
            'event_time' => $this->faker->dateTime(),
            'num_of_guests' => $this->faker->numberBetween(5,500),
            'is_private'=> $this->faker->boolean(1),
        ];
    }
}
