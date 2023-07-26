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
        <h4 class="card-title text-center">Add New Product</h4>
        <form class="forms-sample " action='{{route("product.store")}}' method='POST' enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" value="{{old('name')}}" name="name"class="form-control" id="exampleInputName1" 
            placeholder="Name">
          </div>
         
          <div class="form-group">
            <label for="exampleTextarea1">Description</label>
            <textarea class="form-control" value="{{old('description')}}" name="description" id="exampleTextarea1" rows="4">
              {{old('description')}}
            </textarea>
          </div>
         
          <div class="form-group">
            <label for="exampleSelectGender">Category</label>
            <select class="form-control" id="exampleSelectGender"  value="{{old('category_name')}}" name="category_name">
             <option value="">==== selec category ====</option>

             @foreach ($categories as $category)
             <option value="{{$category->category_name}}">{{$category->category_name}}</option>
          
             @endforeach
            </select>
          </div>
         
          <div class="form-group">
            <label for="exampleInputEmail3">image</label>
            <input type="file"name="image" value="{{old('image')}}" class="form-control" 
            id="exampleInputEmail3" placeholder="Upload Image">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Price</label>
            <input type="number" value="{{old('price')}}" name="price" class="form-control" id="exampleInputEmail3" placeholder="Price">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Discount Price</label>
            <input type="number" value="{{old('discount_price')}}" name='discount_price' class="form-control" id="exampleInputEmail3" placeholder="Discount Price">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Quantity</label>
            <input type="number" value="{{old('quantity')}}" name='quantity' class="form-control" id="exampleInputEmail3" placeholder="Quantity">
          </div>
      
          
          <button type="submit" class="btn btn-primary p-1 form-control">Add</button>
        </form>
      </div>
    </div>
  </div>

  @endsection