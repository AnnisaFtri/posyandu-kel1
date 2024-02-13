<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

class landingpageController extends Controller
{
    public function index(){
        return view('landingpage.landing');
    //
}

    public function redirect()
{
    if (landingpage::check()) 
        return Redirect::route('Auth');

    return Redirect::route('landingpage');
}
}