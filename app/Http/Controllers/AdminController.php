<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminController extends Controller
{
    public function view_category(){
        $categories=Category::orderBy('id','desc')->get();

        return view('admin.view_category',compact('categories'));
    }


    public function add_category(Request $request){
       $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        Category::create([
            'category_name'=>$request->category_name
        ]);
        $categories=Category::all();
        return redirect()->back()->with([
            'success'=>'category added successfly',
            'categories'=>$categories
        ]);
    }
    public function delete_category($id){
        Category::find($id)->delete();
        $categories=Category::all();
        return redirect()->back()->with([
            'success'=>'category deleted successfly',
            'categories'=>$categories
        ]);
    }

    public function orders(){
        $orders=Order::all();
        return view('admin.orders',compact('orders'));
    }

    
}
