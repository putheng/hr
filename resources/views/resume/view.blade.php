<!DOCTYPE html>
<html>
<head>
	<title>{{ $resume->title }}</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style>
		.table.no-border>tbody>tr>td,
		.table.no-border>tbody>tr>th,
		.table.no-border>tfoot>tr>td,
		.table.no-border>tfoot>tr>th,
		.table.no-border>thead>tr>td,
		.table.no-border>thead>tr>th {
		    padding: 8px;
		    line-height: 1.42857143;
		    vertical-align: top;
		    border-top: 0 !important;
		}

		body{
			font: 12px/1 Arial,Helvetica,Tahoma,sans-serif;
		    color: #333;
		    background: #eeeeee;
		}

		.divider {
		    background-color: #eee;
		    padding: 3px 10px;
		    text-transform: uppercase;
		}

		.table th{
			width: 350px;
		}

		.textbox{
			padding: 10px;
		}
	</style>
</head>
<body>
	<br><br>

	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-2"  style="background-color: #fff;">
				<div class="row">
					<div class="col-md-8">
						<br><br><br>
						<h2>
							@can('view', $cv)
								{{ $resume->personal->first_name }} {{ $resume->personal->last_name }}
							@else
								Name: *********
							@endcan
						</h2>
						<br>
						<table class="table no-border">
							<tr><th>Gender</th><td>{{ $resume->personal->gender }}</td></tr>
							<tr><th>Marital</th><td>{{ $resume->personal->marital }}</td></tr>
							<tr><th>Date of Birth</th><td>{{ $resume->personal->dob }}</td></tr>
							<tr><th>Nationality</th><td>{{ $resume->personal->nationality }}</td></tr>

							@can('view', $cv)
								<tr><th>Mobile</th><td>{{ $resume->personal->mobile }}</td></tr>
								<tr><th>Email</th><td>{{ $resume->personal->email }}</td></tr>
								<tr><th>Address</th><td>{{ $resume->personal->address }}</td></tr>
							@else
								<tr><th>Mobile</th><td>	*********</td></tr>
								<tr><th>Email</th><td>	*********</td></tr>
								<tr><th>Address</th><td>*********</td></tr>
							@endcan
						</table>
					</div>
					<div class="col-md-4">
						<br><br><br>
						<img width="200" class="img-thumbnail" src="{{ auth()->user()->avatar->path() }}">
					</div>
				</div>

				<div class="divider">
					<h5>Career Profile</h5>
				</div>
				<div class="row">
					<div class="col-md-8">
						<br>
						<table class="table no-border">
							<tr><th>Highest Qualification</th><td>{{ get_education($resume->career->level)->name }}</td></tr>
							<tr><th>Latest Career Level</th><td>{{ get_level($resume->career->level)->name }}</td></tr>
							<tr><th>Year of Exp</th><td>{{ $resume->career->experience }}</td></tr>
							<tr><th>Latest Position</th><td>{{ $resume->career->position }}</td></tr>
							<tr><th>Latest Job Function</th><td>{{ get_category($resume->career->category)->name }}</td></tr>
							<tr><th>Latest Industry</th><td>{{ get_industry($resume->career->industry)->name }}</td></tr>
							<tr><th>Latest Salary($)</th><td>{{ $resume->career->salary }}</td></tr>
						</table>
					</div>
				</div>

				<div class="divider">
					<h5>Job Preferrences</h5>
				</div>
				<div class="row">
					<div class="col-md-8">
						<br>
						<table class="table no-border">
							<tr><th>Industry</th><td>{{ get_industry($resume->preferrences->industry)->name }}</td></tr>
							<tr><th>Location</th><td>{{ get_location($resume->preferrences->location)->name }}</td></tr>
							<tr><th>Function</th><td>{{ get_category($resume->preferrences->category)->name }}</td></tr>
							<tr><th>Position</th><td>{{ $resume->preferrences->position }}</td></tr>
							<tr><th>Expected Salary</th><td>{{ $resume->preferrences->salary }}</td></tr>
							<tr><th>Term</th><td>{{ get_term($resume->preferrences->term)->name }}</td></tr>
							<tr><th>Availability</th><td>{{ $resume->preferrences->availability }}</td></tr>
							<tr><th>Willing to travel?</th><td>{{ ucfirst($resume->preferrences->travel) }}</td></tr>
						</table>
					</div>
				</div>

				<div class="divider">
					<h5>Education</h5>
				</div>
				<div class="row">
					<div class="col-md-8">
						<br>
						@if(count($resume->educations) > 0)
							@foreach($resume->educations as $education)
								<table class="table no-border">
									<tr><th>Qualification</th><td>{{ get_education($education->qualification)->name }}</td></tr>
									<tr><th>Time</th><td>{{ $education->from }} - {{ $education->to }}</td></tr>
									<tr><th>Institute/University</th><td>{{ $education->university }}</td></tr>
									<tr><th>Field of Study</th><td>{{ $education->field }}</td></tr>
									<tr><th>Description</th><td>{{ $education->description }}</td></tr>
								</table>
								<hr>
							@endforeach
						@endif
					</div>
				</div>

				<div class="divider">
					<h5>Language</h5>
				</div>
				<div class="row">
					<div class="col-md-8">
						<br>
						@if(count($resume->languages) > 0)
							<table class="table no-border">
							@foreach($resume->languages as $language)
								<tr><th>{{ ucfirst($language->title) }}</th><td>{{ ucfirst($language->level) }}</td></tr>
							@endforeach
							</table>
						@endif
					</div>
				</div>

				<div class="divider">
					<h5>Work Experience</h5>
				</div>
				<div class="row">
					<div class="col-md-8">
						<br>
						@if(count($resume->experiences) > 0)
							<table class="table no-border">
							@foreach($resume->experiences as $experience)
								<tr><th>Time</th><td>{{ $experience->from }}-{{ $experience->to }}</td></tr>
								<tr><th>Company</th><td>{{ $experience->company }}</td></tr>
								<tr><th>Position</th><td>{{ $experience->position }}</td></tr>
								<tr><th>Description</th><td>{{ $experience->descritpion }}</td></tr>
							@endforeach
							</table>
						@endif
					</div>
				</div>

				<div class="divider">
					<h5>Skills</h5>
				</div>
				<div class="row">
					<div class="col-md-8">
						<br>
						@if(count($resume->skills) > 0)
							<table class="table no-border">
								@foreach($resume->skills as $skill)
									<tr><th>Skill</th><td>{{ $skill->title }}</td></tr>
									<tr><th>Experience</th><td>{{ $skill->experiences }} Years</td></tr>
								@endforeach
							</table>
						@endif
					</div>
				</div>

				<div class="divider">
					<h5>Training</h5>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="textbox">{{ $resume->training }}</div>
					</div>
				</div>

				<div class="divider">
					<h5>Hobby</h5>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="textbox">{{ $resume->hobby }}</div>
					</div>
				</div>

				<div class="divider">
					<h5>Reference</h5>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="textbox">{{ $resume->reference }}</div>
					</div>
				</div>

				{{-- @can('nview', $cv)
					<div class="row">
						<div class="col-md-12 text-center">
							<br>
							<button class="btn btn-primary">Buy Resume</button>
						</div>
					</div>
				@endcan --}}
				<br><br><br>
			</div>
		</div>
	</div>
</body>
</html>