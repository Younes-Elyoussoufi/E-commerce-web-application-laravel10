@extends('home.App')

@section('content')
 <div class="container-fluid mt-3">
    <h1 class='text-center mb-2' style='font-size:28px !important'>cart items</h1>
    @if (session()->has('success'))
    <p class="alert alert-success">{{session()->get('success')}} </p>
  @endif
  @if($errors->any())
      @foreach ($errors->all() as $error)
      <p class="alert alert-danger">{{ $error }}</p>
      @endforeach
  @endif
    <table class="table">

        <thead class="thead-dark">
          <tr>
            <th scope="col"><i class="fa fa-image" aria-hidden="true"></i></th>
            <th scope="col">product name</th>
            <th scope="col">quantity</th>
            <th scope="col">price</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($carts as $cart)
          <tr>
            <th scope="row" width='100' height='30px'>
                <img src="{{asset("image_products")."/".$cart->product->image}}"  alt="" />
            </th>
            <td>{{$cart->product->name}}</td>
            <td width='100'>{{$cart->quantity}}</td>
            <td>${{$cart->quantity * $cart->product->discount_price}}</td>
            <td>
            
            <button class='btn btn-danger'
            onclick="event.preventDefault();
            if(confirm('are you sure to delete it ?'))
            document.getElementById('{{$cart->id}}').submit(); ">
              delete  <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        
        </td>
        <form id={{$cart->id}} action="{{route('cart.destroy',$cart->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            </form>
      </tr> 
           
          @empty
             <div class='bg-info d-flex text-white justify-content-center align-items-center' style='height:300px;font-size:33px'>
                not data yet
             </div>
            
          @endforelse
       
        </tbody>
 
      </table>
     <div class="box mt-4 text-center" style="margin-bottom: 13rem">
        @if(session()->get('cart_count')>0)
            <a href="{{route('cash_on_delivry')}}" class='btn btn-primary' >
       Cash on Delevry 
         <i class="fa fa-money " aria-hidden="true" style="font-size: 22px;color:greenyellow"></i>        
        @endif
             
      
      </a>
     </div>

       
 
@endsection