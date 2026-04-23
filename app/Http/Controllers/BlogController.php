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
use Illuminate\Support\Facades\Cache;
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
public function generateAISeo(Request $request)
{
    $blog = Blog::find($request->blog_id);

    if (!$blog) {
        return response()->json(['error' => 'Blog not found'], 404);
    }

    $content = strip_tags($blog->Description);

$prompt = "
You are a senior SEO strategist and content optimization expert working for high-ranking websites.

Your job is to analyze blog content and generate highly optimized SEO metadata that can rank on Google.

STRICT OUTPUT RULES:
- Return ONLY valid JSON
- No markdown, no backticks, no explanations, no extra text
- Output must be directly usable with json_decode()
- Do not include any additional keys outside the required structure

REQUIRED JSON FORMAT:
{
  \"title\": \"string\",
  \"description\": \"string\",
  \"keywords\": [\"string\",\"string\",\"string\",\"string\",\"string\",\"string\",\"string\",\"string\",\"string\",\"string\"]
}

SEO OPTIMIZATION RULES:

TITLE:
- Max 60 characters
- Must be catchy, human-readable, and SEO-friendly
- Must include the primary keyword naturally (not forced)
- Should increase CTR (click-through rate)

DESCRIPTION:
- Max 160 characters
- Must clearly describe the blog value
- Must include 1–2 strong SEO keywords naturally
- Must be optimized for Google snippet display
- Must encourage clicks

KEYWORDS:
- Exactly 10 keywords (no more, no less)
- All must be lowercase
- Must be highly relevant to the content
- Include mix of:
  - primary keyword
  - long-tail keywords
  - related search terms
- No repetition
- No generic words like: blog, article, post, SEO only, etc.
- Focus on real search intent and ranking terms

CONTENT TO ANALYZE:
\"\"\"{$content}\"\"\"

Now generate the SEO JSON only.
";
 $activeKey = 'ak_27T0ra3EW4kh8Ba7mt7ty8xD3v984';

    $response = Http::withHeaders([
      'Authorization' => 'Bearer ' . $activeKey,
        'Content-Type'  => 'application/json',
    ])->post('https://api.longcat.chat/openai/v1/chat/completions', [
        'model' => 'LongCat-Flash-Chat',
        'messages' => [
            ['role' => 'user', 'content' => $prompt]
        ],
        'temperature' => 0.7,
        'max_tokens' => 1200
    ]);

    $aiText = $response->json()['choices'][0]['message']['content'] ?? null;

    // 🧠 JSON decode safe
    $seo = json_decode($aiText, true);

    if (!$seo) {
        return response()->json([
            'error' => 'Invalid AI response',
            'raw' => $aiText
        ]);
    }

    return response()->json([
        'title' => $seo['title'] ?? '',
        'description' => $seo['description'] ?? '',
        'keywords' => implode(', ', $seo['keywords'] ?? [])
    ]);
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
     if($request->Status=="published"){
                 Blog::clearHomepageCache();
         }
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
   Cache::increment('blog_cache_version');
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

    // Random personas to avoid repetition
    $personas = [
        [
            'name' => 'Jake',
            'city' => 'Chicago',
            'device' => 'Android',
            'isp' => 'Comcast',
            'years' => 11,
            'quirk' => 'gets annoyed when companies overhype things'
        ],
        [
            'name' => 'Marcus',
            'city' => 'Austin',
            'device' => 'iPhone',
            'isp' => 'AT&T',
            'years' => 9,
            'quirk' => 'obsessed with performance benchmarks and hates vague specs'
        ],
        [
            'name' => 'Dana',
            'city' => 'Seattle',
            'device' => 'MacBook',
            'isp' => 'CenturyLink',
            'years' => 13,
            'quirk' => 'privacy advocate who tests every app before recommending it'
        ],
    ];

    // Random opening styles
    $openingStyles = [
        'stat' => 'Open with a specific surprising stat that most people do not know. Make it feel urgent.',
        'confession' => 'Open with a personal confession: something you ignored or got wrong for years.',
        'challenge' => 'Open with a direct challenge to the reader — tell them they are doing something wrong right now.',
        'rant' => 'Open with a short sharp rant about something broken or dishonest in this topic area.',
    ];

    // Random neighbor story locations
    $neighborStories = [
        'My neighbor in Chicago paid full price for this.',
        'A colleague of mine in Seattle fell for this exact trap.',
        'Someone in my building in Austin wasted $300 on this.',
        'A friend of mine — smart guy, works in finance — got burned by this.',
    ];

    $persona = $personas[array_rand($personas)];
    $opening = $openingStyles[array_rand($openingStyles)];
    $neighborStory = $neighborStories[array_rand($neighborStories)];

    $prompt = "
You are {$persona['name']}, a tech writer at techblogs.site.
You have been covering consumer tech for {$persona['years']} years.
You live in {$persona['city']}. You use {$persona['device']}.
Your {$persona['isp']} bill makes you angry every month.
Your personality: you {$persona['quirk']}.

Write a full, honest blog post on this topic: {$title}

---

BEFORE YOU WRITE, think through:
- What is the single most surprising or counterintuitive thing about this topic?
- What mistake do most people make with this?
- What would you say to a friend asking about this over coffee — not to a press release?

Write THAT article. Not a summary. Not a list of facts. A real take.

---

VOICE RULES:
- Write like a knowledgeable friend, not a journalist or copywriter.
- Use contractions everywhere: don't, you're, it's, they've, won't.
- Take a clear stance. If something is worth it, say so. If it's not, say 'Skip this one.'
- Use specific numbers and named examples. Not 'many users' — say 'over 40 million Americans' or cite a real product.
- Include ONE personal aside per major section. Use this exact story style: '{$neighborStory} Don't be them.'
- Vary paragraph lengths aggressively: one sentence, then two, then one again. Break the rhythm.
- Ask the reader a real question once every 400 words. Not 'Like if you agree!' — something that makes them think.

---

STRICTLY FORBIDDEN — do not use any of these under any circumstance:
- 'In today's digital landscape' or any version of it
- 'delve' / 'straightforward' / 'game-changer' / 'leverage' / 'unlock' / 'empower'
- Em dashes of any kind
- 'Furthermore' / 'Moreover' / 'In conclusion' / 'To summarize' / 'To wrap up'
- Three paragraphs in a row that are the same length
- Bullet lists where every item starts with a verb in the same tense
- 'It is worth noting that...'
- 'With that said' / 'That being said'
- Repeating the same opening phrase pattern used in other articles

---

OPENING RULE (critical):
{$opening}
Do NOT start with 'Imagine you are...' or any fictional scenario.
The first sentence must be punchy, specific, and earn the reader's attention immediately.

---

UNIQUE CONTENT RULE:
Every article must feel like it was written by a different person on a different day.
Do NOT reuse any phrasing, structure, or examples from previous articles.
If the topic overlaps with social media, design, or tech blogs — approach it from a completely fresh angle.
Find the angle no one else is writing about.

---

SEO (natural only):
- Use the core keyword from '{$title}' within the first 60 words
- Mention techblogs.site once in the intro and once in the conclusion — naturally
- Do not repeat the exact title phrase more than 4 times
- Do not stuff keywords

---

LENGTH & STRUCTURE:
- Minimum 1600 words. Every section must teach or reveal something real.
- At least 5 H2 sections
- Use H3 for subsections when a section has 2 or more distinct parts
- Max 3 sentences per paragraph (mostly 1 to 2)
- Include exactly one ordered or unordered list — use it for steps or comparisons, not padding
- End with a punchy conclusion and a genuine call to action (not 'share this post')

---

FORMAT:
Return clean HTML only using these tags: h2, h3, p, strong, ul, li, ol
No markdown. No code fences. No html or body tags.
Write the complete article from the first word to the last. Do not stop early.
";

    $activeKey = 'ak_27T0ra3EW4kh8Ba7mt7ty8xD3v984';

    $response = Http::timeout(120)->withHeaders([
        'Authorization' => 'Bearer ' . $activeKey,
        'Content-Type'  => 'application/json',
    ])->post('https://api.longcat.chat/openai/v1/chat/completions', [
        'model'       => 'LongCat-Flash-Chat',
        'messages'    => [
            ['role' => 'system', 'content' => "You are a sharp, opinionated tech writer. You write honest, specific, human articles. You never repeat yourself across articles. Every piece must feel fresh."],
            ['role' => 'user', 'content' => $prompt]
        ],
        'temperature' => 1.0,
        'max_tokens'  => 4000
    ]);

    if (!$response->successful()) {
        return response()->json([
            'status'  => false,
            'message' => 'API request failed',
            'debug'   => $response->body()
        ], 500);
    }

    $data = $response->json();
    $contentHtml = data_get($data, 'choices.0.message.content');

    if (!$contentHtml) {
        return response()->json([
            'status'  => false,
            'message' => 'Empty content from AI',
            'debug'   => $data
        ], 500);
    }

    // Cleanup
    $contentHtml = trim($contentHtml);
    $contentHtml = preg_replace('/^```html\s*/i', '', $contentHtml);
    $contentHtml = preg_replace('/\s*```$/i', '', $contentHtml);
    $contentHtml = str_replace(
        ['—', '–', '&#8212;', '&#8211;', '&mdash;', '&ndash;'],
        [' ', ' ', ' ', ' ', ' ', ' '],
        $contentHtml
    );

    return response()->json([
        'status'  => true,
        'title'   => $title,
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
    if($request->Status=="published"){
                 Blog::clearHomepageCache();
         }
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
Cache::increment('blog_cache_version');
    return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully!');
}   // JSON-LD schema as array


public function search(Request $request)
{
    $query = $request->get('query');

    $categories = Category::latest()->get();

    $blogs = Blog::when($query, function ($q) use ($query) {
        $q->where('name', 'LIKE', "%{$query}%")
          ->orWhere('description', 'LIKE', "%{$query}%")
          ->orWhere('category', 'LIKE', "%{$query}%");
    })->latest()->paginate(30);

    $allblogs = $blogs->total();

    return view('admin_panal.blogs.index', compact('blogs', 'categories', 'allblogs'));
}
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

     Cache::increment('blog_cache_version');
    return back()->with('success', 'Blog deleted successfully');
}
public function blogView($slug)
{
    $Blog_info = Blog::where('slug', $slug)->firstOrFail();
    $seo = BlogSeo::where('blog_id', $Blog_info->id)->first();

    // Meta
    $meta_title = $seo->title ?? ($Blog_info->name ?? 'DailyBlogs');
    $meta_desc = $seo->Description ?? Str::limit(strip_tags($Blog_info->description ?? ''), 160);

    // Image (IMPORTANT: only one main image for Google)
    $image = $Blog_info->Thumbnail_Image
        ? asset($Blog_info->Thumbnail_Image)
        : asset('storage/default.png');

    // Author
    $authorName = $Blog_info->Author ?? 'Admin';

    // Word count
    $wordCount = str_word_count(strip_tags($Blog_info->description ?? ''));

    // ✅ MAIN SCHEMA (CLEAN)
    $schema_array = [
        "@context" => "https://schema.org",
        "@type" => "BlogPosting",

        "@id" => url()->current(),
        "mainEntityOfPage" => url()->current(),

        "headline" => $meta_title,
        "description" => $meta_desc,

        "image" => [
            "@type" => "ImageObject",
            "url" => $image
        ],

        "author" => [
            "@type" => "Person",
            "name" => $authorName
        ],

        "publisher" => [
            "@type" => "Organization",
            "name" => "TechBlogs",
            "logo" => [
                "@type" => "ImageObject",
                "url" => asset('images/logo.png')
            ]
        ],

        "datePublished" => optional($Blog_info->created_at)->toIso8601String(),
        "dateModified" => optional($Blog_info->updated_at)->toIso8601String(),

        "articleBody" => strip_tags($Blog_info->description ?? ''),
        "wordCount" => $wordCount,

        "inLanguage" => "en"
    ];

    // ✅ Breadcrumb FIX (IMPORTANT ❗)
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
                "item" => route('frontend.blogs')
            ],
            [
                "@type" => "ListItem",
                "position" => 3,
                "name" => $meta_title,
                "item" => url()->current()
            ]
        ]
    ];

    // ✅ FAQ (only if valid format)
    $faq_schema = null;
    if ($seo && $seo->faq_data) {
        $faqData = json_decode($seo->faq_data, true);

        if (is_array($faqData)) {
            $faq_schema = [
                "@context" => "https://schema.org",
                "@type" => "FAQPage",
                "mainEntity" => $faqData
            ];
        }
    }

    return view('frontend.blogs.view', [
        'Blog_info' => $Blog_info,
        'meta_title' => $meta_title,
        'meta_desc' => $meta_desc,
        'meta_schema' => json_encode($schema_array, JSON_UNESCAPED_SLASHES),
        'breadcrumb_schema_encoded' => json_encode($breadcrumb_schema, JSON_UNESCAPED_SLASHES),
        'faq_schema_encoded' => $faq_schema ? json_encode($faq_schema, JSON_UNESCAPED_SLASHES) : null,
        'meta_keywords' => $seo->keywords ?? ''
    ]);
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
