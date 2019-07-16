@extends('layouts.home')

@section('title')
<title>{{ $blog->title }} | HR Dimension</title>
@endsection

@section('content')

<div class="container-fluid job-tag">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12 popular-search">
        <div class="col-md-12">
          <h2>{{ $blog->title }}</h2><hr>
          
          <p>{!! $blog->content !!}</p>
        </div>
      </div>
      <!--end  popular-search-->
      @include('home.partials.urgent-job')
      <!--end urgent job -->
    </div>
    <!--end row-->
  </div>
  <!--end container-->
</div> 

@endsection