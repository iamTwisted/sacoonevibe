<?php

namespace Database\Seeders;

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
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Create permissions if they don't exist
        Permission::firstOrCreate(['name' => 'members.view']);
        Permission::firstOrCreate(['name' => 'members.create']);
        Permission::firstOrCreate(['name' => 'members.approve']);
        Permission::firstOrCreate(['name' => 'members.update']);

        // Create roles and assign existing permissions
        $tellerRole = Role::firstOrCreate(['name' => 'teller']);
        $tellerRole->syncPermissions('members.create');

        $managerRole = Role::firstOrCreate(['name' => 'branch_manager']);
        $managerRole->syncPermissions('members.approve');

        // Create the admin role
        Role::firstOrCreate(['name' => 'admin']);
    }
}
