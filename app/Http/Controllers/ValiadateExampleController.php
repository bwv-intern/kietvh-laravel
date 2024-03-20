<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidationServerRequest;

class ValiadateExampleController extends Controller
{
    public function index(){
        return view('client.validation');
    }

    public function validateServerSide(ValidationServerRequest $request){
        return  redirect()->back()->with('success','Validate passsed');
    }
}
