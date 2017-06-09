<?php

namespace App\Http\Controllers\Property;

use App\Address;
use App\Property_Spec;
use App\Reservation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Property;

class ReservationMobileController extends Controller
{
    public function reservationsMobile(Request $request){
        $user_id = $request["id"];
        //with('reservation_property')->
        $reservations = Reservation::where('user_id', $user_id)->get();
        $properties = new Collection();
        $urls = new Collection();



        foreach ($reservations as $reservation){
            $prop_id = $reservation['property_id'];
            $properties->push(Property::find($prop_id));
            $tmp = Property_Spec::select('img_1')->where('property_id', $prop_id)->first();
            if($tmp['img_1'] == null)
                $url = "https://www.team-8.tk/img/default-home.png";
            else
                $url = $tmp['img_1'];

            $urls->push($url);
        }

        return response()->json(["properties" => $properties, "reservation" => $reservations, "urls" =>$urls]);

    }
}
