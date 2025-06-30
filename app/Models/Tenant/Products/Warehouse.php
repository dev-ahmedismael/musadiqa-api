<?php

namespace App\Models\Tenant\Products;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'building_number',
        'street',
        'district',
        'city',
        'postal_code',
    ];
}
