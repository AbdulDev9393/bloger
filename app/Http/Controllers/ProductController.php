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
        'price' => 'required|numeric|min:0',
        'discount' => 'nullable|numeric|min:0|max:100',
        'stock' => 'nullable|integer|min:0',
        'category' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'rating' => 'nullable|numeric|min:0|max:5',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'additional_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        'is_active' => 'nullable|boolean'
    ]);

    // ✅ Calculate Final Price
    $discount = $request->discount ?? 0;
    $final_price = $request->price - ($request->price * $discount / 100);

    // ✅ Storage Path
    $imagePath = null;
    $additionalImages = [];

    // ✅ Single Image with WebP Conversion
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $webpPath = $this->convertToWebP($request->file('image'), 'products');
        $imagePath = $webpPath;
    }

    // ✅ Multiple Images with WebP Conversion
    if ($request->hasFile('additional_images')) {
        foreach ($request->file('additional_images') as $file) {
            if ($file->isValid()) {
                $webpPath = $this->convertToWebP($file, 'products');
                if ($webpPath) {
                    $additionalImages[] = $webpPath;
                }
            }
        }
    }

    // ✅ Generate Unique Slug
    $slug = Str::slug($request->name);
    $originalSlug = $slug;
    $counter = 1;

    while (Product::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $counter;
        $counter++;
    }

    // ✅ Save Data
    $product = new Product();
    $product->name = $request->name;
    $product->slug = $slug;
    $product->description = $request->description;
    $product->rating = $request->rating ?? 0;
    $product->price = $request->price;
    $product->discount = $discount;
    $product->final_price = $final_price;
    $product->stock = $request->stock ?? 0;
    $product->category = $request->category;
    $product->image = $imagePath;
    $product->additional_images = !empty($additionalImages) ? json_encode($additionalImages) : null;
    $product->is_active = $request->has('is_active') ? 1 : 0;

    // Add SEO fields
    $product->meta_title = $request->meta_title ?? $request->name;
    $product->meta_description = $request->meta_description ?? Str::limit(strip_tags($request->description ?? ''), 155);

    $product->save();

    // Clear cache properly
    Cache::forget('products_list');
    Cache::increment('blog_cache_version');

    return redirect()->route('products.index')
        ->with('success', 'Product added successfully!');
}

/**
 * Convert image to WebP format
 *
 * @param \Illuminate\Http\UploadedFile $image
 * @param string $folder
 * @param int $quality
 * @return string|null
 */
private function convertToWebP($image, $folder = 'products', $quality = 80)
{
    try {
        // Create directory if not exists
        $uploadPath = public_path('storage/' . $folder);
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Generate unique filename
        $filename = time() . '_' . Str::random(10) . '.webp';
        $webpPath = $uploadPath . '/' . $filename;

        // Get image resource based on type
        $sourceImage = null;
        $imageType = exif_imagetype($image->getRealPath());

        switch ($imageType) {
            case IMAGETYPE_JPEG:
                $sourceImage = imagecreatefromjpeg($image->getRealPath());
                break;
            case IMAGETYPE_PNG:
                $sourceImage = imagecreatefrompng($image->getRealPath());
                // Preserve transparency for PNG
                imagepalettetotruecolor($sourceImage);
                imagealphablending($sourceImage, true);
                imagesavealpha($sourceImage, true);
                break;
            case IMAGETYPE_WEBP:
                $sourceImage = imagecreatefromwebp($image->getRealPath());
                break;
            default:
                return null;
        }

        if (!$sourceImage) {
            return null;
        }

        // Convert and save as WebP
        imagewebp($sourceImage, $webpPath, $quality);

        // Free memory
        imagedestroy($sourceImage);

        // Return public path
        return 'storage/' . $folder . '/' . $filename;

    } catch (\Exception $e) {
        \Log::error('WebP Conversion Error: ' . $e->getMessage());
        return null;
    }
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
