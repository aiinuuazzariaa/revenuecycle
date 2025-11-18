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
            'account_number.view',
            'account_number.viewTrash',
            'account_number.create',
            'account_number.edit',
            'account_number.delete',
            'account_number.restore',
            'account_number.forceDelete',
            'customer.view',
            'customer.viewTrash',
            'customer.create',
            'customer.edit',
            'customer.delete',
            'customer.restore',
            'customer.forceDelete',
            'income.view',
            'income.viewTrash',
            'income.create',
            'income.edit',
            'income.delete',
            'income.restore',
            'income.forceDelete',
            'pihutang.view',
            'pihutang.viewTrash',
            'pihutang.create',
            'pihutang.edit',
            'pihutang.delete',
            'pihutang.restore',
            'pihutang.forceDelete',
            'product.view',
            'product.viewTrash',
            'product.create',
            'product.edit',
            'product.delete',
            'product.restore',
            'product.forceDelete',
            'jurnal.view',
            'jurnal.viewTrash',
            'jurnal.create',
            'jurnal.edit',
            'jurnal.delete',
            'jurnal.restore',
            'jurnal.forceDelete',
            'buku_besar.view',
            'buku_besar.viewTrash',
            'buku_besar.create',
            'buku_besar.edit',
            'buku_besar.delete',
            'buku_besar.restore',
            'buku_besar.forceDelete',
        ];

        foreach ($permissions as $key => $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
