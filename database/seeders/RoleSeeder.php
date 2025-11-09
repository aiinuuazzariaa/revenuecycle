<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allPermission = Permission::all();

        $role = Role::create([
            'name' => "superadmin"
        ]);

        $role->syncPermissions($allPermission);
    }
}
