<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['name', 'amount'];

    public function boisson() {
        return $this->belongsToMany('App\Boisson', 'recipes')
            ->withPivot('amount')
            ->withTimestamps();
    }
}
