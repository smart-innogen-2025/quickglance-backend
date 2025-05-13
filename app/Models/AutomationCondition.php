<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AutomationCondition extends Model
{
    protected $fillable = [
        'emoji',
        'name',
        'description',
        'type',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

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

    public function userAutomations()
    {
        return $this->hasMany(UserAutomation::class);
    }
}
