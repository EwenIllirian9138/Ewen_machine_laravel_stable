<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function boisson()
    {
        return $this->belongsTo('App\Boisson');
    }
}
