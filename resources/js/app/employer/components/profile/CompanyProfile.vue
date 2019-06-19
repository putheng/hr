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
						<template v-for="(item, index, key) in company">
							
							<div class="row">
								<div class="col-md-6">
									<app-input :value="item" v-if="index == 'name'" name="name" label="Company name" />
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<app-input :value="item" v-if="index == 'phone'" name="phone" label="Contact phone number" />
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<app-input :value="item" v-if="index == 'email'" name="email" label="Contact email" />
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<app-input :value="item" v-if="index == 'website'" name="phone" label="Website" />
								</div>
							</div>

							<div class="row">
								<div class="col-md-9">
									<app-text :value="item" v-if="index == 'address'" name="address" max="500" label="Address"/>
								</div>
							</div>

							<div class="row">
								<div class="col-md-9">
									<app-text :value="item" v-if="index == 'about'" name="about" max="2000" label="About company"/>
								</div>
							</div>
						</template>

						<app-checkbox name="term" label="By editing an account you agree to the Terms of Use and Privacy Policy."/>
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
	import { mapGetters, mapActions } from 'vuex'

	export default {
		computed: {
			...mapGetters({
				company: 'employer/getCompany'
			})
		},
		methods: {
			...mapActions({
				fetchCompany: 'employer/fetchCompany'
			})
		},
		mounted(){
			this.fetchCompany()
		}
	}
</script>