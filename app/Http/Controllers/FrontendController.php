<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\BlogSeo;
use App\Models\SocialMedia;
class FrontendController extends Controller
{
    //
    function index(){
        $latestBlog=Blog::latest()->first();
       $meta_title="TechBlogs Info – Latest Tech News, AI, Mobiles & Digital Trends";
       $meta_desc="TechBlogs.site brings you the latest technology news, AI updates, mobile reviews, gadgets, and digital trends. Stay updated with the future of technology";
       $latestBlogs = Blog::latest()->skip(2)->take(8)->get();
       $secondLatestBlog = Blog::latest()->skip(1)->first();
       $trankBlogs = Blog::oldest()->take(4)->get();
      
       $techCount=Blog::where('category','5')->count();
       $techinfo=Blog::where('category','7')->count();
        $techhealth=Blog::where('category','6')->count();
      $blogs = Blog::whereIn('id', function($query) {
    $query->selectRaw('MAX(id)') // latest blog per category
          ->from('blogs')->latest()
          ->groupBy('category');
})->get();
        return view('frontend.index',compact('latestBlog','latestBlogs','blogs','meta_desc','meta_title','trankBlogs','secondLatestBlog','techCount','techinfo','techhealth'));
    }
public function Contectus() {
    $data = SocialMedia::first();
    return view('frontend.content-us', compact('data'));
}
    function bogs(){
        $getBlogs = Blog::where('Status','published')->latest()->get();
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
        $meta_title="TechBlogs.site Blogs | Trending AI, Mobile & Tech Updates";
       $meta_desc="Explore latest tech blogs on AI, smartphones, gadgets, Elon Musk, SpaceX, and future technology. Read trending technology articles daily on TechBlogs.site";
        return view('frontend.blogs.view',compact('meta_desc','meta_title'));
    }
function Services(){
    $meta_title = "Our Services – Web Development, SEO & Tech Solutions | TechBlogs.site";
    $meta_desc  = "Discover our professional services including web development, SEO optimization,and digital solutions to grow your online presence with TechBlogs.site";

    return view('frontend.services.services', compact('meta_title', 'meta_desc'));
}

    function Aboute(){
      return view('frontend.about.about');
    }
public function sitemap()
{
    $blogs = Blog::all(); // Blog URLs

    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
    $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    // Home page
    $sitemap .= '<url>';
    $sitemap .= '<loc>' . url('/') . '</loc>';
    $sitemap .= '<changefreq>daily</changefreq>';
    $sitemap .= '<priority>1.0</priority>';
    $sitemap .= '</url>';

    // Static pages
    $staticPages = [
        '/blogs',
         '/Aboute-us',
        '/terms-condition',
        '/Contect-us',
        '/privacy-policy',
        
    ];

    foreach ($staticPages as $page) {
        $sitemap .= '<url>';
        $sitemap .= '<loc>' . url($page) . '</loc>';
        $sitemap .= '<changefreq>daily</changefreq>';
        $sitemap .= '<priority>0.7</priority>';
        $sitemap .= '</url>';
    }

    // Blog pages
   foreach ($blogs as $blog) {
    $slug = Str::slug($blog->name); // SEO-friendly slug
    $sitemap .= '<url>';
    $sitemap .= '<loc>' . url('/blog/view/' . $blog->id . '/' . $slug) . '</loc>'; // ✅ id pehle, slug baad
    $sitemap .= '<lastmod>' . $blog->updated_at->toAtomString() . '</lastmod>';
    $sitemap .= '<changefreq>daily</changefreq>';
    $sitemap .= '<priority>0.8</priority>';
    $sitemap .= '</url>';
}

    $sitemap .= '</urlset>';

    return response($sitemap, 200)
              ->header('Content-Type', 'application/xml');
}
  function condition(){
    return view('frontend.terms');
  }
  function Categories($Categories){
      $categoryId = Category::where('name', $Categories)->value('id');
       $getBlogs = Blog::where('Status','published')->where('category',$categoryId)->latest()->get();
       return view(
            'frontend.blogs.index',
            compact('getBlogs')
        );
  }
}
