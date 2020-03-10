<?php

namespace App;

use App\Property;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }
}
