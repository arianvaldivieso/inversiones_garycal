<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureProperty extends Model
{
    protected $table = 'feature_property';
    protected $fillable = [
        'feature_id',
        'property_id'
    ];
}
