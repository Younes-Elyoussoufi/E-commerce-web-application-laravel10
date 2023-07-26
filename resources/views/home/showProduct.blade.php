@extends('home.App')

@section('content')

      
<section class="product_section mb-5">
   <div class="container">
      <div class="heading_container heading_center">
         <h3>
             <span>product details</span>
         </h3>
         @if (session()->has('success'))
         <p class="alert alert-success">{{session()->get('success')}} </p>
       @endif
       @if($errors->any())
           @foreach ($errors->all() as $error)
           <p class="alert alert-danger">{{ $error }}</p>
           @endforeach
       @endif
      </div>
      <div class="row d-flex justify-content-center">
         
         <div class=" col-md-5 col-offset-md-1 ">
           <div class="box">
              
              <div class="img-box">
                 <img src='{{asset("image_products")."/".$product->image}}' alt="" />
              </div>
              <div class="detail-box">
                 <h5>
                  {{$product->name}}
                 </h5>
                 @if ($product->discount_price !=null)
                 <h6 class='text-danger' style='text-decoration:line-through'>
                   ${{$product->discount_price}}
                </h6> 
                 @endif
                 <h6>
                   ${{$product->price}}
                </h6>
              </div>
           </div>
          
        </div>
        <div class=" col-md-5 col-offset-md-1 ">
         <div class="box">
           
            <h1>name</h1>
            <p >{{$product->name}} </p>
            <h3>description</h3>
            <p>{{$product->description}} </p>
            <h3>quantity</h3>
            <p>{{$product->quantity}} </p>
            <h3>category</h3>
            <p>{{$product->category_name}} </p>
            <div class="options mt-5 add rounded-25" >
             
               <form action="{{route('cart.add',$product->id)}}" method="post" id="{{$product->id}}">
                  @csrf
                  <input type="number" name="quantity" min='0' value="1" class="option2">
               </form>
               <button onclick="event.preventDefault();  document.getElementById('{{$product->id}}').submit(); " class="option1">
               add to cart <i class="fas fa-cart"></i>
               </button>
            </div>
         </div>
      </div>
         
       </div>
      
   </div>
</section>

@endsection