<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;
use App\Models\ApiCollection;
use App\Models\ApiDocResource;
use App\Models\ApiResourceParam;
use App\Models\ApiDocEndpoints;
class ZpaydVoController extends Controller
{
    //
    public function index()
{
     $collections = ApiCollection::with('resources.params')->get();

    // ApiDocEndpoints table ka sab se pehla record (static)
    $endpoint = ApiDocEndpoints::with('params')->first();

    return view('VopaySetup.index', compact('collections', 'endpoint'));
}

    function admin_index(){
         $collections=ApiCollection::all();
        return view('VopaySetup.admin.main_page', compact('collections'));
    }
     public function addCollection(Request $request)
    {
        // Validate input
     

        try {
            // Create new collection
            $resource = ApiCollection::create([
                'name' => $request->name,
                'actions' => $request->description, // now match input
            ]);
         
            return response()->json([
                'success' => true,
                'resource' => [
                    'id'                 => $resource->id,
                    'name'               => $resource->name,
                    'description'        => $resource->description,
                    'actions'            => $resource->actions,
                    'collection_name'    => $resource->collection->name ?? '-'
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ]);
        }
    }
public function resurcePage($id)
{
    $resources = ApiDocResource::where('api_doc_collection_id', $id)->get();
    $collections = ApiCollection::find($id);


    return view('VopaySetup.admin.resurces', compact('resources', 'collections'));
}
function endpoint($id){
            $resources = ApiDocEndpoints::where('api_doc_resource_id', $id)->get();
    $collections = ApiDocResource::find($id);


    return view('VopaySetup.admin.andpoint', compact('resources', 'collections'));
}
    public function storeApiResource(Request $request)
        {
            // Validation
            $request->validate([
                'api_doc_collection_id' => 'required|integer',
                'name'        => 'required|string|max:255',
                'description' => 'nullable|string',
                'actions'     => 'required|string', // endpoints
            ]);

            try {
                $resource = ApiDocResource::create([
                    'api_doc_collection_id' => $request->api_doc_collection_id,
                    'name'        => $request->name,
                    'description' => $request->description,
                    'actions'     => $request->actions,
                ]);
                
                return response()->json([
                    'success'  => true,
                    'resource' => $resource
                ]);

            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Resource save nahi ho saka',
                    'error'   => $e->getMessage()
                ], 500);
            }
        }
        public function resourceParamsPage($id)
    {
        $resource = ApiDocEndpoints::findOrFail($id);
        $params = $resource->params ?? []; // relation to be defined in model
        return view('VopaySetup.admin.ad_params', compact('resource', 'params'));
    }

    // Store API Resource Parameter
public function storeApiResourceParam(Request $request)
{
    

    $param = ApiResourceParam::create([
        'api_doc_endpoint_id' => $request->api_doc_resource_id, // ✅ table کا correct column
        'name'                => $request->param_name,
        'type'                => $request->param_type,
        'required'            => $request->required,
        'description'         => $request->description,
    ]);

    return response()->json([
        'success' => true,
        'param'   => $param
    ]);
}
public function destroy($id)
{
    $collection = ApiCollection::find($id);

    if (!$collection) {
        return response()->json([
            'success' => false,
            'message' => 'Collection not found'
        ], 404);
    }

    $deletedData = $collection->toArray();
    $collection->delete();

    return response()->json([
        'success' => true,
        'deleted' => $deletedData
    ]);
}
function endpoint_delete($id){
$collection = ApiDocEndpoints::find($id);

    if (!$collection) {
        return response()->json([
            'success' => false,
            'message' => 'Collection not found'
        ], 404);
    }

    $deletedData = $collection->toArray();
    $collection->delete();

    return response()->json([
        'success' => true,
        'deleted' => $deletedData
    ]);
}


public function destroy_resource($id)
{
    $collection = ApiDocResource::find($id);

    if (!$collection) {
        return response()->json([
            'success' => false,
            'message' => 'Collection not found'
        ], 404);
    }

    $deletedData = $collection->toArray();
    $collection->delete();

    return response()->json([
        'success' => true,
        'deleted' => $deletedData
    ]);
}


  function destroy_param($id){
  $collection = ApiResourceParam::find($id);

    if (!$collection) {
        return response()->json([
            'success' => false,
            'message' => 'Collection not found'
        ], 404);
    }

    $deletedData = $collection->toArray();
    $collection->delete();

    return response()->json([
        'success' => true,
        'deleted' => $deletedData
    ]);
  }
public function update(Request $request, $id)
{
    $resource = ApiCollection::find($id);

    if(!$resource){
        return response()->json(['success'=>false, 'message'=>'Collection not found'], 404);
    }

    $resource->update([
        'name' => $request->name,
        'actions' => $request->actions
    ]);

            return response()->json([
                'success' => true,
                'resource' => [
                    'id'                 => $resource->id,
                    'name'               => $resource->name,
                    'description'        => $resource->description,
                    'actions'            => $resource->actions,
                    'collection_name'    => $resource->collection->name ?? '-'
                ]
            ]);
  
}

// Update API Resource
public function update_resource(Request $request, $id)
{
    $resource = ApiDocResource::find($id);
    if(!$resource){
        return response()->json(['success'=>false, 'message'=>'Resource not found'], 404);
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'actions' => 'required|string',
    ]);

    $resource->update([
        'name' => $request->name,
        'description' => $request->description,
        'actions' => $request->actions,
    ]);

    return response()->json([
        'success' => true,
        'resource' => [
            'id' => $resource->id,
            'name' => $resource->name,
            'description' => $resource->description,
            'actions' => $resource->actions,
            'collection_name' => $resource->collection->name ?? '-'
        ]
    ]);
}

// Update API Resource Parameter
public function updateApiResourceParam(Request $request, $id)
{
    $param = ApiResourceParam::find($id);

    if (!$param) {
        return response()->json([
            'success' => false,
            'message' => 'Param not found'
        ]);
    }

    $param->update([
        'name'        => $request->param_name,
        'type'        => $request->param_type,
        'description' => $request->description,
        'required'    => $request->required ?? $param->required, // optional
    ]);

    return response()->json([
        'success' => true,
        'param'   => $param
    ]);
}
public function storeApiEndpoint(Request $request)
{

     
        // Store endpoint
        $endpoint = ApiDocEndpoints::create([
            'api_doc_resource_id' => $request->api_doc_resource_id,
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'url' => $request->url,
            'actions' => $request->actions,
            'request_sample' => $request->request_sample,
            'response_sample' => $request->response_sample,
        ]);

      return response()->json([
        'success' => true,
        'resource' => [   // ⚠ changed from 'endpoint' to 'resource'
            'id' => $endpoint->id,
            'name' => $endpoint->name,
            'description' => $endpoint->description,
            'url' => $endpoint->url,
            'type' => $endpoint->type,
            'actions' => $endpoint->actions,
            'request_sample' => $endpoint->request_sample,
            'response_sample' => $endpoint->response_sample,
            'collection_name' => $endpoint->collection->name ?? '', // optional
        ]
    ]);
   
}
public function updateApiEndpoint(Request $request, $id)
{
    // Validate the request (optional, but recommended)
    $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:50',
        'description' => 'nullable|string',
        'url' => 'nullable|string|max:255',
        'actions' => 'required|string|max:50',
        'request_sample' => 'nullable|string',
        'response_sample' => 'nullable|string',
    ]);

    // Find the endpoint
    $endpoint = ApiDocEndpoints::findOrFail($id);

    // Update the endpoint
    $endpoint->update([
        'name' => $request->name,
        'type' => $request->type,
        'description' => $request->description,
        'url' => $request->url,
        'actions' => $request->actions,
        'request_sample' => $request->request_sample,
        'response_sample' => $request->response_sample,
    ]);

    // Return JSON response for AJAX
    return response()->json([
        'success' => true,
        'resource' => [
            'id' => $endpoint->id,
            'name' => $endpoint->name,
            'description' => $endpoint->description,
            'url' => $endpoint->url,
            'type' => $endpoint->type,
            'actions' => $endpoint->actions,
            'request_sample' => $endpoint->request_sample,
            'response_sample' => $endpoint->response_sample,
            'collection_name' => $endpoint->collection->name ?? '', // optional
        ]
    ]);
}


   public function viewendposint($id)
{
    $endpoint = ApiDocEndpoints::with('params')->findOrFail($id);
    return view('VopaySetup.index', compact('endpoint'));
}
}
