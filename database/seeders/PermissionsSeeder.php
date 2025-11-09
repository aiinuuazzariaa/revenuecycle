<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'permission.view',
            'permission.create',
            'permission.edit',
            'permission.delete',
            'role.view',
            'role.create',
            'role.edit',
            'role.delete',
            'user.view',
            'user.viewTrash',
            'user.create',
            'user.edit',
            'user.delete',
            'user.restore',
            'user.forceDelete',
        ];

        foreach ($permissions as $key => $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
