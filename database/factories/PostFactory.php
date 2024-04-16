<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use App\Models\User;

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
        $status = [0, 1];

        return [
            'user_id' => User::all()->random()->id,
            'title' => fake()->realText(50),
            'content' => fake()->paragraphs(rand(2,6)),
            'status' => Arr::random($status),
        ];
    }
}
