<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    protected $fillable = [
        'route',
        'principal',
        'property_id'
    ];
}
