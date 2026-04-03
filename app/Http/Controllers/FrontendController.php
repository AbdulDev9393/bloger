<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\BlogSeo;
use App\Models\SocialMedia;
use GuzzleHttp\Client;
class FrontendController extends Controller
{
    //

    public function privacyPolicy()
{
    return view('frontend.privacy');
}
public function cookiePolicy()
{
    $meta_title = "Cookie Policy | TechBlogs - How We Use Cookies";
    $meta_desc = "Learn how TechBlogs uses cookies to improve your browsing experience. Understand what cookies are, how we use them, and how you can manage your preferences.";
    return view('frontend.cookie',compact('meta_title','meta_desc'));
}
 function index(){

    // SEO Meta
    $meta_title = "TechBlogs Info – Latest Tech News, AI, Mobiles & Digital Trends";
    $meta_desc  = "TechBlogs.site brings you the latest technology news, AI updates, mobile reviews, gadgets, and digital trends. Stay updated with the future of technology.";

    // Latest Published Blog
    $latestBlog = Blog::where('status', 'published')->latest()->first();

    // Other Blogs
    $secondLatestBlog = Blog::where('status', 'published')->latest()->skip(1)->first();

    $latestBlogs = Blog::where('status', 'published')
                        ->latest()
                        ->skip(2)
                        ->take(12)
                        ->get();

    // Trending / Oldest
    $trankBlogs = Blog::where('status', 'published')
                        ->oldest()
                        ->take(4)
                        ->get();

    // Category Counts
    $techCount   = Blog::where('category', 5)->where('status','published')->count();
    $techinfo    = Blog::where('category', 7)->where('status','published')->count();
    $techhealth  = Blog::where('category', 6)->where('status','published')->count();

    // Latest blog from each category
    $blogs = Blog::whereIn('id', function($query) {
        $query->selectRaw('MAX(id)')
              ->from('blogs')
              ->groupBy('category');
    })->where('status','published')->get();

    return view('frontend.index', compact(
        'meta_title',
        'meta_desc',
        'latestBlog',
        'secondLatestBlog',
        'latestBlogs',
        'trankBlogs',
        'techCount',
        'techinfo',
        'techhealth',
        'blogs'
    ));
}
public function Contectus() {
      $meta_title = "Contact Us – TechBlogs | Get Support & Connect with Our Team";
    $meta_desc  = "Contact TechBlogs for any questions, support, or feedback. Our team is ready to help you with technology-related queries, suggestions, or collaboration opportunities. We usually respond as quickly as possible.";

    $data = SocialMedia::first();
    return view('frontend.content-us', compact('data','meta_desc','meta_title'));
}
    function bogs(){
        $meta_title= "Latest Tech Blogs, AI News, Mobile Reviews & Digital Trends | TechBlogs";
        $meta_desc= "Explore the latest tech blogs on AI, mobile reviews, gadgets, and digital trends. Stay updated with expert insights, tips, and breaking technology news on TechBlogs.";
        $getBlogs = Blog::where('Status','published')->latest()->get();
        return view(
            'frontend.blogs.index',
            compact('getBlogs','meta_desc','meta_title')
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
         $meta_title = "About Us – TechBlogs | Latest Tech News, AI & Digital Trends Platform";
    $meta_desc  = "TechBlogs is a technology-focused platform where we share the latest tech news, AI updates, mobile reviews, gadgets, software tips, and digital trends. Our goal is to keep readers updated with simple and reliable tech information.";
  
      return view('frontend.about.about', compact('meta_title', 'meta_desc'));
    }
public function sitemap()
{
    $blogs = Blog::latest()->get();

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
    $slug = Str::slug($blog->slug); // SEO-friendly slug
    $sitemap .= '<url>';
    $sitemap .= '<loc>' . url('/blog/' . $slug) . '</loc>'; // ✅ id pehle, slug baad
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
    $meta_title = "Privacy Policy | TechBlogs - Your Data Protection & Privacy Rights";
    $meta_desc = "Read TechBlogs Privacy Policy to understand how we collect, use, and protect your personal information. Learn about your privacy rights and data security practices.";
    return view('frontend.terms',compact('meta_title','meta_title'));
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
