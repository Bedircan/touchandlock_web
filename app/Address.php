<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";
    protected $fillable = [
        'property_id', 'address', 'address_description', 'city', 'state', 'zipcode', 'street', 'street_number',
        'lat', 'lng', 'country'
    ];

    public function store(Request $request){

    }

    public function property(){
        return $this->belongsTo('App\Property');
    }
}
