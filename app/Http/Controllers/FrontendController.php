<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\BlogSeo;
class FrontendController extends Controller
{
    //
    function index(){
        $latestBlog=Blog::latest()->first();
       $meta_title="daily tech blogs and daily news";
       $meta_desc="Stay updated with the latest in technology! TechBlog brings you tech news, gadget reviews, software tutorials, and insightful articles to keep you ahead in the digital world.";
   $latestBlogs = Blog::latest()->take(6)->get();
   $blogs = Blog::latest()->take(16)->get();
         
        return view('frontend.index',compact('latestBlog','latestBlogs','blogs','meta_desc','meta_title'));
    }
    function Contectus(){
        return view('frontend.content-us');
    }
    function bogs(){
        $getBlogs=Blog::all();
        return view(
            'frontend.blogs.index',
            compact('getBlogs')
        );
    }
    public function bogs_search(Request $request)
    {
        $query = $request->input('query'); // get the search term

        $getBlogs = Blog::where('name', 'like', "%{$query}%")
                        ->orWhere('Description', 'like', "%{$query}%")
                        ->latest()
                        ->get();

        return view('frontend.blogs.index', compact('getBlogs'));
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
