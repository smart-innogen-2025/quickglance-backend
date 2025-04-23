<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Relations\{HasMany};

class Service extends Model
{
    protected $fillable = ['name', 'description', 'website_link', 'image_key'];

    protected $hidden = ['created_at', 'updated_at'];

    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $casts = [
        'id' => 'string',

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

    public function shortcuts(): HasMany
    {
        return $this->hasMany(Shortcut::class);
    }

    
}
