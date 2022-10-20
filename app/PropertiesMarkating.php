<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertiesMarkating extends Model
{
    protected $fillable = ['name','phone','type','city','rooms','baths','price','details'];

}
