<?php

namespace Database\Seeders;

use App\Models\AppInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppinfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppInfo::create([
            'title' => 'Hotel',
            'description' => 'Hotel Description',
            'version' => '1.0',
            'logo' => '',
            'dark_logo' => '',
            'fav_icon' => '',

           
        ]);
    }
}
