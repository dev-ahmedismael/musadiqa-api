<?php

namespace Database\Seeders;

use App\Models\Tenant\Accounting\BankAccounts\BankAccount;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class BankAccountSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $bank_accounts = [
            [
                'name' => [
                    'ar' => 'الحساب البنكي',
                    'en' => 'Bank Account',
                ],
                'type' => 'BANK_ACCOUNT',
                'currency' => 'SAR',
            ],
            [
                'name' => [
                    'ar' => 'المصروفات النثرية',
                    'en' => 'Petty Cash',
                ],
                'type' => 'PETTY_CASH',
                'currency' => 'SAR',
            ],
            [
                'name' => [
                    'ar' => 'الخزينة',
                    'en' => 'Undeposited Funds',
                ],
                'type' => 'PETTY_CASH',
                'currency' => 'SAR',
            ],
        ];

        DB::table('bank_accounts')->insert($bank_accounts);

    }
}
