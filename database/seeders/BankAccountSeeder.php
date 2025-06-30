<?php

namespace Database\Seeders;

use App\Models\Tenant\BankAccounts\BankAccount;
use Illuminate\Database\Seeder;

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
                'name_ar' => 'الحساب البنكي',
                'name_en' => 'Bank Account',
                'type' => 'BANK_ACCOUNT',
                'currency' => 'SAR'
            ],
            [
                'name_ar' => 'المصروفات النثرية',
                'name_en' => 'Petty Cash',
                'type' => 'PETTY_CASH',
                'currency' => 'SAR'
            ],
            [
                'name_ar' => 'الخزينة',
                'name_en' => 'Undeposited Funds',
                'type' => 'PETTY_CASH',
                'currency' => 'SAR'
            ],
        ];

        foreach ($bank_accounts as $bank_account) {
            BankAccount::create($bank_account);
        }
    }
}
