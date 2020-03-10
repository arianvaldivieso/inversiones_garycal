<?php

namespace App;

use App\Photo;
use App\Feature;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'address',
        'description',
        'referral_point',
        'type',
        'status',
        'price',
        'latitude',
        'longitude'
    ];

    protected $with = [
        'feactures'
    ];

    static function types(){
        return [
            'apartamentos',
            'locales',
            'casas',
            'terrenos',
            'thown-house'
        ];
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }


    public function feactures()
    {
        return $this->belongsToMany(Feature::class);
    }
}
