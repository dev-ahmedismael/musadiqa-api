<?php

namespace App\Models\Tenant\Accountants;

use Illuminate\Database\Eloquent\Model;

class TaxRate extends Model
{

    protected $fillable = [
        'name_ar',
        'name_en',
        'tax_type',
        'tax_rate',
        'description',
        'is_system'
    ];
}
