<?php

namespace Database\Seeders;

use App\Models\Tenant\Accounting\Accountants\TaxRate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tax_rates = [
            [
                'name' => [
                    'ar' => 'مشتريات بنسبة صفر',
                    'en' => 'Zero-rated Purchases',
                ],
                'tax_type' => 'OUT_OF_SCOPE',
                'tax_rate' => 0,
                'description' => 'خارج نطاق الضريبة',
                'is_system' => true,
            ],
            [
                'name' => [
                    'ar' => 'إحتساب عكسي',
                    'en' => 'Reverse Charge',
                ],
                'tax_type' => 'REVERSE_CHARGE',
                'tax_rate' => 15,
                'description' => 'ضريبة القيمة المضافة بنظام الاحتساب العكسي في السعودية',
                'is_system' => true,
            ],
            [
                'name' => [
                    'ar' => 'مشتريات معفاة من الضربية',
                    'en' => 'Exempt Purchases',
                ],
                'tax_type' => 'PURCHASES',
                'tax_rate' => 0,
                'description' => 'مشتريات معفاة من ضريبة القيمة المضافة في السعودية',
                'is_system' => true,
            ],
            [
                'name' => [
                    'ar' => 'مشتريات بنسبة صفر',
                    'en' => 'Zero-rated Purchases',
                ],
                'tax_type' => 'PURCHASES',
                'tax_rate' => 0,
                'description' => 'مشتريات خاضعة للضريبة بنسبة صفر في السعودية',
                'is_system' => true,
            ],
            [
                'name' => [
                    'ar' => 'ضريبة القيمة المضافة في الجمارك',
                    'en' => 'VAT at Customs',
                ],
                'tax_type' => 'PURCHASES',
                'tax_rate' => 15,
                'description' => 'ضريبة القيمة المضافة بنسبة 15% المدفوعة عند الجمارك في السعودية',
                'is_system' => true,
            ],
            [
                'name' => [
                    'ar' => 'ضريبة القيمة المضافة على مشتريات',
                    'en' => 'VAT on Purchases',
                ],
                'tax_type' => 'PURCHASES',
                'tax_rate' => 15,
                'description' => 'ضريبة القيمة المضافة القياسية على المشتريات في السعودية',
                'is_system' => true,
            ],
            [
                'name' => [
                    'ar' => 'معفى',
                    'en' => 'Exempt',
                ],
                'tax_type' => 'SALES',
                'tax_rate' => 0,
                'description' => 'ضريبة القيمة المضافة المعفاة على المبيعات في السعودية',
                'is_system' => true,
            ],
            [
                'name' => [
                    'ar' => 'صادرات',
                    'en' => 'Zero-Rated Exports',
                ],
                'tax_type' => 'SALES',
                'tax_rate' => 0,
                'description' => 'صادرات خاضعة لضريبة بنسبة صفر في السعودية',
                'is_system' => true,
            ],
            [
                'name' => [
                    'ar' => 'توريدات داخل المملكة خاضعة للضريبة بنسبة صفر',
                    'en' => 'Zero-Rated Domestic Sales',
                ],
                'tax_type' => 'SALES',
                'tax_rate' => 0,
                'description' => 'توريدات محلية خاضعة لضريبة بنسبة صفر في السعودية',
                'is_system' => true,
            ],
            [
                'name' => [
                    'ar' => 'ضريبة القيمة المضافة على الإيرادات',
                    'en' => 'VAT on Sales',
                ],
                'tax_type' => 'SALES',
                'tax_rate' => 15,
                'description' => 'ضريبة القيمة المضافة القياسية على المبيعات في السعودية',
                'is_system' => true,
            ],
        ];

        DB::table('tax_rates')->insert($tax_rates);
     }
}
