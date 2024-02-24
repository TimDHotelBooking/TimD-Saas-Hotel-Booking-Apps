<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create([
           'name' => 'Super Admin',
           'email' => 'super.admin@gmail.com',
           'password' => Hash::make("super@admin"),
           'status' => 1,
        ]);
    }
}
