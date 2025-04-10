<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAction extends Model
{
    protected $fillable = ['order', 'user_id', 'action_id', 'shortcut_id', 'inputs'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'user_id',
        'action_id',
        'shortcut_id',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $casts = [
        'id' => 'string',
        'user_id' => 'string',
        'action_id' => 'string',
        'shortcut_id' => 'string',
        'inputs' => 'array',
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

    public function action(): BelongsTo
    {
        return $this->belongsTo(Action::class);
    }
    
    public function shortcut(): BelongsTo
    {
        return $this->belongsTo(Shortcut::class);
    }
}
