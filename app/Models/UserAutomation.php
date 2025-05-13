<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Relations\{BelongsTo};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAutomation extends Model
{
    protected $fillable = [
        'title',
        'icon',
        'user_id',
        'automation_condition_id',
    ];

    protected $hidden = [
        'automation_condition_id',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $casts = [
        'id' => 'string',
        'user_id' => 'string',
        'automation_condition_id' => 'string',
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

    public function automationCondition(): BelongsTo
    {
        return $this->belongsTo(AutomationCondition::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function userAutomationShortcut()
    {
        return $this->hasMany(UserAutomationShortcut::class);
    }
}
