<div class="container-fluid employer-logo">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <h4>{{ __('general.Featured') }}</h4>
        <hr/>
        <div class="row employer">
          @if($features->count())
            @foreach($features as $company)
              <div class="col-md-2 col-sm-6 employer-list">
                <img class="img-fluid employer-logo-list" alt="{{ $company->name }}" src="{{ $company->logo() }}">
              </div>
            @endforeach
          @else
          <div class="col-md-2 col-sm-6 employer-list">
            <img class="img-fluid" src="/images/logo.png">
          </div>
          @endif
        </div>
      </div>
      <!--end col-md-12-->
    </div>
    <!--end row-->
  </div>
  <!--end container-->
</div>