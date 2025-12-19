<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Subscribe;
use App\Models\Blog;
class AdminController extends Controller
{
    //

    function index(){
        $Category=Category::count();
        $Subscribr=Subscribe::count();
        $Comment=Comment::count();
        $Blog=Blog::count();
        $RecentBlogs = Blog::latest()->take(5)->get();
        return view('admin_panal.dashboard.index',compact('Comment','Subscribr','Category','Blog','RecentBlogs'));
    }
}
