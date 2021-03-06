@guest
<div class="col-md-4 col-sm-12 jobseeker-form">

  {{ __('general.Seekers') }}
  <form action="{{ url('login') }}" method="post">
    @csrf
    <div class="form-group">
      <input name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Email">
      @error('email')
          <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group">
      <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">
      @error('password')
          <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group row">
      <div class="col-md-12 text-center">
        <input type="submit" class="form-control btn btn-primary" value="Login"/>
      </div>
    </div>
  </form>
  <div class="form-group">
      <a href="{{ url('register') }}" class="form-control btn btn-success">
        {{ __('general.sign_up') }}
      </a>
    </div>
</div>
@else
  @include('ads.two')
@endguest