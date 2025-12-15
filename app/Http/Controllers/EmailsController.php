<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailsController extends Controller
{
    //
    function index(){
        return view('admin_panal.user_sub.index');
    }
}
