<?php

namespace Database\Seeders;

use App\Models\Campus;
use App\Models\Building;
use App\Models\Room;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class CampusEntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure there are users to assign as admins
        if (User::count() === 0) {
            User::factory()->count(10)->create();
        }

        // 1. Create 4 Campuses
        $this->command->info('Creating 4 campuses...');
        $campuses = Campus::factory()->count(4)->create();

        // 2. Create 30 Buildings distributed across campuses
        $this->command->info('Creating 30 buildings...');
        $buildings = Building::factory()->count(30)->make()->each(function ($building) use ($campuses) {
            $campus = $campuses->random();
            $building->campus_id = $campus->id;
            $building->save();
        });

        // 3. Create 50 Rooms distributed across buildings
        $this->command->info('Creating 50 rooms...');
        $rooms = Room::factory()->count(50)->make()->each(function ($room) use ($buildings) {
            $building = $buildings->random();
            $room->building_id = $building->id;
            $room->campus_id = $building->campus_id;
            $room->save();
        });

        // 4. Create 20 Events distributed across rooms
        $this->command->info('Creating 20 events...');
        Event::factory()->count(20)->make()->each(function ($event) use ($rooms) {
            $room = $rooms->random();
            $event->room_id = $room->id;
            $event->save();
        });

        $this->command->info('Seeding completed successfully!');
    }
}
