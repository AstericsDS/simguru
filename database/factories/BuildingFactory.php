<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Campus;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Building>
 */
class BuildingFactory extends Factory
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
            'admin_id' => User::inRandomOrder()->value('id'),
            'campus_id' => Campus::inRandomOrder()->value('id'),
            'name' => $name,
            'slug' => $slug,
            'building_area' => fake()->randomNumber(3, false),
            'land_area' => fake()->randomNumber(3, false),
            'floor' => fake()->numberBetween(1, 10),
            'description' => fake()->paragraph(5),
            'address' => fake()->address(),
        ];
    }
}
