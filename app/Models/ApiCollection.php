<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiCollection extends Model
{
    //
    protected $table="api_doc_collections";
    protected $fillable = [
        'actions',
        'name',
    ];
    public function resources()
    {
        return $this->hasMany(ApiDocResource::class, 'api_doc_collection_id');
    }
}
