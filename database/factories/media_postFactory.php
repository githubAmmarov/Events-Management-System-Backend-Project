<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\media_post>
 */
class media_postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id'=>$this->faker->numberBetween(1,100),
            'media_id'=>$this->faker->numberBetween(1,300),
        ];
    }
}
