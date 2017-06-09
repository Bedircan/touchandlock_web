<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'original_name', 'filename', 'created_at', 'updated_at'
    ];
}
