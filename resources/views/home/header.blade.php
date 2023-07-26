<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="/"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="{{route('about')}}">About</a></li>
                      <li><a href="{{route('testimonial')}}">Testimonial</a></li>
                      <li><a href="{{route('blog_list')}}">Blog</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('product.all')}}">Products</a>
                </li>
                
                <li class="nav-item">
                   <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>
                




                 @if (Route::has('login'))
                
                    @auth
                    <li class="nav-item">
                     <a class="nav-link" href="{{route('profile.show')}}">Profile</a>
                  </li>
                  <li class="nav-item">
                     <form id="logout" action="{{route('logout')}}" method="post">@csrf</form>

                     <a class="nav-link" href="#" onclick="event.preventDefault();
                     document.getElementById('logout').submit(); ">Logout</a>
                  </li>
                     <li class="nav-item  rounded-pill w-100 border-0">
                        <x-app-layout>
                            
                        </x-app-layout>
                    </li>
                    @if (Auth::user()->isAdmin===1)
                    <li class="nav-item ml-2">
                        <a class="btn btn-success rounded-pill" target="_blank" href="{{route('admin.home')}}">Admin</a>
                     </li>
                    @endif
                    @else
                    <li class="nav-item">
                        <a class="btn btn-primary rounded-pill" href="{{route('login')}}">Login</a>
                     </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-success rounded-pill" href="{{route('register')}}">Register</a>
                         </li>                      
                        @endif
                    @endauth
               
            @endif
                <li class="nav-item ml-5 mt-2">
                   <a class="nav-link position-relative" href="{{route('cart')}}">
                     @if (session()->has('cart_count')) 
                       <span class="position-absolute badg text-white rounded-circle">
                        {{session()->get('cart_count') }}
                     </span>  
                     @endif
                                            
                  

                      <i class="fa fa-cart-plus" aria-hidden="true" style="font-size: x-large"></i>
                   </a>
                </li>
                {{-- <form class="form-inline">

                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form> --}}
             </ul>
          </div>
       </nav>
    </div>
 </header>