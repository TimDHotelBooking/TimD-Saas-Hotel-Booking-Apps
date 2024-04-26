<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abilities = [
            'create',
            'view',
            'edit',
            'delete',
        ];

        $insert_permissions = [
            'property',
            'room',
            'tariff',
            'type',
            'customer',
            'property agent',
            'user',
            'role',
            'permission',
            'booking',
            'payment',
            'notification',
            'offer',
        ];

        $permissions_by_role = [
            'Super Admin' => [
                'property',
                'user',
                'role',
                'permission',
            ],
            'Property Admin' => [
                'room',
                'tariff',
                'property agent',
                'user',
                'offer',
                'customer',
                'type'
            ],
            'Property Agent' => [
                'customer',
                'booking',
                'payment'
            ]
        ];

        foreach ($insert_permissions as $permission) {
            foreach ($abilities as $ability) {
                $is_exists = Permission::where('name',$ability . ' ' . $permission)->count();
                if ($is_exists == 0){
                    Permission::create(['name' => $ability . ' ' . $permission]);
                }
            }
        }

        foreach ($permissions_by_role as $role => $permissions) {
            $full_permissions_list = [];
            foreach ($abilities as $ability) {
                foreach ($permissions as $permission) {
                    $full_permissions_list[] = $ability . ' ' . $permission;
                }
            }
            $is_exists = Role::where('name',$role)->first();
            if (empty($is_exists)){
                Role::create(['name' => $role])->syncPermissions($full_permissions_list);
            }else{
                $is_exists->syncPermissions($full_permissions_list);
            }
        }
    }
}
