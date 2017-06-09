<?php

namespace App\Http\Controllers\Raspberry;

use DateTime;
use Illuminate\Http\Request;
use App\Reservation;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class RaspberryKeyControl extends Controller
{
    public function keyControl(Request $request){
        $today = date("Y/m/d");

        $tmp = $request['request'];
        $tmp = explode("/", $tmp);

        $key = $tmp[0];
        $user_id = $tmp[1];
        $prop_id = $tmp[2];
        $res_id = $tmp[3];

        $res = Reservation::where('unique_id', $key)
            ->where('user_id',$user_id)
            ->where('property_id',$prop_id)
            ->count();

        if($res<1){
            return response()->json(["error" => "true", "success" => "false",
                "error_code" => "0",
                "error_message"=> "Wrong Key!"]);
        }

        $res = Reservation::where('unique_id', $key)->first();

        //checking the date.
        $from = new DateTime($res->from);
        $to = new DateTime($res->to);

        if($res->from > $today || $today > $res->to){
            return response()->json(["error" => "true", "success" => "false",
                "error_code" => "1",
                "error_message"=> "Your reservation is not valid today!"]);
        }



        return response()->json(["success" => "true", "error" => "false"]);
    }
}
