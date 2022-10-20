<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id','property_id'];

    
    // public function user()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    // public function property()
    // {
    //     return $this->belongsToMany(Property::class);
    // }

}
