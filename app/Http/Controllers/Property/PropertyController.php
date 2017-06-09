<?php

namespace App\Http\Controllers\Property;


use App\Address;
use App\Property_Spec;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;
use App\Reservation;
use Auth;
use App\User;
use DateTime;

class PropertyController extends Controller
{


    public function add(Request $request)
    {
        //dd($request);
        $formElements = $request->input('formElements');
        //assigning form elements to formData array.
        parse_str($formElements, $formData);
        $urls = $request->input('urls');
        //$urlSize = $urls->size();
        //dd($urls);

        $translatedUrls = null;

        if (isset($urls)) {
            $counter = 1;
            foreach ($urls as $url) {
                $key = "img_" . $counter;
                $temp = $url;
                $translatedUrls = array_add($translatedUrls, $key, $temp);
                $counter++;
            }
        }

        //fixing the addresses
        //$tempDate = $formData['reservation'];
        $from = $formData['start'];
        $to = $formData['end'];
        /*$tempDate = str_replace('/','-',$tempDate);
        $from = substr($tempDate,0,10);
        $from = DateTime::createFromFormat('m-d-Y', $from);
        $from = $from->format('Y-m-d');

        $to = substr($tempDate, -10);
        $to = DateTime::createFromFormat('m-d-Y', $to);
        $to = $to->format('Y-m-d');*/


        $formData = array_add($formData, 'from_date', $from);
        $formData = array_add($formData, 'to_date', $to);
        $formData = array_add($formData, 'active', 1);

        $inputs = array_collapse([$formData, $translatedUrls]);
        //creating the property. {$inputs is the container of Property}.
        $property = Property::create($inputs);

        //dd($urlSize);
        /*$specs = array(['property_id' =>'off',
            's_smoke' =>'off',
            's_pet' =>'off',
            's_wifi' =>'off',
            's_heating' =>'off',
            's_cooling' =>'off',
            's_firededector' =>'off',
            's_aidkit' =>'off',
            's_extinguisher' =>'off',
            's_nfc' =>'off']);*/
        /*$property = Property::create($request->only([
            'user_id',
            'title',
            'description',
            'price',
            'type'
        ]));*/


        /*$input = $request->only([
            'property_id',
            's_smoke',
            's_pet',
            's_wifi',
            's_heating',
            's_cooling',
            's_firededector',
            's_aidkit',
            's_extinguisher',
            's_nfc'
        ]);*/

        $inputs['property_id'] = $property['id'];
        $propert_spec = new Property_Spec($inputs);
        $propert_spec->save();
        $address = new Address($inputs);
        $address->save();

        return redirect(url('/account/properties'));
    }

    public function all(Request $request)
    {
        //if()
        $properties = Property::with('specs')->where('active', 1)->orderBy('created_at', 'desc')->paginate(12)->all();
        $count = Property::with('specs')->where('active', 1)->count();
        return view('property.list')->with(['properties' => $properties, 'numberOfProperty' => $count, 'routeDirection' => 'properties']);
    }

    public function account_property(Request $request)
    {

        $cnt = Property::where('user_id', Auth::user()->id)
            ->count();

        if ($cnt < 1) {
            return view('property.noresult');
        }

        $properties = Property::with('specs')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('layouts.partials.propertytable')->with(['properties' => $properties]);
    }

    public function searchSpecific(Request $request)
    {
        $keywords = $request->get('keywords');


        $properties = Property::with('specs')
            ->where('active', 1)
            ->where("address", "LIKE", "%{$keywords}%")
            ->orderBy('created_at', 'desc')
            ->paginate(12)->all();

        $count = Property::with('specs')
            ->where('active', 1)
            ->where("address", "LIKE", "%{$keywords}%")
            ->count();
        if ($count > 0) {
            return view('property.list')->with(['properties' => $properties,
                'numberOfProperty' => $count,
                'routeDirection' => 'property.search.specific',
                'keywords' => $keywords]);
        } else {
            return view('layouts.noresult')->with(['keywords' => $keywords]);
        }

    }

    public function addPage()
    {
        return view('property.form');
    }

    public function details(Request $request, $propId)
    {
        $cnt = Property::Where('id', $propId)->count();

        if ($cnt < 1)
            return view('property.noresult');

        $property = Property::with('specs', 'address_spec')->find($propId);

        return view('property.details')->with(['property' => $property]);
    }

    public function delete(Request $request)
    {
        $prop_id = $request['prop_id'];
        $user_id = Auth::user()->id;

        $prop = Property::where('id', $prop_id)
            ->where('id', $prop_id)
            ->where('user_id', $user_id)
            ->count();

        if ($prop < 1) {
            return view('property.noresult');
        }

        $res = Reservation::where('property_id', $prop_id)->delete();


        $prop = Property::where('id', $prop_id)->first();
        $prop->delete();

        $spec = Property_Spec::where('property_id', $prop_id)->first();
        $spec->delete();

        return redirect(url('/account/properties'));
    }

    public function guests(Request $request)
    {
        $prop_id = $request['prop_id'];
        $property = Property::find($prop_id);
        $cnt = Reservation::where('property_id', $prop_id)->count();

        if ($cnt < 1)
            return view('property.noguests');

        $reservations = Reservation::where('property_id', $prop_id)->get();

        $users = new Collection();
        $payments = new Collection();

        foreach ($reservations as $res){
            $user_id = $res['user_id'];
            $users->push(User::find($user_id));
            $datetime1 = new DateTime($res->from);
            $datetime2 = new DateTime($res->to);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            $payments->push($property->price * ($days + 1));
        }

        return view('layouts.partials.gueststable')->with(['users'=>$users, 'reservations'=> $reservations, 'payments'=>$payments]);
    }

}
