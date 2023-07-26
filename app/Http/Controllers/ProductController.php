<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::orderBy('id','desc')->paginate(10);

        return view('admin.listProduct',compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::orderBy('id','desc')->get();

        return view('admin.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $image=$request->image;
        $imageName=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('image_products',$imageName);
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'category_name' => $request->category_name,
        ]);
        $products=Product::all();
        return redirect()->route('product.index')->with([
            'success'=>'product added successfly',
            'products'=>$products
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
// dd($product);
$product=Product::find($id);
        return view('home.showProduct',compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('admin.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if($request->has('image')){
            $image=$request->image;
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('image_products',$imageName);
            unlink('image_products/'.$product->image);
            }else{
                $imageName= $product->image;
            }

            $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'category_name' => $request->category_name,
        ]);
        $products=Product::all();
        return redirect()->route('product.index')->with([
            'success'=>'product updated successfly',
            'products'=>$products
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {   if(file_exists($product->image)){
        unlink('image_products/'.$product->image);
         }
        $product->delete();
        $categories=Category::all();
        $products=Product::all();
        return redirect()->back()->with([
            'success'=>'product deleted successfly',
            'categories'=>$categories,
            'products'=>$products
        ]);
    }

   

}
