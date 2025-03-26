<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};

class Action extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'category_id',
    ];

    protected $casts = [
        'form' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function userActions(): HasMany
    {
        return $this->hasMany(UserAction::class);
    }
}
