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

        $permissions_by_role = [
            'Super Admin' => [],
            'Property Admin' => [],
            'Property Agent' => []
        ];

       /* foreach ($permissions_by_role['admin'] as $permission) {
            foreach ($abilities as $ability) {
                Permission::create(['name' => $ability . ' ' . $permission]);
            }
        }*/

        foreach ($permissions_by_role as $role => $permissions) {
            $full_permissions_list = [];
            foreach ($abilities as $ability) {
                foreach ($permissions as $permission) {
                    $full_permissions_list[] = $ability . ' ' . $permission;
                }
            }
            $is_exists = Role::where('name',$role)->count();
            if ($is_exists == 0){
                Role::create(['name' => $role])->syncPermissions($full_permissions_list);
            }
        }
    }
}
