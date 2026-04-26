<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\BlogSeo;
use App\Models\Product;
use App\Models\SocialMedia;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
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
// In your controller
function index(){
    // Cache key with version
    $cacheVersion = Cache::get('blog_cache_version', 1);
    $cacheKey = 'index_page_data_v' . $cacheVersion;
    $cacheDuration = 3600; // 1 hour

    // Check if we have cached data
    if (Cache::has($cacheKey)) {
        $cachedData = Cache::get($cacheKey);
        return view('frontend.index', $cachedData);
    }

    // Fetch fresh data from database
    $data = $this->getIndexPageData();

    // Store in cache
    Cache::put($cacheKey, $data, $cacheDuration);

    return view('frontend.index', $data);
}

// Helper method to fetch data
private function getIndexPageData()
{
    // SEO Meta
    $meta_title = "TechBlogs Info – Tech Products 40% discount";
    $meta_desc  = "TechBlogs.site brings you the latest Tech Products, AI updates, Products updates mobile reviews, gadgets, and digital trends.";
    $meta_keywords="tech blogs, technology insights, latest tech news, AI news, artificial intelligence, AI in healthcare, AI tools 2026, software development, web development, Laravel tutorials, PHP development, programming tips, coding best practices, SEO strategies, website security, tech trends USA, mobile technology news, gadget reviews, developer guides, cloud computing, API integration, machine learning, future of AI, tech tutorials, coding for beginners, freelance development, earn money online tech, startup technology, innovation news";
    $latestBlog = Blog::where('status', 'published')->latest('id')->first();
        $products = Product::latest()->limit(6)->get();

    // Other Blogs
    $secondLatestBlog = Blog::where('status', 'published')->latest('id')->skip(1)->first();

    $latestBlogs = Blog::where('status', 'published')
                        ->latest('id')
                        ->skip(2)
                        ->take(12)
                        ->get();

    // Trending / Oldest
    $trankBlogs = Blog::where('status', 'published')
                        ->oldest('id')
                        ->take(6)
                        ->get();

    // Category Counts
    $techCount   = Blog::where('category', 5)->where('status','published')->count();
    $techinfo    = Blog::where('category', 7)->where('status','published')->count();
    $techhealth  = Blog::where('category', 6)->where('status','published')->count();

    // Latest blog from each category
    $blogs = Blog::whereIn('id', function($query) {
        $query->selectRaw('MAX(id)')
              ->from('blogs')
              ->where('status', 'published')
              ->groupBy('category');
    })->get();
    return compact(
        'meta_title',
        'meta_desc',
        'latestBlog',
        'secondLatestBlog',
        'latestBlogs',
        'trankBlogs',
        'techCount',
        'techinfo',
        'techhealth',
        'blogs',
        'products'
    );
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
    $blogs = Blog::latest()->get(['slug', 'updated_at']);

    return response()
        ->view('sitemap', compact('blogs'))
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
function product($slug)
{
    // Use firstOrFail() to automatically handle 404 if product not found
    $product = Product::where('slug', $slug)->firstOrFail();

    // Set meta title and description with fallback values
    $meta_title = $product->name ?? config('app.name') . ' - Product';
   $meta_desc = Str::limit(strip_tags($product->description ?? ''), 140, '...');

    // Fix: You had duplicate 'meta_title' instead of 'meta_desc'
    return view('frontend.product.index', compact('product', 'meta_title', 'meta_desc'));
}
}
