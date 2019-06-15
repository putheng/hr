@extends('layouts.home')

@section('content')
<div class="container-fluid body-search">
	<div class="container">
		<div class="row justify-content-md-center">
			<!--left sidebar-->
			<div class="col-md-6 col-sm-12">
				<br>
				<h5>Create an Employer Account</h5>
				<hr>
				<form action="{{ route('register.employer') }}" method="post">
					@csrf
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="inputname">Name</label>
			<input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="inputname" value="{{ old('name') }}">
			@error('name')
			    <small class="text-danger">{{ $message }}</small>
			@enderror
		</div>
		<div class="form-group col-md-6">
			<label for="inputEmail">Email</label>
			<input name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="inputEmail" value="{{ old('email') }}">
			@error('email')
			    <small class="text-danger">{{ $message }}</small>
			@enderror
		</div>
	</div>

	<div class="form-group">
		<label for="inputCompany">Company</label>
		<input name="company" type="text" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" id="inputCompany" value="{{ old('company') }}">
		@error('company')
		    <small class="text-danger">{{ $message }}</small>
		@enderror
	</div>

	<div class="form-group">
		<label for="inputAddress">Address</label>
		<textarea name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}">{{ old('address') }}</textarea>
		@error('address')
		    <small class="text-danger">{{ $message }}</small>
		@enderror
	</div>

	<div class="form-group">
		<label for="inputPhone">Phone</label>
		<input name="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" id="inputPhone" value="{{ old('phone') }}">
		@error('phone')
		    <small class="text-danger">{{ $message }}</small>
		@enderror
	</div>

	<div class="form-row">
		<div class="col">
			<label for="inputPassword">Password</label>
			<input name="password" type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
			@error('password')
			    <small class="text-danger">{{ $message }}</small>
			@enderror
		</div>
		<div class="col">
			<label for="password_confirm">Password Confirmed</label>
			<input name="password_confirmation" id="password_confirm" type="password" class="form-control">
			@error('password_confirmed')
			    <small class="text-danger">{{ $message }}</small>
			@enderror
		</div>
	</div>
	<div class="form-group">
		<br>
		<div class="form-check">
			<input {{ old('term') ? 'checked': '' }} class="form-check-input" name="term" type="checkbox" id="gridCheck">
			<label class="form-check-label" for="gridCheck">
			I agree <a href="#">Term & Condition</a>
			</label>
			@error('term')
			    <div class="text-danger"><small>{{ $message }}</small></div>
			@enderror
		</div>
	</div>
	<br>
	<button type="submit" class="btn btn-primary">Create an Account</button>
	Already have account ? <a href="{{ route('login.employer') }}">Login</a>
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