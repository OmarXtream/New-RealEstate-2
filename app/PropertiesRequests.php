<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertiesRequests extends Model
{
    protected $fillable = ['name','phone','type','city','rooms','baths','min_price','max_price','first_district','Second_district','Third_district','Fourth_district','details','notes'];

}
