<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreContactRequest;

class HomeController extends Controller
{
    public function index(){
        $products=Product::paginate(10);
       return View('home.index',compact('products'));
    }



    public function allProducts()
    {
        $products=Product::orderBy('id','desc')->paginate(10);
        return view('home.allProducts',compact('products'));
    }
    public function blog_list()
    {
        return view('home.blog_list');
    }
    public function contact()
    {
        return view('home.contact');
    }

    public function contact_store(Request $request)
    {
        //  dd($request->all());
        $request->validate( [
            'name' =>'required',
            'message' => 'required| min:3',
            'email' =>'required | email',
            'subject' => 'required',
        ]);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return redirect()->back()->with([
            'success'=>'order added successfly',
        ]);
    }

    public function testimonial()
    {
        return view('home.testimonial');
    }

    public function about()
    {
        return view('home.about');
    }

    
    public function admin(){
        if(Auth::user()->isAdmin ==1){
            $countUsers=User::count(); 
            $countOrders=Order::count(); 
            $totalSale=Order::sum('price'); 
            return View('admin.home',compact('countUsers','countOrders','totalSale'));
        }else{
            return View('home.index');
        }

     }
     public function create(){
        return View('admin.create');
     }

     public function cart(){
        if (auth()->user()->id) {
            $userID=auth()->user()->id;

            $carts=Cart::where('user_id',$userID)->get();
            $cartExpired=Cart::where('user_id',$userID)->where('expired',1)->get();
            // dd(Cart::find($userID)->user->name);
            return View('home.cart')->with([
                'carts'=>$carts,
                'cartExpired'=>$cartExpired
            ]);
        } else {
            return redirect()->route('login');
        }
        return View('home.cart');
     }

     public function cart_add( Request $request,$id ){
        if (auth()->user()) {
            $userID=auth()->user()->id;
            $isExistsProduct=Cart::where('user_id',$userID)->where('product_id',$id)->first();
            if ($isExistsProduct) {
                $isExistsProduct->update([
                    'quantity'=>$request->quantity + $isExistsProduct->quantity
                ]);
                $success='product updated in cart successfly ';
            } else {
                Cart::create([
                    'product_id'=>$id,
                    'user_id'=>$userID,
                    'quantity'=>$request->quantity
                ]);
                $success='product added successfly to cart';
            }
            
            $carts=Cart::where('user_id',$userID)->get();
            $request->session()->put('cart_count',$carts->count());
            return redirect()->back()->with([
                'success'=>$success,
                'carts'=>$carts,
                // 'cart_count'=>$carts->count()
            ]);
        } else {
            return redirect()->route('login');
        }
      
     }

     public function delete_cart($id){
        Cart::find($id)->delete();
        $carts=Cart::all();
        session()->put('cart_count',$carts->count());
        return redirect()->back()->with([
            'success'=>'cart deleted successfly',
            'carts'=>$carts
        ]);
    }

    public function cash_on_delivry(){

        return view('home.cash_on_delivry');
    }

    public function cash_on_delivry_pass(Request $request){
        $request->validate([
            'adress' => 'required',
            'phone' => 'required',
        ]);
        $userID=auth()->user()->id;
        $carts=Cart::where('user_id',$userID)->get();
        $price=0;
        foreach($carts as $cart) {
            if($cart->product->discount_price !=null){
               $price=$cart->product->discount_price;
            }else{
                $price=$cart->product->price;
            }
            Order::create([
                'product_id'=>$cart->product->id,
                'user_id'=>$userID,	
                'quantity'=>$cart->quantity ,
                'price'=>$price * $cart->quantity,
                'phone'=>$request->phone,
                'adress'=>$request->adress,
                'message'=>$request->message
        
                ]);
                $cart->delete();
        }  

        $request->session()->put('cart_count',0);
        return redirect()->back()->with([
            'success'=>'order cash on delivery passed successfly',
            'carts'=>$carts
        ]);
     }
    
    
     
}
