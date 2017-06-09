<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $fillable = [
        'property_id','user_id','from','to','active', 'unique_id'
    ];

    public function reservation_user(){
        return $this->belongsTo('App\User');
    }

    public function reservation_property(){
        return $this->belongsTo('App\Property');
    }
}
