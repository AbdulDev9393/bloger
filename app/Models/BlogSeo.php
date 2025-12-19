<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogSeo extends Model
{
    //
    protected $table="blogs_seo";


    
    protected $fillable = [
        'title',
        'Description',
        'blog_id', // ← mass assignment کے لیے شامل کریں
        'org_des', // ← mass assignment کے لیے شامل کریں
        // اگر کوئی اور فیلڈ ہے تو وہ بھی یہاں شامل کریں
    ];
}
