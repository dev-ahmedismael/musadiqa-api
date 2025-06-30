<?php

    namespace App\Models\Tenant\Address;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\MorphTo;

    class Address extends Model
    {
        protected $fillable = [
            'building_number',
            'street',
            'district',
            'city',
            'country',
            'postal_code',
        ];

        public function addressable(): MorphTo
        {
            return $this->morphTo();
        }
    }
