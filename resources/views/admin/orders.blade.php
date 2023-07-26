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
                 </p>
            <div class="table-responsive">
              <table class="table table-bordered table-contextual">
                <thead>
                  <tr>
                         
                        <th>  name </th>
                        <th> phone </th>
                        <th> adress </th>
                        <th> price </th>
                        <th> product name </th>
                        <th> quantity </th>
                        <th> message </th>
                      </tr>
     
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr class="table-info">
                     
                     <td> {{$order->user->name}} </td>
                     <td> {{$order->phone}} </td>
                     <td> {{$order->adress}} </td>
                     <td> {{$order->price}} </td>
                     <td> {{$order->product->name}} </td>
                     <td> {{$order->quantity}} </td>
                     <td> {{$order->message}} </td>
                     
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
       