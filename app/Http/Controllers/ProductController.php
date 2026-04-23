<?php

namespace App\Http\Controllers;
use OpenAI;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Product;
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

class ProductController extends Controller
{
    function index(){
        $products=Product::latest()->paginate(20);
       return view('admin_panal.product.index',compact('products'));
    }
public function store(Request $request)
{
    // ✅ Validation
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric',
        'stock' => 'nullable|integer',
        'category' => 'nullable|string',
        'description' => 'nullable|string',

        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'additional_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
    ]);

    // ✅ Final Price
    $discount = $request->discount ?? 0;
    $final_price = $request->price - ($request->price * $discount / 100);

    // ✅ Storage Path (same as your blog)
    $storagePath = $_SERVER['DOCUMENT_ROOT'].'/storage/products';

    if (!file_exists($storagePath)) {
        mkdir($storagePath, 0755, true);
    }

    // ✅ Single Image
    $imagePath = null;
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move($storagePath, $filename);

        $imagePath = 'storage/products/'.$filename; // public URL
    }

    // ✅ Multiple Images
    $additionalImages = [];
    if ($request->hasFile('additional_images')) {
        foreach ($request->file('additional_images') as $file) {
            if ($file->isValid()) {
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move($storagePath, $filename);

                $additionalImages[] = 'storage/products/'.$filename;
            }
        }
    }

    // ✅ Save Data
    $product = new Product();
    $product->name = $request->name;
    $product->slug = Str::slug($request->name);
    $product->description = $request->description;
    $product->rating = $request->rating ?? 0;
    $product->price = $request->price;
    $product->discount = $discount;
    $product->final_price = $final_price;
    $product->stock = $request->stock ?? 0;
    $product->category = $request->category;
    $product->image = $imagePath;
    $product->additional_images = json_encode($additionalImages);
    $product->is_active = $request->is_active ? 1 : 0;

    $product->save();
   Cache::increment('blog_cache_version');

    return back()->with('success', 'Product added successfully!');
}

 function eid($id){
   $product=Product::find($id);
   return view('admin_panal.product.eid',compact('product'));
 }
 public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'price' => 'required',
    ]);

    $discount = $request->discount ?? 0;
    $final_price = $request->price - ($request->price * $discount / 100);

    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->discount = $discount;
    $product->final_price = $final_price;
    $product->stock = $request->stock;
    $product->category = $request->category;
      $product->rating = $request->rating;
    // Image update
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move($_SERVER['DOCUMENT_ROOT'].'/storage/products', $filename);

        $product->image = 'storage/products/'.$filename;
    }

    $product->save();
   Cache::increment('blog_cache_version');

    return redirect()->route('admin.product')->with('success', 'Product updated successfully!');
}

 function delete($id){
    $product = Product::findOrFail($id);
   $product->delete();
   Cache::increment('blog_cache_version');

    return redirect()->route('admin.product')->with('success', 'Product deleted successfully!');

 }
}
