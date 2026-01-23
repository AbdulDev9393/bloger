<?php

namespace App\Http\Controllers;

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
public function blogView($id)
{
    $seo = BlogSeo::where('blog_id', $id)->first();

    $meta_title = $seo->title ?? 'daliyblogs';
    $meta_desc  = $seo->Description ?? 'Read latest blogs on daliyblogs';

    $Blog_info = Blog::find($id);

    $schema_array = [
        "@context" => "https://schema.org",
        "@type" => "BlogPosting",
        "headline" => $meta_title,

        "image" => $Blog_info->Thumbnail_Image
            ? asset($Blog_info->Thumbnail_Image)
            : asset('storage/default.png'),

        "datePublished" => $Blog_info->created_at?->toIso8601String(),
        "dateModified" => $Blog_info->updated_at?->toIso8601String(),

        "author" => [
            "@type" => "Person",
            "name" => $Blog_info->Author ?? 'Admin'
        ],

        "publisher" => [
            "@type" => "Organization",
            "name" => "daliyblogs",
            "logo" => [
                "@type" => "ImageObject",
                "url" => "https://www.techblogs.site/favicon.ico"
            ]
        ],

        "description" => Str::limit(strip_tags($meta_desc), 160),

        "mainEntityOfPage" => [
            "@type" => "WebPage",
            "@id" => url()->current()
        ]
    ];

    $meta_schema = json_encode(
        $schema_array,
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
    );

    return view('frontend.blogs.view', compact(
        'Blog_info',
        'meta_desc',
        'meta_title',
        'meta_schema'
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
    $seo->blog_id = $id;
    $seo->org_des = strip_tags($request->meta_description);

    $seo->save();

    return back()->with('success', 'SEO updated successfully for this blog');
}

    public function generateContent(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255'
            ]);
            
            $title = $request->title;
            $oldDescription = $request->old_description ?? '';
            
            // Debug log
            Log::info('Content Generation Request', [
                'title' => $title,
                'has_old_desc' => !empty($oldDescription),
                'api_key_exists' => !empty(env('DEEPSEEK_API_KEY'))
            ]);
            
            // Prepare the prompt
            $prompt = "Write a comprehensive blog post about: \"$title\"\n\n";
            
            if ($oldDescription && strlen($oldDescription) > 50) {
                $prompt .= "Continue writing based on this existing content:\n\n";
                $prompt .= strip_tags($oldDescription) . "\n\n";
                $prompt .= "Continue this blog naturally, adding more valuable content.";
            } else {
                $prompt .= "Write a complete blog post with:\n";
                $prompt .= "1. Engaging introduction\n";
                $prompt .= "2. Detailed main sections with subheadings\n";
                $prompt .= "3. Practical examples/tips\n";
                $prompt .= "4. Conclusion\n\n";
            }
            
            $prompt .= "Use proper HTML formatting with <h2>, <h3>, <p>, <ul>, <li> tags where appropriate.";
            
            // Check if API key exists
            $apiKey = env('DEEPSEEK_API_KEY');
            if (!$apiKey || $apiKey === 'your_deepseek_api_key_here') {
                Log::error('DeepSeek API Key not configured');
                return response()->json([
                    'success' => false,
                    'message' => 'API key not configured. Please check your .env file.',
                    'content' => $this->getFallbackContent($title)
                ]);
            }
            
            // Make API request with timeout
            $response = Http::timeout(30)->withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->post('https://api.deepseek.com/chat/completions', [
                'model' => 'deepseek-chat',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a professional blog writer. Write in English.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt
                    ]
                ],
                'max_tokens' => 1500,
                'temperature' => 0.7,
                'top_p' => 0.9
            ]);
            
            // Log the response for debugging
            Log::info('DeepSeek API Response', [
                'status' => $response->status(),
                'success' => $response->successful()
            ]);
            
            if ($response->successful()) {
                $data = $response->json();
                
                // Check response structure
                if (isset($data['choices'][0]['message']['content'])) {
                    $generatedContent = $data['choices'][0]['message']['content'];
                    
                    // Format the content
                    $formattedContent = $this->formatGeneratedContent($generatedContent, $oldDescription);
                    
                    return response()->json([
                        'success' => true,
                        'content' => $formattedContent,
                        'message' => 'Content generated successfully!'
                    ]);
                } else {
                    Log::error('Unexpected API response structure', $data);
                    return response()->json([
                        'success' => false,
                        'message' => 'Unexpected API response format.',
                        'content' => $this->getFallbackContent($title)
                    ]);
                }
            } else {
                $error = $response->body();
                Log::error('API Request Failed', [
                    'status' => $response->status(),
                    'error' => $error
                ]);
                
                return response()->json([
                    'success' => false,
                    'message' => 'API request failed. ' . $response->status(),
                    'content' => $this->getFallbackContent($title)
                ]);
            }
            
        } catch (\Exception $e) {
            Log::error('Content Generation Exception: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
                'content' => $this->getFallbackContent($request->title ?? '')
            ]);
        }
    }
    
    private function formatGeneratedContent($content, $oldDescription = '')
    {
        // Remove any markdown formatting
        $content = str_replace(['**', '__', '*', '_'], '', $content);
        
        // Convert markdown headers to HTML
        $content = preg_replace('/^# (.*)$/m', '<h1>$1</h1>', $content);
        $content = preg_replace('/^## (.*)$/m', '<h2>$1</h2>', $content);
        $content = preg_replace('/^### (.*)$/m', '<h3>$1</h3>', $content);
        
        // Wrap paragraphs in <p> tags
        $lines = explode("\n", $content);
        $formattedLines = [];
        
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) continue;
            
            // If line already has HTML tags, keep it
            if (preg_match('/^<[^>]+>/', $line) || preg_match('/<\/[^>]+>$/', $line)) {
                $formattedLines[] = $line;
            } 
            // If line looks like a header, keep as is
            elseif (preg_match('/^<h[1-6]>/', $line)) {
                $formattedLines[] = $line;
            }
            // Otherwise wrap in paragraph
            else {
                $formattedLines[] = "<p>$line</p>";
            }
        }
        
        $content = implode("\n", $formattedLines);
        
        // If there's old description, append to it
        if (!empty($oldDescription) && strlen($oldDescription) > 50) {
            $content = $oldDescription . "\n\n<hr>\n\n" . $content;
        }
        
        return $content;
    }
    
    private function getFallbackContent($title)
    {
        // Return a basic template if API fails
        return "
            <h1>$title</h1>
            
            <h2>Introduction</h2>
            <p>Welcome to our comprehensive guide on $title. In this article, we'll explore everything you need to know about this topic.</p>
            
            <h2>Why $title Matters</h2>
            <p>Understanding $title is crucial in today's world. Here are some key reasons:</p>
            <ul>
                <li>Benefit 1 of $title</li>
                <li>Benefit 2 of $title</li>
                <li>Benefit 3 of $title</li>
            </ul>
            
            <h2>Getting Started</h2>
            <p>To begin with $title, you should consider the following steps:</p>
            <ol>
                <li>Step 1: Research and planning</li>
                <li>Step 2: Implementation</li>
                <li>Step 3: Evaluation and improvement</li>
            </ol>
            
            <h2>Conclusion</h2>
            <p>$title offers numerous benefits and opportunities. By following the guidelines in this article, you can successfully implement $title in your projects.</p>
        ";
    }
}