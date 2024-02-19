<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\auth;
use Illuminate\Http\Request;
class NewbabiesController extends Controller
{
    public function index(){
        return view('newsbabies.index');
    }
    
}
