<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache; // ✅ Yeh add karo
use App\Models\Category;

class Blog extends Model
{
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function seo()
    {
        return $this->hasOne(BlogSeo::class, 'blog_id');
    }

    // ✅ booted() ke andar sirf static callbacks hain
    protected static function booted()
    {
        static::created(function ($blog) {
            self::clearIndexCache();
        });

        static::updated(function ($blog) {
            self::clearIndexCache();
        });

        static::deleted(function ($blog) {
            self::clearIndexCache();
        });
    }

    // ✅ clearIndexCache() booted() se BAHAR hai — class level par
    public static function clearIndexCache()
    {
        $cacheVersion = Cache::get('blog_cache_version', 1);
        Cache::increment('blog_cache_version');
        Cache::forget('index_page_data_v' . $cacheVersion);
    }
}
