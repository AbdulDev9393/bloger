<?php

namespace App\Http\Controllers;
use OpenAI;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\BlogSeo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    //
function index() {
    $categories = Category::latest()->get();
    $blogs = Blog::latest()->paginate(30);
      $allblogs=blog::count();
    $seo=BlogSeo::all();
   
    return view('admin_panal.blogs.index', compact('categories', 'blogs','allblogs'));
}
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'Status' => 'required|string',
        'description' => 'required|string',
        'Thumbnail_Image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        'Banner_Image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:4096',
         'Resizeable_Image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:4096',
    ]);

    $blog = new Blog;
    $blog->name = $request->name;
    $blog->slug = Str::slug($request->name);
    $blog->category = $request->category;
    $blog->Status = $request->Status;
    $blog->description = $request->description;
           
    // Base path for public_html storage
    $storagePath = $_SERVER['DOCUMENT_ROOT'].'/storage/blogs';

    // Ensure folder exists
    if (!file_exists($storagePath)) {
        mkdir($storagePath, 0755, true);
    }

    // Thumbnail Image
    if ($request->hasFile('Thumbnail_Image') && $request->file('Thumbnail_Image')->isValid()) {
        $file = $request->file('Thumbnail_Image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move($storagePath, $filename);
        $blog->Thumbnail_Image = 'storage/blogs/'.$filename; // Public URL
    }
        if ($request->hasFile('Resizeable_Image') && $request->file('Resizeable_Image')->isValid()) {
        $file = $request->file('Resizeable_Image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move($storagePath, $filename);
        $blog->resize_image = 'storage/blogs/'.$filename; // Public URL
    }

    // Banner Image
    if ($request->hasFile('Banner_Image') && $request->file('Banner_Image')->isValid()) {
        $file = $request->file('Banner_Image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move($storagePath, $filename);
        $blog->Banner_mage = 'storage/blogs/'.$filename; // Public URL
    }

    $blog->save();

    return back()->with('success', 'Blog added successfully!');
}


  function eid($id){
    $blog = Blog::find($id);
     $categories =Category::all();
    return view('admin_panal.blogs.edit',compact('blog','categories'));

  }

public function generateAI(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255'
    ]);

    $title = $request->title;

    $prompt = "
Write a detailed, SEO-optimized blog post for a technology website.

Website Name: techblogs.site  
Blog Title: {$title}

Instructions:
- Write at least 1200+ words
- Content must be 100% unique, human-like, and engaging
- Topic must be strictly technology-related
- Include real-world examples
- Explain deeply
- Use SEO best practices
- Include 'techblogs.site' in intro and conclusion

Formatting Rules:
- Output MUST be clean HTML only
- Use <h2>, <h3>, <p>, <strong>, <ul>, <li>
- No markdown, no explanation

Return ONLY HTML.
";

 $activeKey = 'ak_27T0ra3EW4kh8Ba7mt7ty8xD3v984';
 $response = Http::withHeaders([
    'Authorization' => 'Bearer ' . $activeKey,
    'Content-Type'  => 'application/json',
])->post('https://api.longcat.chat/openai/v1/chat/completions', [
    'model' => 'LongCat-Flash-Chat',
    'messages' => [
        [
            'role' => 'user',
            'content' => $prompt
        ]
    ],
    'temperature' => 0.7,
    'max_tokens' => 2000,
]);

$contentHtml = $response->json()['choices'][0]['message']['content'];
  $contentHtml = str_replace('—', ' ', $contentHtml);

    if (!$response->successful()) {
        return response()->json([
            'status' => false,
            'message' => 'API request failed',
            'debug' => $response->body()
        ], 500);
    }

    $data = $response->json();

    $contentHtml = data_get($data, 'choices.0.message.content');

    if (!$contentHtml) {
        return response()->json([
            'status' => false,
            'message' => 'Empty content from AI',
            'debug' => $data
        ], 500);
    }

    // cleanup
    $contentHtml = trim($contentHtml);
    $contentHtml = preg_replace('/^```html|```$/', '', $contentHtml);

    return response()->json([
        'status' => true,
        'title' => $title,
        'content' => $contentHtml
    ]);
}
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'Status' => 'required|string',
        'Description' => 'required|string',
        'Thumbnail_Image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        'Banner_Image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:4096',
        'Resizeable_Image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:4096',
    ]);

    $blog = Blog::findOrFail($id);
    $blog->name = $request->name;
    $blog->slug = Str::slug($request->name);
    $blog->category = $request->category;
    $blog->Status = $request->Status;
    $blog->Description = $request->Description;

    // Initialize Image Manager
    $manager = new ImageManager(new Driver());
    
    // Base path for public_html storage
    $storagePath = $_SERVER['DOCUMENT_ROOT'].'/storage/blogs';
    $webpPath = $_SERVER['DOCUMENT_ROOT'].'/storage/blogs/webp';

    // Create directories if they don't exist
    if (!file_exists($storagePath)) {
        mkdir($storagePath, 0755, true);
    }
    if (!file_exists($webpPath)) {
        mkdir($webpPath, 0755, true);
    }

    /**
     * Process and save image with resizing and WebP conversion
     */
    $processImage = function($file, $type, $maxWidth, $maxHeight, $quality = 80) use ($manager, $storagePath, $webpPath) {
        // Generate unique filename
        $filename = time().'_'.$type.'_'.uniqid().'.webp';
        $webpFilePath = $webpPath.'/'.$filename;
        
        // Load and process image
        $image = $manager->read($file);
        
        // Resize image while maintaining aspect ratio
        $image->scale(width: $maxWidth, height: $maxHeight);
        
        // Convert to WebP and save with optimization
        $image->toWebp($quality)->save($webpFilePath);
        
        // Return relative path for database
        return 'storage/blogs/webp/'.$filename;
    };

    // Thumbnail Image Processing (Small size for thumbnails)
    if ($request->hasFile('Thumbnail_Image') && $request->file('Thumbnail_Image')->isValid()) {
        // Delete old images
        if ($blog->Thumbnail_Image && file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$blog->Thumbnail_Image)) {
            unlink($_SERVER['DOCUMENT_ROOT'].'/'.$blog->Thumbnail_Image);
        }
        
        // Process new image - Thumbnail size: 400x300
        $file = $request->file('Thumbnail_Image');
        $blog->Thumbnail_Image = $processImage($file, 'thumbnail', 400, 300, 85);
    }

    // Resizeable Image Processing (Medium size for content)
    if ($request->hasFile('Resizeable_Image') && $request->file('Resizeable_Image')->isValid()) {
        // Delete old images
        if ($blog->resize_image && file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$blog->resize_image)) {
            unlink($_SERVER['DOCUMENT_ROOT'].'/'.$blog->resize_image);
        }
        
        // Process new image - Medium size: 800x600
        $file = $request->file('Resizeable_Image');
        $blog->resize_image = $processImage($file, 'resizeable', 800, 600, 85);
    }

    // Banner Image Processing (Large size for banners)
    if ($request->hasFile('Banner_Image') && $request->file('Banner_Image')->isValid()) {
        // Delete old images
        if ($blog->Banner_mage && file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$blog->Banner_mage)) {
            unlink($_SERVER['DOCUMENT_ROOT'].'/'.$blog->Banner_mage);
        }
        
        // Process new image - Banner size: 1200x400
        $file = $request->file('Banner_Image');
        $blog->Banner_mage = $processImage($file, 'banner', 1200, 400, 90);
    }

    $blog->save();

    return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully!');
}   // JSON-LD schema as array



public function delete($id)
{
    $blog = Blog::findOrFail($id);

    // optional: images bhi delete karo
    if ($blog->Thumbnail_Image && file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$blog->Thumbnail_Image)) {
        unlink($_SERVER['DOCUMENT_ROOT'].'/'.$blog->Thumbnail_Image);
    }

    if ($blog->Banner_mage && file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$blog->Banner_mage)) {
        unlink($_SERVER['DOCUMENT_ROOT'].'/'.$blog->Banner_mage);
    }

    if ($blog->resize_image && file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$blog->resize_image)) {
        unlink($_SERVER['DOCUMENT_ROOT'].'/'.$blog->resize_image);
    }

    $blog->delete();

    return back()->with('success', 'Blog deleted successfully');
}
public function blogView($slug)
{
    $Blog_info = Blog::where('slug', $slug)->firstOrFail();
    $id=$Blog_info->id;
    $seo = BlogSeo::where('blog_id', $id)->first();

    if (!$Blog_info) {
        abort(404);
    }

    $meta_title = $seo->title ?? ($Blog_info->name ?? 'daliyblogs');
    $meta_desc = $seo->Description ?? (Str::limit(strip_tags($Blog_info->description ?? ''), 160));

    // Prepare images array
    $images = [];
    
    if ($Blog_info->Thumbnail_Image) {
        $images[] = asset($Blog_info->Thumbnail_Image);
    }
    
    if ($Blog_info->Banner_mage) {
        $images[] = asset($Blog_info->Banner_mage);
    }
    
    if ($Blog_info->resize_image) {
        $images[] = asset($Blog_info->resize_image);
    }

    if (empty($images)) {
        $images[] = asset('storage/default.png');
    }

    // Get author name (assuming you have an author relationship or field)
    $authorName = $Blog_info->Author ?? 'Admin';
    $authorUrl = $Blog_info->author_url ?? null;
    
    // Get category
    $category = $Blog_info->category ?? 'General';
    
    // Get keywords if available
    $keywords = $seo->keywords ?? '';
    $keywordsArray = $keywords ? array_map('trim', explode(',', $keywords)) : [];

    // Get estimated reading time
    $wordCount = str_word_count(strip_tags($Blog_info->description ?? ''));
    $readingTime = ceil($wordCount / 200); // Average reading speed: 200 words per minute

    // Get article section
    $articleSection = $category;

    // Get comment count if you have comments system
    $commentCount = $Blog_info->comments_count ?? 0;

    // Build comprehensive schema array
    $schema_array = [
        "@context" => "https://schema.org",
        "@type" => "BlogPosting",
        
        // Basic identification
        "@id" => url()->current(),
        "url" => url()->current(),
        "headline" => $meta_title,
        "alternativeHeadline" => $Blog_info->name ?? $meta_title,
        "description" => $meta_desc,
        
        // Images
        "image" => count($images) === 1 ? $images[0] : $images,
        
        // Dates
        "datePublished" => $Blog_info->created_at?->toIso8601String(),
        "dateModified" => $Blog_info->updated_at?->toIso8601String(),
        "dateCreated" => $Blog_info->created_at?->toIso8601String(),
        
        // Author with enhanced details
        "author" => [
            "@type" => "Person",
            "name" => $authorName,
            "url" => $authorUrl ?? url()->current(),
            "sameAs" => $authorUrl ? [$authorUrl] : null
        ],
        
        // Publisher with complete details
        "publisher" => [
            "@type" => "Organization",
            "name" => "DailyBlogs",
            "url" => "https://www.techblogs.site",
            "logo" => [
                "@type" => "ImageObject",
                "url" => "https://www.techblogs.site/images/logo.png",
                "width" => "600",
                "height" => "60"
            ],
            "sameAs" => [
                "https://www.facebook.com/dailyblogs",
                "https://twitter.com/dailyblogs",
                "https://www.instagram.com/dailyblogs"
            ]
        ],
        
        // Main entity reference
        "mainEntityOfPage" => [
            "@type" => "WebPage",
            "@id" => url()->current()
        ],
        
        // Article specific
        "articleBody" => strip_tags($Blog_info->description ?? ''),
        "articleSection" => $articleSection,
        "articleType" => "BlogPosting",
        
        // Keywords and categories
        "keywords" => $keywords ? implode(', ', $keywordsArray) : $category,
        "about" => [
            "@type" => "Thing",
            "name" => $category
        ],
        
        // Reading time
        "timeRequired" => "PT{$readingTime}M",
        
        // Comment section
        "commentCount" => $commentCount,
        
        // Share count (if you have social sharing data)
        "interactionStatistic" => [
            "@type" => "InteractionCounter",
            "interactionType" => "https://schema.org/ShareAction",
            "userInteractionCount" => $Blog_info->share_count ?? 0
        ],
        
        // Language
        "inLanguage" => "en-US",
        
        // Is this accessible for free
        "isAccessibleForFree" => true,
        
        // Creative work status
        "creativeWorkStatus" => "Published",
        
        // License (if applicable)
        "license" => "https://creativecommons.org/licenses/by/4.0/"
    ];

    // Add breadcrumbs schema
    $breadcrumb_schema = [
        "@context" => "https://schema.org",
        "@type" => "BreadcrumbList",
        "itemListElement" => [
            [
                "@type" => "ListItem",
                "position" => 1,
                "name" => "Home",
                "item" => url('/')
            ],
            [
                "@type" => "ListItem",
                "position" => 2,
                "name" => "Blogs",
                "item" => route('frontend.blogs') // Adjust this to your blogs listing route
            ],
           
            [
                "@type" => "ListItem",
                "position" => 4,
                "name" => $meta_title,
                "item" => url()->current()
            ]
        ]
    ];

    // Add FAQ schema if you have Q&A sections in your blog
    $faq_schema = null;
    if ($seo && $seo->faq_data) {
        // Assuming you have FAQ data stored
        $faq_schema = [
            "@context" => "https://schema.org",
            "@type" => "FAQPage",
            "mainEntity" => json_decode($seo->faq_data, true)
        ];
    }

    // Encode all schemas
    $meta_schema = json_encode(
        array_filter($schema_array, fn($value) => $value !== null && $value !== ''),
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
    );
    
    $breadcrumb_schema_encoded = json_encode(
        $breadcrumb_schema,
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
    );
    
    $faq_schema_encoded = $faq_schema ? json_encode(
        $faq_schema,
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
    ) : null;
    $meta_keywords = $seo->keywords ?? '';

    return view('frontend.blogs.view', compact(
        'Blog_info',
        'meta_desc',
        'meta_title',
        'meta_schema',
        'meta_keywords',
        'breadcrumb_schema_encoded',
        'faq_schema_encoded'
    ));
}
 function blog_seo($id){
    $blog=Blog::find($id);
    $blog_seo = BlogSeo::where('blog_id', $id)->first();
   
    return view('admin_panal.blogs.blogs_seo.index',compact('blog','blog_seo'));

 }
 public function blog_seo_update(Request $request, $id)
{
    
 
    // Check if SEO record exists
    $seo = BlogSeo::firstOrNew(['blog_id' => $id]);

    // Save plain text to DB
    $seo->title = strip_tags($request->meta_title);            // plain text
    $seo->Description = strip_tags($request->meta_description); // plain text
      $seo->keywords = strip_tags($request->meta_keywords);
    $seo->blog_id = $id;
    $seo->org_des = strip_tags($request->meta_description);

    $seo->save();

    return back()->with('success', 'SEO updated successfully for this blog');
}

}