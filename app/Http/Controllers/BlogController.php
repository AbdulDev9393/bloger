<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    function index(){
        return view('admin_panal.blogs.index');
    }
}
