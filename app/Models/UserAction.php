<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function action()
    {
        return $this->belongsTo(Action::class);
    }
    
    public function shortcut()
    {
        return $this->belongsTo(Shortcut::class);
    }
}
