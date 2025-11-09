<?php

namespace Database\Seeders;

use Database\Seeders\PermissionsSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AccountNumberSeeder;
use Database\Seeders\ProductSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionsSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            AccountNumberSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
