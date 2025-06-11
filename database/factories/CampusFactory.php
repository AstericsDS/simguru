<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campus>
 */
class CampusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            // 'admin_id' => User::factory(),
            'address' => fake()->address(),
            'description' => fake()->paragraph(),
            'images_path' => fake()->image(null, 640, 480),
            'role' => fake()->boolean()
        ];
    }
}
