<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'created_at',
        'updated_at',
    ];

    public function automationCondition(): BelongsTo
    {
        return $this->belongsTo(AutomationCondition::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
