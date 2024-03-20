<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login()
    {
       return "Login";
    }

    public function doLogin(Request $request){
        return "doLogin";
    }

    public function doLogOut(){
        return "doLogOut";
    }


}
