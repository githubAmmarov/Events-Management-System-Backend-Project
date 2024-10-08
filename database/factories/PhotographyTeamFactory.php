<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhotographyTeam>
 */
class PhotographyTeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name,
            'address'=>$this->faker->address,
            'cost'=>$this->faker->numberBetween(10,100),
            'phone_number'=> '09'. $this->faker->numerify('########'),
            'media_id'=> $this->faker->unique()->numberBetween(1,300)
        ];
    }
}
