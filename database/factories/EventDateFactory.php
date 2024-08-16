<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventDate>
 */
class EventDateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $startDate = Carbon::now();
        $startDate = "2022-05-31";
        $endDate = Carbon::create(2027,1,1);
        return [
            'event_id'=>fake()->unique()->numberBetween(1,500),
            'event_date'=>$this->faker->dateTimeBetween($startDate,$endDate)
        ];
    }
}
