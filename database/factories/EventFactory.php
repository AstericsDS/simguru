<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_id' => Room::inRandomOrder()->value('id'),
            'admin' => User::inRandomOrder()->value('id'),
            'event_name' => fake()->sentence(),
            'reserved_by' => User::inRandomOrder()->value('name'),
            'start' => fake()->date(),
            'end' => fake()->date(),
            'lecturer' => fake()->name(),
            'major' => fake()->word(),
            'description' => fake()->sentence(),
            'day' => fake()->dayOfWeek(),
        ];
    }
}
