@extends('admin.app')

@section('style')
<style>
    .card-body input,textarea,select{
        color: aliceblue !important
    }
</style>
@endsection
@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card mt-4 p-4">
      <div class="card-body ">
        @if (session()->has('success'))
        <p class="alert alert-success">{{session()->get('success')}} </p>
      @endif
      @if($errors->any())
          @foreach ($errors->all() as $error)
          <p class="alert alert-danger">{{ $error }}</p>
          @endforeach
      @endif
        <h4 class="card-title text-center">Update Product</h4>
        <form class="forms-sample " action='{{route("product.update",$product->id)}}' method='POST' enctype="multipart/form-data">
            @csrf
            @method(
              'PUT'
            )
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" name="name"class="form-control" id="exampleInputName1"
            value="{{$product->name}}" 
            placeholder="Name">
          </div>
         
          <div class="form-group">
            <label for="exampleTextarea1">Description</label>
            <textarea class="form-control" name="description" id="exampleTextarea1" 
            rows="4">{{$product->description}}</textarea>
          </div>
         
          <div class="form-group">
            <label for="exampleSelectGender">Category</label>
            <select class="form-control" id="exampleSelectGender" name="category_name">
             <option value="">==== selec category ====</option>

             @foreach ($categories as $category)
             <option value="{{$category->category_name}}"
            value="{{$product->description}}" 
            selected='{{$category->category_name==$product->description}} ? true :false'>
                 {{$category->category_name}}
                </option>
          
             @endforeach
            </select>
          </div>
         
          <div class="form-group">
            <label for="exampleInputEmail3">image</label>
            <input type="file"name="image"  class="form-control" id="exampleInputEmail3" 
            placeholder="Upload Image">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Price</label>
            <input type="number" name="price" value="{{$product->price}}" class="form-control" id="exampleInputEmail3" placeholder="Price">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Discount Price</label>
            <input type="number" name='discount_price' value="{{$product->discount_price}}" class="form-control" id="exampleInputEmail3" placeholder="Discount Price">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Quantity</label>
            <input type="number" name='quantity' value="{{$product->quantity}}" class="form-control" id="exampleInputEmail3" placeholder="Quantity">
          </div>
      
          
          <button type="submit" class="btn btn-primary p-1 form-control">
            Update
          </button>
        </form>
      </div>
    </div>
  </div>

  @endsection