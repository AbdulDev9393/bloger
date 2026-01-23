<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;
class SittingController extends Controller
{
    //
    function index(){
        $data=SocialMedia::first();
        return view('admin_panal.Sitting.index',compact('data'));
    }
   public function media_post(Request $request)
    {
        $request->validate([
    'facebook'  => 'nullable|url',
    'twitter'   => 'nullable|url',
    'instagram' => 'nullable|url',
    'medium'    => 'nullable|url',
    'youtube'   => 'nullable|url',
]);


        // agar sirf ek hi row rakhni ho
        $social = SocialMedia::first() ?? new SocialMedia();

        $social->facebook  = $request->facebook;
        $social->twitter   = $request->twitter;
        $social->instagram = $request->instagram;
       $social->medium = $request->medium;
        $social->youtube   = $request->youtube;

        $social->save();

        return back()->with('success', 'Social media settings saved successfully');
    }
}


