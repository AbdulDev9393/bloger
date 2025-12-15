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
    function bogs(){
        return view(
            'frontend.blogs.index'
        );
    }
    function bogs__view(){
        return view('frontend.blogs.view');
    }
    function Services(){
        return view('frontend.services.services');
    }
    function Aboute(){
      return view('frontend.about.about');
    }
}
