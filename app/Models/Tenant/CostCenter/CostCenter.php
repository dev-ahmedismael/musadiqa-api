<?php

namespace App\Models\Tenant\CostCenter;

use App\Models\Tenant\Accountants\JournalLineItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CostCenter extends Model
{
    protected $fillable = ['name'];

    public function journal_line_items(): HasMany
    {
        return $this->hasMany(JournalLineItem::class);
    }
}
