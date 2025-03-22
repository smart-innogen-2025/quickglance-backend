<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'category_id',
    ];

    protected $casts = [
        'form' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function userActions()
    {
        return $this->hasMany(UserAction::class);
    }
}
