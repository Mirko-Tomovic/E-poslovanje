<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    protected $fillable = ['name'];
    //
    public function places()
    {
        return $this->belongsToMany(Place::class)->withPivot(['ordinal']);
    }

    public function journeys()
    {
        return $this->hasMany('App\Journey');
    }
}
