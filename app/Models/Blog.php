<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Facades\Cache; 
class Blog extends Model
{
    //
      public function Category()
    {
        return $this->belongsTo(Category::class, 'category');
    }
    public function seo()
{
    return $this->hasOne(BlogSeo::class, 'blog_id');
}
// In app/Models/Blog.php
public static function clearHomepageCache()
{
    $currentVersion = Cache::get('blog_cache_version', 1);
    Cache::put('blog_cache_version', $currentVersion + 1, 86400); // 24 hours expiry for version
}
}
