<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['name', 'amount'];

    public function recipes() {
        return $this->hasMany('App\Recipe');
    }

    public function boisson() {
        return $this->belongsToMany('App\Boisson', 'recipes')
            ->withPivot('id', 'amount');
    }
}
