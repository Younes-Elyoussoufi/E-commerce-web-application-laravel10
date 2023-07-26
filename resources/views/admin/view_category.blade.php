@extends('admin.app')

@section('content')
        <div class="col-12 grid-margin stretch-card mt-4">
            <div class="card p-4">
               
              <div class="card-body">
                @if (session()->has('success'))
                  <p class="alert alert-success">{{session()->get('success')}} </p>
                @endif
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                @endif
                <h3 class="card-title text-white text-center mt-3">Add Category</h3>
                <form class="forms-sample" action="{{route('add.category')}}" method="post">
                    @csrf
                  <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" name="category_name" class="form-control" id="exampleInputName1" placeholder="Name">
                  </div>
                 
                  
               
                
                  <button type="submit" class="btn btn-primary mr-2 form-control">Submit</button>
                  
                </form>
                <h4 class="card-title text-center mt-3">List Of Categories</h4>
                <div class="table-responsive " >
                  <table class="table">
                    <thead>
                      <tr>
                       
                        <th class="text-white"> Category Name </th>
                        <th class="text-white "> Actions </th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr class='text-white'>
                            <td > {{$category->category_name}} </td>
   
                           <td class='d-flex '>
                            <form action="{{route('delete.category',$category->id)}}" method='post'>
                                @csrf
                                @method('DELETE')
                             <button onclick="return confirm('are you sure to delete it ?')" type='submit' class="btn btn-danger">delete</button>
                            </form>
                             <button class="btn btn-warning ml-2">update</button>
                           </td>
                         </tr>
                        @endforeach
                                     
                    </tbody>
                  </table>
                </div>
                
              </div>
              
            </div>
            
          </div>
          
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
 @endsection