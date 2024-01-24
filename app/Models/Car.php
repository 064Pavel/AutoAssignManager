<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }
    public function comfort_category(): BelongsTo
    {
        return $this->belongsTo(ComfortCategories::class);
    }
    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }
}
