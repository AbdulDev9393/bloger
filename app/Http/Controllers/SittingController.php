<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SittingController extends Controller
{
    //
    function index(){
        return view('admin_panal.Sitting.index');
    }
}
