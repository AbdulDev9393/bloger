<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    //
    function index(){
        $categories=Category::latest();
        $totalCategories = Category::count();
        return view('admin_panal.Categories.index',compact('categories','totalCategories'));
    }
    function store(Request $request){
          $base=new Category();
          $base->name=$request->category;
          if($base->save()){
            return back()->with('success','Successfully add Category');
          }else{
            return back()->with('error','not addes try again');
          }
    }
    function delete($id){
        $delete=Category::find($id);
        $delete->delete();
            return back()->with('success','Successfully delete Category');
    }
    function eid($id){
        $Category=Category::find($id);
        return view('admin_panal.Categories.eid',compact('Category'));
    }
    function update(Request $request, $id){
          $Category=Category::find($id);
          $Category->name=$request->name;
          $Category->save();
          return redirect()->route('admin.Categories')->with('success','Successfully Updated');
    }
public function search(Request $request)
{
    $query = $request->input('query');

    if ($query) {
        $categories = Category::where('name', 'LIKE', "%{$query}%")->get();
    } else {
        $categories = Category::all();
    }

    $totalCategories = $categories->count();

    return view('admin_panal.Categories.index', compact('categories', 'totalCategories'));
}


}
