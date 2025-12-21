<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Campus;
use App\Models\Building;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->sentence;
        $slug = Str::slug($name, '-');
        return [
            'admin_id' => User::inRandomOrder()->value('id'),
            'campus_id' => Campus::inRandomOrder()->value('id'),
            'building_id' => Building::inRandomOrder()->value('id'),
            'name' => $name,
            'slug' => $slug,
            'floor' => fake()->numberBetween(1, 10),
            'length' => fake()->randomNumber(3, false),
            'width' => fake()->randomNumber(3, false),
            'height' => fake()->randomNumber(3, false),
            'capacity' => fake()->numberBetween(10,40),
            'description' => fake()->sentence,
            'category' => fake()->randomElement(['class', 'office', 'laboratory', 'rentable', 'non_rentable']),
        ];
    }
}
