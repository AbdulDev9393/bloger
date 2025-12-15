<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
class BlogController extends Controller
{
    //
    function index(){
        $categories=Category::latest()->get();
        return view('admin_panal.blogs.index', compact('categories'));

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
    if ($request->hasFile('Thumbnail_Image')) {
        $thumbnailPath = $request->file('Thumbnail_Image')->store('blogs/thumbnails', 'public');
        $blog->Thumbnail_Image = Storage::url($thumbnailPath); // Public URL
    }

    // Banner Image
    if ($request->hasFile('Banner_Image')) {
        $bannerPath = $request->file('Banner_Image')->store('blogs/banners', 'public');
        $blog->Banner_Image = Storage::url($bannerPath); // Public URL
    }

    $blog->save();

    return back()->with('success', 'Blog added successfully!');
}
}
