<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boisson extends Model
{
    protected $fillable = ['name', 'price'];

    public function sales() {
        return $this->hasMany('App\Sale');
    }

    public function ingredients() {
        return $this->belongsToMany('App\Ingredient', 'recipes')
            ->withPivot('amount')
            ->withTimestamps();
    }
}
