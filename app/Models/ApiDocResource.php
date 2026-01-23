<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiDocResource extends Model
{
    protected $table = "api_doc_resources";

    protected $fillable = [
        'api_doc_collection_id',
        'name',
        'description',
        'actions',
    ];

    public function collection()
    {
        return $this->belongsTo(ApiCollection::class, 'api_doc_collection_id');
    }

    public function params()
    {
        return $this->hasMany(ApiResourceParam::class, 'api_doc_endpoint_id');
    }
    public function endpoints()
{
    return $this->hasMany(ApiDocEndpoints::class, 'api_doc_resource_id');
}
}

