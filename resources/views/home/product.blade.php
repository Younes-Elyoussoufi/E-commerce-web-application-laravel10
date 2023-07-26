
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
          @if (session()->has('success'))
          <p class="alert alert-success">{{session()->get('success')}} </p>
        @endif
        @if($errors->any())
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        @endif
       </div>
       <div class="row">
          @forelse ($products as $product)
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <form action="{{route('cart.add',$product->id)}}" method="post" id="{{$product->id}}">
                        @csrf
                        <input type="number" name="quantity" min='0' value="1" class="option2">
                     </form>
                     <button onclick="event.preventDefault(); 
                      document.getElementById('{{$product->id}}').submit(); " class="option1">
                     add to cart <i class="fas fa-cart"></i>
                     </button>
                     <a href="{{route('product.show',$product->id)}}" class="option2">
                     Show
                     </a>
                  </div>
               </div>
               <div class="img-box">
                  <img src="image_products/{{$product->image}}" alt="">
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
          @empty
              <div class="alert alert-info">no data yey </div>
          @endforelse
          {{$products->links()}}
        </div>
       <div class="btn-box">
          <a href="{{route('product.all')}}">
          View All products
          </a>
       </div>
    </div>
 </section>