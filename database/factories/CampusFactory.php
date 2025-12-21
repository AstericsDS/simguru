<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
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
        $name = fake()->sentence();
        $slug = Str::slug($name, '-');
        return [
            'name' => $name,
            'admin_id' => User::inRandomOrder()->first()->id,
            'slug' => $slug,
            'address' => fake()->address(),
            'area_size' => fake()->randomNumber(3, false),
            'contact' => fake()->randomNumber(5, true),
            'description' => fake()->paragraph(),
        ];
    }
}
