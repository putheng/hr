@extends('layouts.home')
@section('title')
  <title>{{ $listing->title }} | HR Dimension</title>
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
          <div class="row">
            <div class="col-md-8">
              <h4 class="mt-3">{{ $listing->title }}</h4>
              <h6>: {{ $listing->company->name }}</h6>
              <h6>: {{ optional($listing->location)->name }}</h6>
              <h6>Start {{ $listing->startDate }} - Closing {{ $listing->closingDate }}</h6>
              
            </div>
            <div class="col-md-4">
              <img src="{{ $listing->company->logo() }}" class="img-fluid employer-logo-list">
            </div>
          </div>

            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered">
                  <tr>
                    <th>{{ __('general.Term') }}</th>
                    <td>{{ optional($listing->term)->name }}</td>
                    <th>{{ __('general.Category') }}</th>
                    <td>{{ optional($listing->category)->name }}</td>
                  </tr>
                  <tr>
                    <th>{{ __('general.Level') }}</th>
                    <td>{{ optional($listing->level)->name }}</td>
                    <th>{{ __('general.Experience') }}</th>
                    <td>{{ optional($listing->experience)->name }}</td>
                  </tr>
                  <tr>
                    <th>{{ __('general.Salary') }}</th>
                    <td>{{ optional($listing->salary)->name }}</td>
                    <th>{{ __('general.Education') }}</th>
                    <td>{{ optional($listing->education)->name }}</td>
                  </tr>
                </table>
              </div>

              <div class="col-md-12">
              <br>
                <h6>{{ __('general.DESCRIPTION') }}</h6><hr>
                <p>{!! nl2br($listing->description) !!}</p>
                
                <br>
                <h6>{{ __('general.REQUIREMENTS') }}</h6><hr>
                <p>{!! nl2br($listing->requirement) !!}</p>

                <br><br>
                <h6>{{ __('general.CONTACT') }}</h6><hr>
                <div class="row">
                  <div class="col-md-8">
                    <div><strong>{{ __('general.Person') }}:</strong> {{ $listing->user->name }}</div>
                    <div><strong>{{ __('general.Phone') }}:</strong> {{ $listing->company->phone }}</div>
                    <div><strong>{{ __('general.Email') }}:</strong> {{ $listing->user->email }}</div>
                    <div><strong>{{ __('general.Address') }} :</strong> {{ $listing->company->address }}</div>
                  </div>
                  @if(auth()->user()->hasRole('jobseeker'))
                    <div class="col-md-4">
                      <br>
                      @can('favorite', $listing)
                        <a href="{{ route('listing.favorite', $listing) }}" class="btn btn-info btn-sm">Add to Favorite</a>
                      @else
                        <a href="{{ route('listing.favorite.remove', $listing) }}" class="btn btn-info btn-sm">Remove Favorite</a>
                      @endcan
                    </div>
                  @endif
                </div>
              </div>
            </div>
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