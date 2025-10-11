<?php

namespace Database\Seeders;

use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Event;
use App\Models\Room;
use App\Models\User;
use App\Models\Campus;
use App\Models\Building;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

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

        // User::create([
        //     'role' => 2,
        //     'name' => 'Admin',
        //     'password' => Hash::make('0000')
        // ]);

        // Campus::create([
        //     'admin_id' => 2,
        //     'name' => 'Rawamangun',
        //     'slug' => 'rawamangun',
        //     'address' => 'Jl. R.Mangun Muka Raya No.11, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220',
        //     'contact' => '0214898486',
        //     'email' => 'unj@gmail.com',
        //     'description' => Faker::create()->sentence()
        // ]);

        // Building::create([
        //     'admin_id' => 2,
        //     'campus_id' => 1,
        //     'name' => 'Gedung Dewi Sartika',
        //     'slug' => 'gedung-dewi-sartika',
        //     'area' => '500',
        //     'floor' => '10',
        //     'address' => 'Jl. Daksinapati Tim. Blok Daksenapati Timur No.1, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220',
        //     // 'status' => 0,
        //     'description' => Faker::create()->sentence(),
        // ]);

        // Building::create([
        //     'admin_id' => 2,
        //     'campus_id' => 1,
        //     'name' => 'Gedung Raden Ajeng Kartini',
        //     'slug' => 'gedung-raden-ajeng-kartini',
        //     'area' => '500',
        //     'floor' => '8',
        //     'address' => 'Kampus A UNJ, Jl. R.Mangun Muka Raya No.11, RT.11/RW.14, Rawamangun, Pulo Gadung, East Jakarta City, Jakarta 13220',
        //     // 'status' => 0,
        //     'description' => Faker::create()->sentence(),
        // ]);

        // Room::create([
        //     'admin_id' => 2,
        //     'campus_id' => 1,
        //     'building_id' => 1,
        //     'name' => 'R514',
        //     'slug' => 'R514',
        //     'floor' => '5',
        //     'capacity' => '100',
        //     'description' => Faker::create()->sentence(),
        //     'category' => 'class',
        //     'area' => '500'
        // ]);

        // Room::create([
        //     'admin_id' => 2,
        //     'campus_id' => 1,
        //     'building_id' => 1,
        //     'name' => 'R515',
        //     'slug' => 'R515',
        //     'floor' => '5',
        //     'capacity' => '100',
        //     'description' => Faker::create()->sentence(),
        //     'category' => 'class',
        //     'area' => '300'
        // ]);

        // Event::create([
        //     'room_id' => 1,
        //     'event_name' => 'Mata Kuliah Terbuang Dalam Waktu',
        //     'start' => '2025-09-18T13:00:00',
        //     'end' => '2025-09-18T14:30:00'
        // ]);

        // Event::create([
        //     'room_id' => 1,
        //     'event_name' => 'Mata Kuliah Terbuang Dalam Waktu',
        //     'start' => '2025-09-20T13:00:00',
        //     'end' => '2025-09-20T14:30:00'
        // ]);

        // Event::create([
        //     'room_id' => 2,
        //     'event_name' => 'Mata Kuliah Terbuang Dalam Waktu',
        //     'start' => '2025-09-18T10:00:00',
        //     'end' => '2025-09-18T12:30:00'
        // ]);

        // Event::create([
        //     'room_id' => 2,
        //     'event_name' => 'Mata Kuliah Terbuang Dalam Waktu',
        //     'start' => '2025-09-20T10:00:00',
        //     'end' => '2025-09-20T13:30:00'
        // ]);

        // Campus::factory()->count(1)->has(Building::factory()->count(2)->has(Room::factory()->count(3)))->create();
        // Campus::factory()->count(1)->has(Building::factory()->count(2))->create();
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
