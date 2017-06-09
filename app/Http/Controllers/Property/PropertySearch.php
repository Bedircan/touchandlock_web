<?php

namespace App\Http\Controllers\Property;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Address;
use App\Http\Requests;
use DB;
use App\Property;

class PropertySearch extends Controller
{


    public function search(Request $request)
    {
        $keywords = $request->get('keywords');

        /*$result = DB::table('properties')->select('addresses')
            ->where('addresses', 'LIKE', '%'.$keywords.'%');*/

        $data = Property::select("address as address")->where("address","LIKE","%{$keywords}%")->get();


        //$suggestions = Search::where('keywords', 'LIKE', '%'.$keywords.'%')->get();

        return response()->json($data);
    }

    public function searchSpecific(Request $request){
        $keywords = $request->get('keywords');


    }




    }


