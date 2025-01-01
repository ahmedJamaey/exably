<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => fake()->name(),
            // 'duration_unit' => fake()->randomElement(['month', 'year']),
            // 'description' => fake()->paragraph(),
            // 'price' => fake()->randomFloat(2, 100, 1000),
            // 'discount_price' => fake()->randomFloat(2, 50, 500), 
            // 'discount_type' => fake()->randomElement(['percentage', 'fixed']),
        ];
    }
}
