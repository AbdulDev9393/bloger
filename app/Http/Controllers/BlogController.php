<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\BlogSeo;
use Illuminate\Support\Facades\Storage;
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
        'Description' => 'required|string',
        'Thumbnail_Image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        'Banner_Image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:4096',
    ]);

    $blog = new Blog;
    $blog->name = $request->name;
    $blog->category = $request->category;
    $blog->Status = $request->Status;
    $blog->Description = $request->Description;

   // Thumbnail Image
if ($request->hasFile('Thumbnail_Image') && $request->file('Thumbnail_Image')->isValid()) {
    $file = $request->file('Thumbnail_Image');
    $filename = time().'_'.$file->getClientOriginalName();
    $destinationPath = public_path('storage/blogs'); // public/storage/blogs/thumbnails
    $file->move($destinationPath, $filename);
    $blog->Thumbnail_Image = 'storage/blogs/'.$filename; // Public URL
}

// Banner Image
if ($request->hasFile('Banner_Image') && $request->file('Banner_Image')->isValid()) {
    $file = $request->file('Banner_Image');
    $filename = time().'_'.$file->getClientOriginalName();
    $destinationPath = public_path('storage/blogs'); // public/storage/blogs/banners
    $file->move($destinationPath, $filename);
    $blog->Banner_mage = 'storage/blogs/'.$filename; // Public URL
}

$blog->save();


    return back()->with('success', 'Blog added successfully!');
}
  function eid($id){
    $blog = Blog::find($id);
    return view('admin_panal.blogs.edit',compact('blog'));

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
    ]);

    $blog = Blog::findOrFail($id);
    $blog->name = $request->name;
    $blog->category = $request->category;
    $blog->Status = $request->Status;
    $blog->Description = $request->Description;

    // Thumbnail Image
    if ($request->hasFile('Thumbnail_Image') && $request->file('Thumbnail_Image')->isValid()) {
        // Delete old image if exists
        if ($blog->Thumbnail_Image && file_exists(public_path($blog->Thumbnail_Image))) {
            unlink(public_path($blog->Thumbnail_Image));
        }
        $file = $request->file('Thumbnail_Image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('storage/blogs'), $filename);
        $blog->Thumbnail_Image = 'storage/blogs/'.$filename;
    }

    // Banner Image
    if ($request->hasFile('Banner_Image') && $request->file('Banner_Image')->isValid()) {
        // Delete old image if exists
        if ($blog->Banner_Image && file_exists(public_path($blog->Banner_Image))) {
            unlink(public_path($blog->Banner_Image));
        }
        $file = $request->file('Banner_Image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('storage/blogs'), $filename);
        $blog->Banner_mage = 'storage/blogs/'.$filename;
    }

    $blog->save();

    return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully!');
}
 public function delete(Request $request, $id)
{
    $blog = Blog::findOrFail($id); // record fetch کریں
    // Optional: old images delete کریں
    if ($blog->Thumbnail_Image && file_exists(public_path($blog->Thumbnail_Image))) {
        unlink(public_path($blog->Thumbnail_Image));
    }
    if ($blog->Banner_mage && file_exists(public_path($blog->Banner_mage))) {
        unlink(public_path($blog->Banner_mage));
    }

    $blog->delete(); // delete record

    return redirect()->route('admin.blogs')->with('success', 'Blog deleted successfully!');
}
public function search(Request $request) {
    $query = $request->input('query');

    $blogs = Blog::with('Category')
                ->where('name', 'LIKE', "%{$query}%")
                ->orWhere('Description', 'LIKE', "%{$query}%")
                ->latest()
                ->paginate(10);

    $allblogs=blog::count();
   
    $categories = Category::latest()->get();
   
    return view('admin_panal.blogs.index', compact('blogs', 'categories','allblogs'));
}

 function blog_seo($id){
    $blog=Blog::find($id);
    $blog_seo = BlogSeo::where('blog_id', $id)->first();
   
    return view('admin_panal.blogs.blogs_seo.index',compact('blog','blog_seo'));

 }

public function blog_seo_update(Request $request, $id)
{
    // Validate inputs
    $request->validate([
        'meta_title' => 'required|string|max:60',
        'meta_description' => 'nullable|string|max:160',
    ]);

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
public function blog_view($id){
    $seo = BlogSeo::where('blog_id', $id)->first();

    $meta_title = $seo->title ?? 'daliyblogs';
    $meta_desc  = $seo->Description ?? 'Read latest blogs on daliyblogs';
    
    $Blog_info = Blog::find($id);
 
    // JSON-LD schema as array
    $schema_array = [
        "@context" => "https://schema.org",
        "@type" => "BlogPosting",
        "headline" => $meta_title,
        "image" => $Blog_info->Thumbnail_Image ? asset($Blog_info->Thumbnail_Image) : asset('storage/default.png'),
        "datePublished" => $Blog_info->created_at?->toIso8601String() ?? now()->toIso8601String(),
        "dateModified" => $Blog_info->updated_at?->toIso8601String() ?? now()->toIso8601String(),
        "author" => [
            "@type" => "Person",
            "name" => $Blog_info->Author ?? 'Admin'
        ],
        "publisher" => [
            "@type" => "Organization",
            "name" => "daliyblogs",
            "logo" => [
                "@type" => "ImageObject",
                "url" => asset('storage/sitelogo.png')
            ]
        ],
        "description" => $meta_desc
    ];

    // Encode as JSON safely
    $meta_schema = json_encode($schema_array, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

    return view('frontend.blogs.view', compact('Blog_info', 'meta_desc', 'meta_title', 'meta_schema'));
}

}
