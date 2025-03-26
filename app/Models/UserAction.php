<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAction extends Model
{
    protected $fillable = ['order', 'user_id', 'action_id', 'shortcut_id', 'form'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'user_id',
        'action_id',
        'shortcut_id',
    ];

    protected $casts = [
        'form' => 'array',
    ];

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
