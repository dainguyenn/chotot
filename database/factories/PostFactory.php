<?php

namespace Database\Factories;

use App\Models\Category;
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
            'title' => fake()->title(),
            'description' => fake()->text(),
            'status' => 'Đã sử dụng',
            'price' => fake()->randomDigit() * 1000,
            'address' => fake()->address(),
            'category_id' => fake()->randomElement(Category::pluck('id')),
            'user_id' => fake()->randomElement(User::pluck('id'))
        ];
    }
}
