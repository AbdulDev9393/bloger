<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
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
}
