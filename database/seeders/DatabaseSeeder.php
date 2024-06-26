<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Users::factory(10)->create();

        // \App\Models\Users::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
           
            RolesPermissionsSeeder::class,
            CreateUserSeeder::class,           
            AppinfoSeeder::class,
            AmenitySeeder::class,
            PropertySeeder::class,
        ]);
    }
}
