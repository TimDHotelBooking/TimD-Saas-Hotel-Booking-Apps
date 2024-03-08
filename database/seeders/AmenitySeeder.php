<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Amenity::create([
            'amenity_name' => 'Pet Friendly'           
        ]);
        Amenity::create([
            'amenity_name' => 'Sleep'           
        ]);
        Amenity::create([
            'amenity_name' => 'Swimming pool'           
        ]);
        Amenity::create([
            'amenity_name' => 'Hot Tub'           
        ]);
        Amenity::create([
            'amenity_name' => 'Continual Breakfast'           
        ]);
        Amenity::create([
            'amenity_name' => 'Toiletries'           
        ]);
        Amenity::create([
            'amenity_name' => 'Bar'           
        ]);
        Amenity::create([
            'amenity_name' => 'Parking'           
        ]);
        Amenity::create([
            'amenity_name' => 'Restaurant'           
        ]);
        Amenity::create([
            'amenity_name' => 'Room Service'           
        ]);
        Amenity::create([
            'amenity_name' => '4-Hour Desk Service'           
        ]);
        Amenity::create([
            'amenity_name' => 'Fitness Center'           
        ]);
        Amenity::create([
            'amenity_name' => 'Non-Smoking Room'           
        ]);
        Amenity::create([
            'amenity_name' => 'Airport Shuttle'           
        ]);
        Amenity::create([
            'amenity_name' => 'Family Room'           
        ]);
        Amenity::create([
            'amenity_name' => 'Spa'           
        ]);
        Amenity::create([
            'amenity_name' => 'Free Wi-Fi'           
        ]);
        Amenity::create([
            'amenity_name' => 'Electric Vehicle Charge Center'           
        ]);
        Amenity::create([
            'amenity_name' => 'Coffee and Tea Kit'           
        ]);

    }
}
