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

        $amenities = [
            'Pet Friendly',
            'Sleep',
            'Swimming pool',
            'Hot Tub',
            'Continual Breakfast',
            'Toiletries',
            'Bar',
            'Parking',
            'Restaurant',
            'Room Service',
            '4-Hour Desk Service',
            'Fitness Center',
            'Non-Smoking Room',
            'Airport Shuttle',
            'Family Room',
            'Spa',
            'Free Wi-Fi',
            'Electric Vehicle Charge Center',
            'Coffee and Tea Kit'
        ];

        if(!empty($amenities)){
            foreach ($amenities as $amenity){
                $is_exists = Amenity::where('amenity_name',$amenity)->count();
                if ($is_exists == 0){
                    Amenity::create([
                        "amenity_name" => $amenity
                    ]);
                }
            }
        }
    }
}
