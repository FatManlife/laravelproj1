<?php

namespace Database\Factories;

use App\Models\Post;
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

    protected $model = Post::class;
    public function definition(): array
    {
        return [
            "title" => fake()->text(50),
            "description" => fake()->paragraph(100),
            "price" => fake()->randomFloat(2, 1, 100),
            "views" => fake()->numberBetween(1, 1000)
        ];
    }
}
