<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};

class Action extends Model
{
    protected $fillable = [
        'mobile_key',
        'name',
        'icon',
        'android_icon',
        'gradient_start',
        'gradient_end',
        'category_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $casts = [
        'id' => 'string',
        'category_id' => 'string',
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function userActions(): HasMany
    {
        return $this->hasMany(UserAction::class);
    }
}
