@extends('layouts.home')

@section('content')
<div class="container-fluid body-search">
	<div class="container">
		<div class="row justify-content-md-center">
			<!--left sidebar-->
			<div class="col-md-6 col-sm-12">
				<br>
				<h5>Create Job Seekers Account</h5>
				<hr>
				<form action="{{ route('register') }}" method="post">
					@csrf
	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="inputname">Name</label>
			<input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputname" value="{{ old('name') }}">
			@error('name')
			    <small class="text-danger">{{ $message }}</small>
			@enderror
		</div>
		<div class="form-group col-md-12">
			<label for="inputEmail">Email</label>
			<input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" value="{{ old('email') }}">
			@error('email')
			    <small class="text-danger">{{ $message }}</small>
			@enderror
		</div>
	</div>

	<div class="form-row">
		<div class="col">
			<label for="gender">Gender</label>
			<select name="gender" class="form-control @error('gender') is-invalid @enderror">
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
			@error('gender')
			    <small class="text-danger">{{ $message }}</small>
			@enderror
		</div>
		<div class="col">
			<label for="phone">Phone</label>
			<input name="phone" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror">
			@error('phone')
			    <small class="text-danger">{{ $message }}</small>
			@enderror
		</div>
	</div>
	<br>
	<div class="form-row">
		<div class="col">
			<label for="inputPassword">Password</label>
			<input name="password" type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror">
			@error('password')
			    <small class="text-danger">{{ $message }}</small>
			@enderror
		</div>
		<div class="col">
			<label for="password_confirmation">Confirm Password</label>
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
	Already have account ? <a href="{{ url('login') }}">Login</a>
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