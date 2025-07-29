<?php

namespace Database\Factories;

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
        return [
            'name' => $this->faker->name,
            'floor' => $this->faker->numberBetween(1, 10),
            'capacity' => $this->faker->numberBetween(10,40),
            'description' => $this->faker->sentence(),
            'status' => 'class'
        ];
    }
}
