<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    function index(){
        return view('frontend.index');
    }
    function Contectus(){
        return view('frontend.content-us');
    }
}
