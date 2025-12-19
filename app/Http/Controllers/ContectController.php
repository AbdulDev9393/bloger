<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class ContectController extends Controller
{

    function index(){
        $getComents=Comment::latest()->get();
        $totalComents=Comment::count();
        return view('admin_panal.Comments.index',compact('getComents','totalComents'));
    }
    function store(Request $request){
        $base=new Comment();
        $base->Name=$request->name;
        $base->Email=$request->email;
        $base->Subject=$request->subject;
        $base->Message=$request->message;
        $base->save();
        return back()->with('success','Your Message Submit ! Thank you for time ');

    }
}