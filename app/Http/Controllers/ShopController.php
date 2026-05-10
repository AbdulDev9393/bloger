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
use App\Services\GoogleMerchantService;
use Google\Service\ShoppingContent\Price;
use App\Models\Product;
use Google\Service\ShoppingContent\Product as GoogleProduct;
class ShopController extends Controller{
   function index(){
        $products = Product::latest()->get();

     return view('frontend.shop.index',compact('products'));

   }
   public function search(Request $request)
{
    $query = $request->q;

    $products = Product::where('name', 'like', "%{$query}%")
        ->orWhere('description', 'like', "%{$query}%")
        ->latest()
        ->get();

    return view('frontend.shop.index', compact('products'));
}



public function uploadProduct()
{
  $items = Product::all();

$results = [];

foreach($items as $item){

    $merchantId = "5784319850";

    $google = new GoogleMerchantService();

    $product = new GoogleProduct();

    $product->setOfferId("Pro".$item->id);
    $product->setTitle($item->name);
$imageUrl = rtrim('https://techblogs.site', '/') . '/' . ltrim($item->image, '/');

dd($imageUrl);
    // ✔ CLEAN DESCRIPTION
    $product->setDescription(strip_tags($item->description));

    $product->setImageLink('https://techblogs.site/' . $item->image);
    $product->setLink("https://techblogs.site/product/".$item->slug);

    $product->setAvailability("in stock");
    $product->setCondition("new");
    $product->setBrand("TechBlogs");

    $product->setChannel("online");
    $product->setContentLanguage("en");
    $product->setTargetCountry("US");

    $price = new Price();
    $price->setValue($item->price);
    $price->setCurrency("USD");

    $product->setPrice($price);

    $results[] = $google->insertProduct($merchantId, $product);
}

return response()->json($results);


}
}
