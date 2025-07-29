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
            'admin_id' => 2,
            'floor' => $this->faker->numberBetween(1, 10),
            'area' => $this->faker->numberBetween(20000, 30000),
            'address' => $this->faker->address(),
            'description' => $this->faker->paragraph(5),
            'images_path' => $this->faker->word(),
            'status' => $this->faker->boolean(),
        ];
    }
}
