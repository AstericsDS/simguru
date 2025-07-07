<?php

namespace Database\Seeders;

use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Room;
use App\Models\User;
use App\Models\Campus;
use App\Models\Building;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Campus::factory()->count(5)->create();

        // Create Roles
        Role::create([
            'role' => 'super_admin'
        ]);

        Role::create([
            'role' => 'admin'
        ]);

        User::create([
            'role' => 1,
            'name' => 'Super Admin',
            'password' => Hash::make('0001')
        ]);

        User::create([
            'role' => 2,
            'name' => 'Admin',
            'password' => Hash::make('0000')
        ]);

        // Campus::factory()->count(1)->has(Building::factory()->count(2)->has(Room::factory()->count(3)))->create();
        Campus::factory()->count(1)->has(Building::factory()->count(2))->create();
        // Campus::factory()
        //     ->count(1)
        //     ->has(
        //         Building::factory()
        //             ->count(2)
        //             ->has(
        //                 Room::factory()->count(3)
        //             )
        //     )
        //     ->create();

        // Campus::factory()->count(1)->has(Building::factory()->count(2))->create();

        // Campus::factory()
        //     ->count(1)
        //     ->has(Building::factory()->count(7))
        //     ->create();
        // Campus::factory()
        //     ->count(1)
        //     ->has(Building::factory()->count(4))
        //     ->create();
        // Campus::factory()
        //     ->count(1)
        //     ->has(Building::factory()->count(11))
        //     ->create();
        // Campus::factory()
        //     ->count(1)
        //     ->has(Building::factory()->count(9))
        //     ->create();
    }
}
