<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $cashierRole = Role::create(['name' => 'cashier']);

        $viewAnyAccountNumberPermission = Permission::create(['name' => 'viewAny account number']);
        $viewAccountNumberPermission = Permission::create(['name' => 'view account number']);
        $createAccountNumberPermission = Permission::create(['name' => 'create account number']);
        $updateAccountNumberPermission = Permission::create(['name' => 'update account number']);
        $restoreAccountNumberPermission = Permission::create(['name' => 'restore account number']);
        $deleteAccountNumberPermission = Permission::create(['name' => 'delete account number']);
        $forceDeleteAccountNumberPermission = Permission::create(['name' => 'forceDelete account number']);

        $adminRole->givePermissionTo($viewAnyAccountNumberPermission);
        $adminRole->givePermissionTo($viewAccountNumberPermission);
        $adminRole->givePermissionTo($createAccountNumberPermission);
        $adminRole->givePermissionTo($updateAccountNumberPermission);
        $adminRole->givePermissionTo($restoreAccountNumberPermission);
        $adminRole->givePermissionTo($deleteAccountNumberPermission);
        $adminRole->givePermissionTo($forceDeleteAccountNumberPermission);

        // $s->givePermissionTo($createAccountNumberPermission);
        // $s->givePermissionTo($updateAccountNumberPermission);

        // $user = User::find(1);
        // $role = Role::findByName('admin');
        // $user->assignRole($role);
    }
}
