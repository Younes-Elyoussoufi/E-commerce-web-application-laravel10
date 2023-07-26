@extends('home.App')

@section('content')
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
       {{-- !-- end why section --> --}}
       <!-- arrival section -->
      @include('home.arrival')
      <!-- end arrival section -->
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->
      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
      <!-- end client section -->
@endsection