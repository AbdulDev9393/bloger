<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiDocEndpoints extends Model
{
    //
     protected $table="api_doc_endpoints";
      protected $fillable = [
        'api_doc_resource_id',
        'name',
        'type',
        'description',
        'url',
        'request_sample',
        'response_sample',
        'actions',
    ];
     public function params()
    {
        return $this->hasMany(ApiResourceParam::class, 'api_doc_endpoint_id');
    }
}
