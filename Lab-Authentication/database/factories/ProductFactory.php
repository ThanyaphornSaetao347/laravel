<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'prod_id' => fake()->unique()->regexify('[0-9][a-z]{5}'),
            'prod_name' => fake()->name,
            'detials' => fake()->sentence,
            'price' => fake()->randomFloat(2, 500, 1000),
            'stock' => fake()->numberBetween(0,100)
        ];
    }
}
