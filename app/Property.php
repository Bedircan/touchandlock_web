<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = "properties";
    protected $fillable = [
        'user_id', 'title', 'description', 'price', 'type', 'address', 'lat', 'lat', 'lng',
        'from_date', 'to_date', 'active'
    ];

    public function store(Request $request){

    }

    public function specs(){
        return $this->hasOne('App\Property_Spec');
    }

    public function reservations(){
        return $this->hasMany('App\Reservation');
    }

    public function address_spec(){
        return $this->hasOne('App\Address');
    }

}
