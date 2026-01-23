<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribe;
class EmailsController extends Controller
{
    //
    function index(){
        $emails=Subscribe::latest()->get();
        return view('admin_panal.user_sub.index',compact('emails'));
    }
  public function index_store(Request $request)
{
    $check=Subscribe::where('email', $request->email)->first();
    if($check){
         return back()->with('error', 'Thank you, but this email allready Subscribe');
    }
    $base = new Subscribe();
    $base->email = $request->email;
    $base->save();

    return back()->with('success', 'Thank you, I sent a notification for new blog.');
}
public function destroy($id)
{
    $subscriber = Subscribe::find($id); // ✅ use the correct model

    if (!$subscriber) {
        return response()->json(['success' => false, 'message' => 'Subscriber not found']);
    }

    $subscriber->delete();
return back()->with('success', 'Successfully deleted this email ');
}
}