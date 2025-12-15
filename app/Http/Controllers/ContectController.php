<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContectController extends Controller
{

    function index(){
        return view('admin_panal.Comments.index');
    }
}