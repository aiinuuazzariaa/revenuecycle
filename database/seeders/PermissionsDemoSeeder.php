<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit admin']);
        Permission::create(['name' => 'delete admin']);
        Permission::create(['name' => 'publish cashier']);
        Permission::create(['name' => 'unpublish cashier']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('edit admin');
        $role1->givePermissionTo('delete admin');

        $role2 = Role::create(['name' => 'cashier']);
        $role2->givePermissionTo('publish cashier');
        $role2->givePermissionTo('unpublish cashier');

        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Cashier',
            'email' => 'cashier@email.com',
        ]);
        $user->assignRole($role2);

    }
}
