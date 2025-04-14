<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserAutomationShortcut extends Model
{
    protected $table = 'user_automation_shortcuts';

    protected $fillable = [
        'id',
        'order',
        'user_automation_id',
        'shortcut_id',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $casts = [
        'id' => 'string',
        'user_id' => 'string',
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
    public function shortcut()
    {
        return $this->belongsTo(Shortcut::class);
    }
    public function userAutomation()
    {
        return $this->belongsTo(UserAutomation::class);
    }
}
