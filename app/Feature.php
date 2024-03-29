<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['name','icon','slug'];

    
    public function properties()
    {
        return $this->belongsToMany(Property::class)->withTimestamps();
    }
}
