<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        // Permission::create(['name' => 'manage users']);
        // Permission::create(['name' => 'view users']);
        $permissions = [
            'view users',
            'create users',
            'edit users',
            'delete users',
            'view courses',
            'create courses',
            'edit courses',
            'delete courses',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        // $managerRole = Role::create(['name' => 'manager']);
        // $managerRole->givePermissionTo(['manage users', 'view users']);

        // $userRole = Role::create(['name' => 'regular user']);
        // $userRole->givePermissionTo('view users'); // Regular users can only view users
        $roles = [
            'admin'   => ['view users', 'create users', 'edit users', 'delete users', 'view courses', 'create courses', 'edit courses', 'delete courses'],
            'manager' => ['view users', 'edit users', 'view courses', 'create courses', 'edit courses'],
            'editor'  => ['view users', 'edit users', 'view courses', 'edit courses'],
            'user'  => ['view users', 'view courses'],
        ];
        foreach ($roles as $role => $permissions) {
            $roleInstance = Role::create(['name' => $role]);

            foreach ($permissions as $permission) {
                $roleInstance->givePermissionTo($permission);
            }
        }
    }
}
