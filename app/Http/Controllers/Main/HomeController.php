<?php

namespace App\Http\Controllers\Main;

use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getPage(){
        return view('main.home');
    }
}
/**
 * Created by PhpStorm.
 * User: Can
 * Date: 25.03.2017
 * Time: 20:20
 */