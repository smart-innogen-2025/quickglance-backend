<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};

class Shortcut extends Model
{
    protected $fillable = ['user_id', 'name', 'icon', 'description', 'gradient_start', 'gradient_end'];

    protected $hidden = ['created_at', 'updated_at', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function steps(): HasMany
    {
        return $this->hasMany(UserAction::class);
    }
}
