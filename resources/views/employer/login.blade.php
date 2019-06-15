@extends('layouts.home')

@section('content')
<div class="container-fluid body-search">
	<div class="container">
		<div class="row justify-content-md-center">
			<!--left sidebar-->
			<div class="col-md-6 col-sm-12">
				<br>
				<h5>Sign In</h5>
				<hr>
				<form action="{{ route('login.employer') }}" method="post">
					@csrf
	<div class="form-row">
		<div class="form-group col-md-8">
			<label for="inputEmail">Email</label>
			<input name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="inputEmail" value="{{ old('email') }}">
			@error('email')
			    <small class="text-danger">{{ $message }}</small>
			@enderror
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-8">
			<label for="inputPassword">Password</label>
			<input name="password" type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
			@error('password')
			    <small class="text-danger">{{ $message }}</small>
			@enderror
		</div>
	</div>
	<div class="form-group">
		<div class="form-check">
			<input {{ old('remember') ? 'checked': '' }} class="form-check-input" name="remember" type="checkbox" id="remember">
			<label class="form-check-label" for="remember">
				Remember
			</label>
		</div>
	</div>

	<br>
	<button type="submit" class="btn btn-primary">Sign in</button>
	<a href="{{ route('register.employer') }}">Create an Account</a>
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