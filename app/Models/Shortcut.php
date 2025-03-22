<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shortcut extends Model
{
    protected $fillable = ['user_id', 'name', 'icon', 'description', 'user_action_id'];

    protected $hidden = ['created_at', 'updated_at', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userAction()
    {
        return $this->hasMany(UserAction::class);
    }
}
