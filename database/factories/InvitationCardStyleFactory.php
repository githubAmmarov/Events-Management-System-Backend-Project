<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvitationCardStyle>
 */
class InvitationCardStyleFactory extends Factory
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
            'media_id'=>$this->faker->unique()->numberBetween(1,300),
            'style'=>$this->faker->unique()->word(),
        ];
    }
}
