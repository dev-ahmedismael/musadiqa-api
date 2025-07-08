<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('data/tax_rates.json'));

        $tax_rates = json_decode($json, true);

        DB::table('tax_rates')->insert($tax_rates);
    }
}
