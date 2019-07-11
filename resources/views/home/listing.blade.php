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
            <h4 class="mt-3">{{ $listing->title }}</h4>
            <h6>: {{ $listing->company->name }}</h6>
            <h6>: {{ optional($listing->location)->name }}</h6>
            <h6>: {{ $listing->startDate }} - {{ $listing->closingDate }}</h6>

            <div class="row">
              <div class="col-md-10">
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

              <div class="col-md-10">
                <h6>{{ __('general.DESCRIPTION') }}</h6><hr>
                <p>{{ $listing->description }}</p>
                
                <br>
                <h6>{{ __('general.REQUIREMENTS') }}</h6><hr>
                <p>{{ $listing->requirement }}</p>

                <br><br>
                <h6>{{ __('general.CONTACT') }}</h6><hr>
                  <div><strong>{{ __('general.Person') }}:</strong> {{ $listing->user->name }}</div>
                  <div><strong>{{ __('general.Phone') }}:</strong> {{ $listing->company->phone }}</div>
                  <div><strong>{{ __('general.Email') }}:</strong> {{ $listing->user->email }}</div>
                  <div><strong>{{ __('general.Address') }} :</strong> {{ $listing->company->address }}</div>
                  </ul>
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