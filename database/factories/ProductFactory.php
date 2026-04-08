<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => rand(1, 8),
            'title' => fake()->sentence(mt_rand(1,4)),
            'slug' => fn(array $attributes) => Str::slug($attributes['title']).'-'.fake()->unique()->numberBetween(1,1000),
            'description' => fake()->paragraph(mt_rand(4,8)),
            'price' => rand(100, 10000),
            'old_price' => rand(0, 10000),
            'stars' => rand(0, 5),
            'view' => rand(0, 100),
            'hit' => fake()->boolean(70),
            'new' => fake()->boolean(70),
            'sale' => fake()->boolean(70),
        ];
    }
}
