<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = Users::where('name','Super Admin')->first();
        if (empty($user)){
            $user = Users::create([
                'name' => 'Super Admin',
                'email' => 'super.admin@gmail.com',
                'password' => Hash::make("super@admin"),
                'status' => 1,
            ]);
        }
        $role = Role::where('name','Super Admin')->first();
        if (!empty($role)){
            $user->assignRole($role);
        }
    }
}
