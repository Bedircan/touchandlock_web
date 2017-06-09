<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property_Spec extends Model
{
    protected $table = 'property_specs';
    protected $fillable = [
      'property_id','s_smoke','s_pet','s_wifi','s_basic','s_tv','s_heating', 'img_1', 'img_2',
        'img_3','img_4','img_5','img_6','img_7','img_8',
        's_cooling','s_firededector','s_aidkit','s_extinguisher','s_nfc'
    ];

    public function property(){
        return $this->belongsTo('App\Property');
    }
}
