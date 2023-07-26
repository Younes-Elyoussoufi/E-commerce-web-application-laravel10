@extends('admin.app')

@section('style')
<style>
    img{
        width: 100px !important;
height: 100px !important;
border-radius: 0 !important;
    }
</style>

@endsection

@section('content')
<div class="container-scroller">
    <div class="main-panel">

    <div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">List of products</h4>
            @if (session()->has('success'))
            <p class="alert alert-success">{{session()->get('success')}} </p>
          @endif
          @if($errors->any())
              @foreach ($errors->all() as $error)
              <p class="alert alert-danger">{{ $error }}</p>
              @endforeach
          @endif            </p>
            <div class="table-responsive">
              <table class="table table-bordered table-contextual">
                <thead>
                  <tr>
                         <th> photo </th>
                        <th>  name </th>
                        <th> descrition </th>
                        <th> price </th>
                        <th width='57px'> discount price </th>
                        <th> quantity </th>
                        <th> category </th>
                        <th> actions </th>
                      </tr>
     
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="table-info">
                     <td> 
                         <img src="image_products/{{$product->image}}" 
                         width="200px" height='200px'
                         alt="{{$product->name}}">
                     </td>
                     <td> {{$product->name}} </td>
                     <td> {{$product->description}} </td>
                     <td> {{$product->price}} </td>
                     <td> {{$product->discount_price}} </td>
                     <td> {{$product->quantity}} </td>
                     <td> {{$product->category_name}} </td>
                     <td > 
                            <a class="btn btn-primary" href="{{route('product.edit',$product->id)}}">
                                <i class="mdi mdi-table-edit"></i>
                            </a> 
                          <button class="btn btn-danger " 
                          onclick="event.preventDefault();
                          if(confirm('are you sure to delete it ?'))
                          document.getElementById('{{$product->id}}').submit(); ">
                              <i class="mdi mdi-delete-forever"></i>
                          </button> 
                          <form id={{$product->id}} action="{{route('product.destroy',$product->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                          </form>
                        
                     </td>
                   </tr>   
                   @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>


</div>
</div>    




       

    
@endsection
       