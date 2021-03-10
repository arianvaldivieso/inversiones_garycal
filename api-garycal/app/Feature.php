<?php

namespace App;

use App\Property;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{	
	protected $fillable = [
		'name',
		'icon'
	]; 

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }
}
