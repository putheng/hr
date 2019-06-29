@guest
<div class="col-md-4 col-sm-12 jobseeker-form">

  Jobe seeker 
  <form action="{{ url('login') }}" method="post">
    @csrf
    <div class="form-group">
      <input name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="inputEmail" value="{{ old('email') }}" placeholder="Email">
      @error('email')
          <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group">
      <input name="password" type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">
      @error('password')
          <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group row">
      <div class="col-md-6">
        <input type="button" class="form-control btn btn-primary" value="Login with Facebook" id="formGroupExampleInput2">
      </div>
      <div class="col-md-6">
        <input type="submit" class="form-control btn btn-danger" value="Login" id="formGroupExampleInput2">
      </div>
    </div>
  </form>
  <div class="form-group">
      <a href="{{ url('register') }}" class="form-control btn btn-success">
        Sign UP
      </a>
    </div>
</div>
@else
  @include('ads.two')
@endguest