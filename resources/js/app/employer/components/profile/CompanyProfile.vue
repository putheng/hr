<template>
<div>
	<header class="page-title-bar">
		<h1 class="page-title"> Edit company profile </h1>
	</header>
	<div class="page-section">
		<div class="card">
			<div class="card-body">
				<app-form action="/api/profile/edit">
					<fieldset>
						<app-input name="name" label="Company name" />

						<div class="row">
							<div class="col-md-6">
								<app-input name="phone" label="Contact phone number" />
							</div>
							<div class="col-md-6">
								<app-input name="email" label="Contact email" />
							</div>
						</div>
						<app-input name="website" label="Website" />
						

						<app-text name="address" max="500" label="Address"/>
						<app-text name="about" max="2000" label="About company"/>

						<app-check-box name="term" label="By editing an account you agree to the Terms of Use and Privacy Policy."/>
						<!-- /.form-group -->

						<app-button type="submit">Update</app-button>
					</fieldset>
					<!-- /.fieldset -->
				</app-form>
				<!-- /.form -->
			</div>
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