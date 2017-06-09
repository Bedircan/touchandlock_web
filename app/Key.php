<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $fillable = [
        'user_id', 'key', 'property_id', 'from_date', 'to_date', 'validation'
    ];
}
