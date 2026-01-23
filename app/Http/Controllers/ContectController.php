<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\SocialMedia;
class ContectController extends Controller
{

    function index(){
        $getComents=Comment::latest()->get();
        $totalComents=Comment::count();
          
        return view('admin_panal.Comments.index',compact('getComents','totalComents'));
    }
public function message_store(Request $request)
{
    $check=Comment::where('Email',$request->email)->first();
    if($check){
        return back()->with('error', 'We have already received your message. Our team will get back to you shortly.');

    }
    Comment::create([
        'Name' => $request->name,
        'Email' => $request->email,
        'Subject' => $request->subject,
        'Message' => $request->message,
    ]);

    return back()->with('success','Successfully added your Comment');
}
public function destroy($id)
{
    $comment = Comment::findOrFail($id);
    $comment->delete();

    return redirect()->back()->with('success', 'Comment deleted successfully');
}
public function deleteAll()
{
    Comment::truncate(); 
    

    return redirect()->back()->with('success', 'All comments deleted successfully');
}
}