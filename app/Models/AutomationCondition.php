<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutomationCondition extends Model
{
    protected $fillable = [
        'icon',
        'name',
        'description',
        'type',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function userAutomations()
    {
        return $this->hasMany(UserAutomation::class);
    }
}
