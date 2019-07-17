@extends('layouts.home')

@section('content')
<div class="container-fluid body-search">
	<div class="container">
		<div class="row justify-content-md-center">
			<!--left sidebar-->
			<div class="col-md-6 col-sm-12">
				<br>
				<h5>Login Job Seeker Account</h5>
				<hr>
				<form action="{{ route('login') }}" method="post">
					@csrf
	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="inputEmail">{{ __('general.Email') }}</label>
			<input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" value="{{ old('email') }}">
			@error('email')
			    <small class="text-danger">{{ $message }}</small>
			@enderror
		</div>
	</div>
	<div class="form-row">
		<div class="col">
			<label for="inputPassword">{{ __('general.password') }}</label>
			<input name="password" type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror">
			@error('password')
			    <small class="text-danger">{{ $message }}</small>
			@enderror
		</div>
	</div>

	<br>
	<button type="submit" class="btn btn-primary">Login</button>
	Not yet have account ? <a href="{{ url('register') }}">Create an Account</a>
</form>
<br>
<br>
			</div>
			<!--body content-->
		</div>
		<!--end row-->
	</div>
	<!--end container-->
</div>
@endsection