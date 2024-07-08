<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>$this->faker->numberBetween(1,50),
            'media_id'=>$this->faker->numberBetween(1,30),
            'title'=> $this->faker->title(),
            'description'=>$this->faker->text(300),
            'is_public'=> $this->faker->numberBetween(0,1),
        ];
    }
}
