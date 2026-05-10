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
    $merchantId = "5784319850";

    $google = new GoogleMerchantService();

    $product = new GoogleProduct();

    $product->setOfferId("TEST-001");

    $product->setTitle("Honda Civic Brake Pad");

    $product->setDescription("High quality brake pad for Honda Civic");

   $product->setImageLink("https://yourdomain.com/test.jpg");
$product->setLink("https://yourdomain.com/product/test");

   $product->setAvailability("in stock");

    $product->setCondition("new");

    $product->setBrand("Honda");
$product->setChannel("online");
$product->setContentLanguage("en");
$product->setTargetCountry("US");
    $price = new Price();

    $price->setValue("100");

    $price->setCurrency("USD");

    $product->setPrice($price);

    $result = $google->insertProduct($merchantId, $product);

    return response()->json($result);
}
}
