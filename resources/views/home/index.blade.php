@extends('layouts.home')

@section('content')
<div class="container-fluid body-search">
  <div class="container">
    <div class="row">
    	@include('home.partials.home-filter')
      <!--end advance search-->
      @include('home.partials.seeker-login')
      <!--end job seeker form-->
    </div>
    <!--end row-->
  </div>
  <!--end container-->
</div>
@include('home.partials.popular-search')

@include('home.partials.browse-job')

@include('home.partials.featured-employers')

@endsection