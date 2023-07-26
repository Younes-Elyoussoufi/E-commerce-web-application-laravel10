<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      {{-- <base href="/public"> --}}
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
      <style>
         button.inline-flex.items-center.px-3.py-2.border.border-transparent.text-sm.leading-4.font-medium.rounded-md.text-gray-500.bg-white.hover\:text-gray-700.focus\:outline-none.focus\:bg-gray-50.active\:bg-gray-50.transition.ease-in-out.duration-150 {
    border: none !important;


    
}
.options input{padding: 8px 0px !important;border-radius: 25px !important}
.options button {padding: 8px 0px !important}
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
           @include('home.header')
         <!-- end header section -->

         @yield('content')

            <!-- footer start -->
      @include('home.footer')
      <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('js/custom.js')}}"></script>
   </body>
</html>