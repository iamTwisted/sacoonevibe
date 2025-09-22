<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staffRole = Role::firstOrCreate(['name' => 'Staff']);

        $permissions = [
            'view-members',
            'create-members',
            'edit-members',
            'delete-members',
            'view-transactions',
            'create-transactions',
            'edit-transactions',
            'delete-transactions',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $staffRole->syncPermissions($permissions);

        $staffUser = User::firstOrCreate(
            ['email' => 'staff@sacco.com'],
            [
                'name' => 'Staff User',
                'password' => bcrypt('password'),
            ]
        );

        $staffUser->assignRole($staffRole);
    }
}
