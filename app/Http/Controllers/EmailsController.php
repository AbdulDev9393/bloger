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
    $base = new Subscribe();
    $base->email = $request->email;
    $base->save();

    return back()->with('success', 'Thank you, I sent a notification for new blog.');
}

}