@extends('layouts.home')

@section('title')
<title>Question & Answer | HR Dimension</title>
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

@if($questions->count())    
  <div id="accordion">
    @foreach($questions as $key => $question)
      <div class="card">
        <div class="card-header" id="heading{{ $question->id }}">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" 
              data-target="#collapse{{ $question->id }}" aria-expanded="true" aria-controls="collapse{{ $question->id }}">
             {{ $question->question }}
            </button>
          </h5>
        </div>
        <div id="collapse{{ $question->id }}" class="collapse {{ $key == 0 ? ' show' : '' }}" aria-labelledby="heading{{ $question->id }}" data-parent="#accordion">
          <div class="card-body">
            {!! nl2br($question->answer) !!}
          </div>
        </div>
      </div><br>
    @endforeach
  </div>
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