<?php

namespace Database\Seeders;

use App\Models\Tenant\Accountants\TaxRate;
use Illuminate\Database\Seeder;

class TaxRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tax_rates = [
            [
                'name_ar' => 'مشتريات بنسبة صفر',
                'name_en' => 'Zero-rated Purchases',
                'tax_type' => 'OUT_OF_SCOPE',
                'tax_rate' => 0,
                'description' => 'خارج نطاق الضريبة',
                'is_system' => true,
            ],
            [
                'name_ar' => 'إحتساب عكسي',
                'name_en' => 'Reverse Charge',
                'tax_type' => 'REVERSE_CHARGE',
                'tax_rate' => 15,
                'description' => 'ضريبة القيمة المضافة بنظام الاحتساب العكسي في السعودية',
                'is_system' => true,
            ],
            [
                'name_ar' => 'مشتريات معفاة من الضربية',
                'name_en' => 'Exempt Purchases',
                'tax_type' => 'PURCHASES',
                'tax_rate' => 0,
                'description' => 'مشتريات معفاة من ضريبة القيمة المضافة في السعودية',
                'is_system' => true,
            ],
            [
                'name_ar' => 'مشتريات بنسبة صفر',
                'name_en' => 'Zero-rated Purchases',
                'tax_type' => 'PURCHASES',
                'tax_rate' => 0,
                'description' => 'مشتريات خاضعة للضريبة بنسبة صفر في السعودية',
                'is_system' => true,
            ],
            [
                'name_ar' => 'ضريبة القيمة المضافة في الجمارك',
                'name_en' => 'VAT at Customs',
                'tax_type' => 'PURCHASES',
                'tax_rate' => 15,
                'description' => 'ضريبة القيمة المضافة بنسبة 15% المدفوعة عند الجمارك في السعودية',
                'is_system' => true,
            ],
            [
                'name_ar' => 'ضريبة القيمة المضافة على مشتريات',
                'name_en' => 'VAT on Purchases',
                'tax_type' => 'PURCHASES',
                'tax_rate' => 15,
                'description' => 'ضريبة القيمة المضافة القياسية على المشتريات في السعودية',
                'is_system' => true,
            ],
            [
                'name_ar' => 'معفى',
                'name_en' => 'Exempt',
                'tax_type' => 'SALES',
                'tax_rate' => 0,
                'description' => 'ضريبة القيمة المضافة المعفاة على المبيعات في السعودية',
                'is_system' => true,
            ],
            [
                'name_ar' => 'صادرات',
                'name_en' => 'Zero-Rated Exports',
                'tax_type' => 'SALES',
                'tax_rate' => 0,
                'description' => 'صادرات خاضعة لضريبة بنسبة صفر في السعودية',
                'is_system' => true,
            ],
            [
                'name_ar' => 'توريدات داخل المملكة خاضعة للضريبة بنسبة صفر',
                'name_en' => 'Zero-Rated Domestic Sales',
                'tax_type' => 'SALES',
                'tax_rate' => 0,
                'description' => 'توريدات محلية خاضعة لضريبة بنسبة صفر في السعودية',
                'is_system' => true,
            ],
            [
                'name_ar' => 'ضريبة القيمة المضافة على الإيرادات',
                'name_en' => 'VAT on Sales',
                'tax_type' => 'SALES',
                'tax_rate' => 15,
                'description' => 'ضريبة القيمة المضافة القياسية على المبيعات في السعودية',
                'is_system' => true,
            ],
        ];


        foreach ($tax_rates as $tax_rate) {
            TaxRate::create($tax_rate);
        }
    }
}
