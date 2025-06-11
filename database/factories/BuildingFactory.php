<?php

namespace Database\Factories;

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
        return [
            'name' => $this->faker->word(),
            'floor' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->paragraph(5),
            'images_path' => $this->faker->word(),
            'status' => $this->faker->boolean(),
        ];
    }
}
