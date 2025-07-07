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
            'admin_id' => 2,
            'address' => fake()->address(),
            'contact' => fake()->randomNumber(5, true),
            'email' => fake()->email(),
            'description' => fake()->paragraph(),
            'images_path' => null,
        ];
    }
}
