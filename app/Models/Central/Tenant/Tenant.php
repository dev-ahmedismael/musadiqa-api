<?php

namespace App\Models\Central\Tenant;

use App\Models\Central\User\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;

class Tenant extends BaseTenant implements TenantWithDatabase, HasMedia
{
    use HasDatabase, HasDomains, InteractsWithMedia, HasUuids;

    protected $fillable = [
        'name',
        'industry',
        'employees_count',
        'currency',
        'country',
        'is_vat_registered',
        'phone',
        'email',
        'commercial_number',
        'tax_number',
        'tax_registeration_date',
        'tax_first_due_date',
        'tax_period',
        'fiscal_year_end',
        'building_number',
        'street',
        'district',
        'city',
        'postal_code',
        'data',
    ];


    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'tenants';

    public static function getCustomColumns(): array
    {
        return [
            'id',
            'name',
            'industry',
            'employees_count',
            'currency',
            'country',
            'is_vat_registered',
            'phone',
            'email',
            'commercial_number',
            'tax_number',
            'tax_registeration_date',
            'tax_first_due_date',
            'tax_period',
            'fiscal_year_end',
            'building_number',
            'street',
            'district',
            'city',
            'postal_code',
            'data',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('organization_logo')->singleFile();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('is_owner');
    }
}
