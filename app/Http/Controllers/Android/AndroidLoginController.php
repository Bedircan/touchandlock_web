<?php

namespace App\Http\Controllers\Android;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AndroidLoginController extends Controller
{
    public function login(Request $request){
        $error = "false";
        $error_msg = "none";
        $email = $request["email"];
        $password = $request["password"];

        $user = new User();

        if($user->isExists($email)){
            if(Auth::attempt(array('email' => $email, 'password' => $password))){
                return response()->json(["error"=>$error,"user"=>$user->getUser($email)]);
            }
            else{
                $error = "true";
                $error_msg = "Wrong Password!";
                return response()->json(["error_msg"=>$error_msg, "error" => $error]);
            }
        }
        else{
            $error = "true";
            $error_msg = "User does not exists!";
            return response()->json(["error_msg"=>$error_msg, "error" => $error]);
        }

    }
}
