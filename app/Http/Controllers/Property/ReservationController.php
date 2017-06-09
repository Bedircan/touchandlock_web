<?php

namespace App\Http\Controllers\Property;

use App\Address;
use App\Reservation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\User;
use App\Property;
use Auth;


class ReservationController extends Controller
{
    protected $user;
    protected $id;

    public function __construct()
    {
        $this->user = Auth::user();
        $this->id = $this->user->id;
    }

    public function reserve(Request $request, $propId){

        $formElements = $request->input('formElements');
        //assigning form elements to formData array.
        parse_str($formElements, $formData);


        $property = Property::find($propId);

        if($property == null || $property->active == 0){
            return redirect('/')->with(["error"=>"Cannot reserve!"]);
        }

        $token = md5(uniqid(mt_rand(), true));
        $from = $formData['start'];
        $to = $formData['end'];


        $property['from_date'] = $to;
        if($property['from_date'] == $property['to_date']){
            $property['active'] = 0;
        }
        else{
            $property['active'] = 1;
        }
        $property->save();
        $reservation = new Reservation();
        //assigning new values to the reservation.
        $reservation['user_id'] = Auth::user()->id;
        $reservation['property_id'] = $propId;
        $reservation['unique_id'] = $token;
        $reservation['active'] = 1;
        $reservation['from'] = $from;
        $reservation['to'] = $to;

        $reservation->save();

        return response()->json(["error" => 'false']);

    }

    public function formPage(Request $request, $propId){

        $property = Property::find($propId);

        if($property == null || $property->active == 0){
            return redirect('/')->with(["error"=>"Cannot reserve!"]);
        }

        return view('property.reservationform')->with(['property' => $property]);
    }

    public function reservations(Request $request){
        $user_id = $this->id;

        $cnt = Reservation::where('user_id', $user_id)->count();

        if($cnt<1){
            return view('property.noresult');
        }

        $reservations = Reservation::where('user_id', $user_id)->get();
        $properties = new Collection();

        foreach ($reservations as $reservation){
            $prop_id = $reservation['property_id'];
            $properties->push(Property::find($prop_id));
        }
        return view('layouts.partials.reservationtable')->with(['properties'=>$properties, 'reservations'=>$reservations]);
    }

    public function delete(Request $request){
        $prop_id = $request['prop_id'];
        $reservation_id = $request['reservation_id'];
        $user_id = $this->id;

        $res = Reservation::where('property_id',$prop_id)
            ->where('id',$reservation_id)
            ->where('user_id', $user_id)
            ->count();

        if($res < 1){
            return view('property.noresult');
        }

        $res = Reservation::where('property_id',$prop_id)
            ->where('id',$reservation_id)
            ->where('user_id', $user_id)
            ->first();

        $prop = Property::where('id', $prop_id)->first();

        //dd($res);

        $prop->from_date = $res->from;
        $prop->save();

        $res->delete();


        return view('property.recorddeleted')->with(['reservationId'=>$reservation_id]);

    }
}
