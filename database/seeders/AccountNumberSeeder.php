<?php

namespace Database\Seeders;

use \App\Models\AccountNumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $account_numbers = [
            ['account_number' => 1101, 'account_name' => 'Kas'],
            ['account_number' => 1201, 'account_name' => 'Pihutang'],
            ['account_number' => 1301, 'account_name' => 'Perlengkapan'],
            ['account_number' => 1401, 'account_name' => 'Peralatan'],
            ['account_number' => 2101, 'account_name' => 'Hutang'],
            ['account_number' => 3101, 'account_name' => 'Modal'],
            ['account_number' => 4101, 'account_name' => 'Pendapatan Utama'],
            ['account_number' => 4201, 'account_name' => 'Pendapatan Lainnya'],
        ];

        foreach ($account_numbers as $account_number) {
            AccountNumber::create($account_number);
        }
    }
}
