<?php

namespace App\Http\Controllers\Android;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AndroidRegisterController extends Controller
{
    public function register(Request $request){
        $error = "false";
        $error_msg = "none";
        $user = new User();
        if($user->isExists($request['email'])){
            $error = "true";
            $error_msg = "user exists!";
            return response()->json(["error_msg"=>$error_msg, "error" => $error]);
        }
        else {
            $result = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
            ]);
            return response()->json(["error_msg"=>$error_msg, "error" => $error, "user" => $result]);
        }

    }
}
