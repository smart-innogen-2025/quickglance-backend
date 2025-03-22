<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'icon', 'bgImage'];

    protected $hidden = ['created_at', 'updated_at'];

    public function actions(){
        return $this->hasMany(Action::class);
    }
}
