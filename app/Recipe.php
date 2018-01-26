<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Recipe extends Pivot
{
    protected $table = 'recipes';

    protected $fillable = ['boisson_id', 'ingredient_id', 'amount'];

    public function boisson() {
        return $this->belongsTo('App\Boisson');
    }

    public function ingredient() {
        return $this->belongsTo('App\Ingredient');

    }
}
