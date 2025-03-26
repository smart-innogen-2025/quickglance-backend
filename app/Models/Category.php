<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name', 'icon', 'bgImage'];

    protected $hidden = ['created_at', 'updated_at'];

    public function actions(): HasMany{
        return $this->hasMany(Action::class);
    }
}
