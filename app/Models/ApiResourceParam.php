<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class ApiResourceParam extends Model
{
    protected $table = "api_doc_prams";

    protected $fillable = [
        'api_doc_endpoint_id',
        'name',
        'type',
        'required',
        'description'
    ];

    public function resource()
    {
        return $this->belongsTo(ApiDocResource::class, 'api_doc_endpoint_id');
    }
    public function endpoint()
{
    return $this->belongsTo(ApiDocEndpoints::class, 'api_doc_endpoint_id');
}
}