<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    //
    public function places()
    {
        return $this->belongsToMany(Place::class)->withPivot(['ordinal']);
    }

    public function journeys(){
        return $this->hasMany('App\Journey');
    }
}
