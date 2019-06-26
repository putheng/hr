<template>
<div>
	<h2 class="section-title"> Create Resume </h2>
	<div class="row">
		<div class="col-md-8">
			<app-form action="/api/resume/create">
				<div class="card card-fluid">
					<div class="card-header">Resume Title</div>
					<div class="card-body">
						<app-input name="title" />
					</div>
				</div>

				<div class="card card-fluid">
					<div class="card-header">Work Experience</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
									<app-input name="From" />
								</div>
								<div class="col">
									<app-input name="To" />
								</div>
						</div>
						<app-text name="Description" label="description" max="1000" />
					</div>
				</div>

				<div class="card card-fluid">
					<div class="card-body">
						<app-text name="training" label="Training" max="1000" />
					</div>
				</div>

				<div class="card card-fluid">
					<div class="card-body">
						<app-text name="reference" label="Reference" max="1000" />
					</div>
				</div>

				<div class="card card-fluid">
					<div class="card-body">
						<app-text name="hobby" label="Hobby" max="1000" />
					</div>
				</div>

				<div class="card card-fluid">
					<div class="card-footer">
						<div class="card-footer-item card-footer-item-bordered card-link">
							<app-button type="submit">Save</app-button>
						</div>
					</div>
				</div>
			</app-form>
			
		</div>
	</div>
</div>
</template>

<script>
	import { mapGetters } from 'vuex'

	export default {
		computed: {
			...mapGetters({
				user: 'employer/getUser'
			})
		}
	}
</script>