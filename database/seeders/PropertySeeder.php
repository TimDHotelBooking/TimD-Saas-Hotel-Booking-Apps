<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'property_admin_id' => 2,
                'property_name' => 'test property',
                'location' => 'kolkata',
                'contact_information' => '9038146392',
                'photo' => 'properties/property.png',
                'status' => 1,
            ],
        ];

        foreach($datas as $data)
        {
            Property::create($data);
        }
    }
}
