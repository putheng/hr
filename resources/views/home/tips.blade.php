@extends('layouts.home')

@section('title')
<title>Tips | HR Dimension</title>
@endsection

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
<div class="container-fluid job-tag">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12 popular-search">
        <div class="col-md-12">
          <h2>Our success tips</h2><hr>
          @if($tips->count())
            @foreach($tips as $tip)
              <div class="media">
                <div class="media-body">
                  <h5 class="mt-0">
                    <a href="{{ route('tip.show', $tip) }}">{{ $tip->title }}</a>
                  </h5>
                  {{ str_limit(strip_tags($tip->content), 300) }}
                </div>
              </div>
            @endforeach
          @endif
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