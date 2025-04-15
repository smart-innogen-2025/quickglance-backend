<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};

class Shortcut extends Model
{
    protected $fillable = ['user_id', 'service_id', 'name', 'icon', 'description', 'gradient_start', 'gradient_end'];

    protected $hidden = ['created_at', 'updated_at', 'user_id'];

    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $casts = [
        'id' => 'string',
        'user_id' => 'string',
        'service_id' => 'string',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = $model->id ?: Str::orderedUuid()->toString();
            }
        });
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function userAction(): HasMany
    {
        return $this->hasMany(UserAction::class);
    }

    public function userAutomationShortcut(): HasMany
    {
        return $this->hasMany(UserAutomationShortcut::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
