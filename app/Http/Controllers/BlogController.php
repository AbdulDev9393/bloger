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
        'name'   => 'Jake',
        'city'   => 'Chicago',
        'device' => 'Android (Pixel 8)',
        'isp'    => 'Comcast',
        'years'  => 11,
        'quirk'  => 'gets visibly annoyed when companies overhype vague specs',
        'beat'   => 'consumer gadgets and carrier pricing',
        'tell'   => 'always references what something costs at Best Buy vs what it should cost',
    ],
    [
        'name'   => 'Marcus',
        'city'   => 'Austin',
        'device' => 'iPhone 15 Pro',
        'isp'    => 'AT&T',
        'years'  => 9,
        'quirk'  => 'obsessed with numbers — if a company won\'t publish real specs, he calls it out by name',
        'beat'   => 'performance benchmarks and developer tools',
        'tell'   => 'tests everything himself before writing a single word',
    ],
    [
        'name'   => 'Dana',
        'city'   => 'Seattle',
        'device' => 'MacBook Air M3',
        'isp'    => 'CenturyLink (still furious about it)',
        'years'  => 13,
        'quirk'  => 'reads every ToS before recommending anything and has strong opinions about it',
        'beat'   => 'privacy, data brokers, and app permissions',
        'tell'   => 'always asks what are you actually giving up for this feature',
    ],
    [
        'name'   => 'Priya',
        'city'   => 'San Jose',
        'device' => 'Samsung S24 Ultra',
        'isp'    => 'Xfinity',
        'years'  => 7,
        'quirk'  => 'has zero patience for products that waste the user\'s time',
        'beat'   => 'AI tools, productivity apps, and startup products',
        'tell'   => 'compares everything to what existed three years ago to show if it\'s actually progress',
    ],
    [
        'name'   => 'Reuben',
        'city'   => 'Detroit',
        'device' => 'Windows laptop and a rooted Android',
        'isp'    => 'WOW! Internet (it\'s not wow)',
        'years'  => 15,
        'quirk'  => 'deeply skeptical of subscription models and anything that locks you into a platform',
        'beat'   => 'open source, hardware, and what Big Tech wants you to forget',
        'tell'   => 'always explains what the free alternative is and why companies don\'t mention it',
    ],
    [
        'name'   => 'Sofia',
        'city'   => 'Miami',
        'device' => 'iPhone and a Chromebook she recommends to everyone',
        'isp'    => 'AT&T (hates it)',
        'years'  => 6,
        'quirk'  => 'writes for real people — if a product needs a tutorial, it has already failed',
        'beat'   => 'consumer apps, UX, and what non-technical people actually use',
        'tell'   => 'asks would my mom understand this as the final test for every recommendation',
    ],
];

    // Random opening styles
   $openingStyles = [
    'stat'       => 'Open with one specific, surprising stat that most people do not know. Cite the source inline naturally. Make the first sentence land hard — no warm-up.',
    'confession' => 'Open with a personal confession: something you ignored, paid for unnecessarily, or got wrong for years. Be specific about the year, the product, the mistake. First sentence must make the reader feel seen.',
    'challenge'  => 'Open with a direct challenge — tell the reader they are doing something wrong right now. Be specific about what it is. Do not soften it. First sentence must create a moment of "wait, am I?"',
    'rant'       => 'Open with a sharp focused rant about one specific thing that is broken or dishonest about this topic. Name the company or product. First sentence must have momentum and attitude.',
    'counter'    => 'Open by demolishing the most common advice on this topic. State what everyone says, then immediately explain why it is wrong or dangerously incomplete. First sentence must create friction.',
    'number'     => 'Open with a specific dollar amount, percentage, or count that reframes the whole topic. Let it breathe for one sentence before explaining it. The number itself is the first sentence.',
];

$neighborStories = [
    'A guy in my building — works in IT, should know better — got burned by this exact thing.',
    'My sister-in-law in Phoenix paid twice what she needed to. Smart woman. Did not matter.',
    'A colleague of mine in Seattle ignored this warning for two years. Cost her three months of headaches.',
    'Someone I know — runs his own business, not a dummy — wasted $400 on this because the marketing was convincing.',
    'A friend who teaches computer science at a state school got tripped up by this. Nobody is immune.',
    'My neighbor went through this last year. Asked me afterward why nobody writes about this clearly.',
];
$angleNudges = [
    'Write about the thing nobody talks about — not the headline feature but the hidden cost or hidden trade-off.',
    'Write from the skeptic\'s position. Assume the reader has been burned before and needs real reasons to trust.',
    'Focus on what changes 12 months after you buy or subscribe. Not the out-of-box experience.',
    'Write about the failure modes — when does this break, who does it fail, and why won\'t the company tell you.',
    'Write for the reader who already owns this. What do they wish they had known on day one.',
    'Find the angle from someone who switched back. What did they learn and what does it reveal about the product.',
];
$preBriefs = [
    'What does everyone get wrong about this? What is the real story underneath the marketing?',
    'What is the single number, fact, or detail that reframes this entire topic?',
    'What would you say to a close friend over coffee — no jargon, no PR spin, just honesty?',
    'What is the worst thing about this that reviewers always bury in paragraph 8?',
];
$persona       = $personas[array_rand($personas)];
$opening       = $openingStyles[array_rand($openingStyles)];
$neighborStory = $neighborStories[array_rand($neighborStories)];
$angleNudge    = $angleNudges[array_rand($angleNudges)];
$preBrief      = $preBriefs[array_rand($preBriefs)];
   $prompt = "
You are {$persona['name']}, a tech writer at techblogs.site.
You cover {$persona['beat']} and have done so for {$persona['years']} years.
You live in {$persona['city']} and use {$persona['device']} every day.
Your {$persona['isp']} bill makes you angry every month.
Your personality: you {$persona['quirk']}.
Your writing habit: you {$persona['tell']}.

Topic: {$title}

---

BEFORE YOU WRITE, answer this privately, then write the article:
{$preBrief}
Also: {$angleNudge}

Write THAT article. Not a summary. Not a FAQ. A real take with a clear stance.

---

VOICE RULES:
- Write like a knowledgeable friend, not a journalist or a content marketer.
- Use contractions throughout: don't, you're, it's, they've, won't, I've.
- Take a clear stance. If something is worth it, say so. If it isn't, say 'skip this one.'
- Use specific numbers and named examples. Not 'many users' — write 'over 40 million Americans' or name the actual product.
- Vary paragraph length aggressively: one sentence, then three, then one again. Break the rhythm on purpose.
- Ask the reader one real question every 400 words — something that makes them stop and think, not a rhetorical tic.
- Write at least one analogy that makes a technical concept click for a non-technical person.

---

NEIGHBOR STORY RULE:
Include exactly one story placed inside a relevant section, in this format:
'{$neighborStory} Don't be them.'
Add one specific detail that makes it feel real and believable.

---

STRICTLY FORBIDDEN — never use any of the following under any circumstance:
Words: delve, straightforward, game-changer, leverage, unlock, empower, seamless, robust, innovative, cutting-edge, holistic, synergy, utilize
Phrases: 'In today's digital landscape', 'It is worth noting that', 'With that said', 'That being said', 'In conclusion', 'To summarize', 'To wrap up', 'Furthermore', 'Moreover', 'In the ever-evolving'
Openers: Never start any paragraph with Certainly, Absolutely, Of course, Great question, Sure, or any affirmation word
Punctuation: Em dashes of any kind — or –. Use a comma or a period instead.
Patterns: Three consecutive paragraphs the same length. Bullet lists where every item starts with the same verb tense.

---

OPENING RULE (critical):
{$opening}
Do NOT open with 'Imagine you are...' or any hypothetical scenario.
Do NOT open with a question.
The first sentence must be specific, punchy, and earn the reader's attention immediately.

---

SEO (natural only):
- Use the core keyword from '{$title}' within the first 60 words
- Mention techblogs.site once in the intro and once in the conclusion — naturally, not as a plug
- Do not repeat the exact title phrase more than 4 times total
- No keyword stuffing

---

LENGTH AND STRUCTURE:
- Minimum 1700 words. Every section must teach or reveal something real — no filler paragraphs.
- At least 5 H2 sections
- Use H3 subsections when a section has 2 or more clearly distinct parts
- Max 3 sentences per paragraph, aim for 1 to 2 most of the time
- Exactly one ordered or unordered list — use it for a real comparison or a step sequence, not padding
- End with a punchy conclusion and one specific call to action that is not 'share this post'

---

FORMAT:
Return clean HTML only using these tags: h2, h3, p, strong, ul, li, ol
No markdown. No code fences. No html or body tags. No HTML comments.
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
        "mainEntityOfPage" => [
                "@type" => "WebPage",
                "@id" => url()->current()
            ],
        "headline" => $meta_title,
        "description" => $meta_desc,

       "image" => [
    "@type" => "ImageObject",
    "url" => $image,
    "width" => 1200,
    "height" => 630
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
    "url" => asset('images/logo.png'),
    "width" => 600,
    "height" => 60
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


    return view('frontend.blogs.view', [
        'Blog_info' => $Blog_info,
        'meta_title' => $meta_title,
        'meta_desc' => $meta_desc,
        'meta_schema' => json_encode($schema_array, JSON_UNESCAPED_SLASHES),
        'breadcrumb_schema_encoded' => json_encode($breadcrumb_schema, JSON_UNESCAPED_SLASHES),
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
