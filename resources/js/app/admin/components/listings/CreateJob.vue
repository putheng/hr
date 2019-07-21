<template>
<div>
	<header class="page-title-bar">
		<h1 class="page-title"> Create Job</h1>
		<p class="text-muted"> Please fill in the form below to create Job</p>
	</header>
	<div class="page-section">
		<!-- .section-block -->
		<div class="section-block">
			<div id="stepper" class="bs-stepper">
				<!-- .card -->
				<div class="card">
					<!-- .card-header -->
					<div class="card-header">
						<!-- .steps -->
						<div class="steps steps-" role="tablist">
							<ul>
								<li @click.prevent="step == 1" class="step" 
									:class="{active: step == 1, success: step > 1 }">
									<a href="#" class="step-trigger" tabindex="-1" aria-selected="true"><span class="step-indicator step-indicator-icon"><i class="oi oi-account-login"></i></span> <span class="d-none d-sm-inline">Job</span></a>
								</li>
								<li class="step" :class="{active: step == 2, success: step > 2 }">
									<a @click.prevent="step == 2" href="#" class="step-trigger" tabindex="-1" aria-selected="false"><span class="step-indicator step-indicator-icon"><i class="oi oi-credit-card"></i></span> <span class="d-none d-sm-inline">Detail</span></a>
								</li>
								<li @click.prevent="step == 3" class="step" :class="{active: step == 3, success: step > 3 }">
									<a href="#" class="step-trigger" tabindex="-1" aria-selected="false"><span class="step-indicator step-indicator-icon">
										<i class="oi oi-person"></i></span> <span class="d-none d-sm-inline">Employer</span></a>
								</li>
							</ul>
						</div>
						<!-- /.steps -->
					</div>
					<!-- /.card-header -->
					<!-- .card-body -->
					<div class="card-body">
						<form id="create-listing-form" class="p-lg-4 p-sm-3 p-0" @submit.prevent="submit">
							<!-- .content -->
							<div class="content" :class="{active: step == 1, 'dstepper-none': step !== 1, 'dstepper-block': step == 1 }">
								<!-- fieldset -->
								<fieldset>
									<legend>Job details</legend>
										<div class="row">
											<div class="col-md-12">
												<app-input v-model="listing.title" name="title" label="Title" />
											</div>
											<div class="col-md-6">
												<app-text v-model="listing.description" max="1000" name="description" label="Description"/>
											</div>
											<div class="col-md-6">
												<app-text v-model="listing.requirements" max="1000" name="requirements" label="Requirements"/>
											</div>
											<div class="col-md-6">
												<app-input v-model="listing.start_date" type="date" name="start_date" label="Start Date" />
											</div>
											<div class="col-md-6">
												<app-input v-model="listing.closing_date" type="date" name="closing_date" label="Closing Date" />
											</div>
										</div>

									<hr class="mt-5">
									<!-- .d-flex -->
									<div class="d-flex">
										<button @click.prevent="nextStep"
											class="btn btn-primary ml-auto" :disabled="loading">
											<span v-if="loading" 
												class="spinner-border spinner-border-sm"
												role="status" aria-hidden="true"></span>
											Next step
										</button>
									</div>
									<!-- /.d-flex -->
								</fieldset>
								<!-- /fieldset -->
							</div>
							<!-- /.content -->
							<!-- .content -->
							<div class="content" :class="{active: step == 2, 'dstepper-none': step !== 2, 'dstepper-block': step == 2 }">
								<!-- fieldset -->
								<fieldset>
									<legend>Filter Information</legend>
									<!-- .row -->
									<div class="row">
										<div class="col-md-6">
											<app-select v-model="second.location" commit="Location" name="location" label="Locations"/>
										</div>
										<div class="col-md-6">
											<app-select v-model="second.category" commit="Categories" name="category" label="Category"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<app-select v-model="second.term" commit="Term" name="term" label="Job Term"/>
										</div>
										<div class="col-md-6">
											<app-select v-model="second.level" commit="Level" name="level" label="Career Level"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<app-select v-model="second.education" commit="Education" name="education" label="Education"/>
										</div>
										<div class="col-md-6">
											<app-select v-model="second.salary" commit="Salary" name="salary" label="Salary"/>
										</div>
										<div class="col-md-6">
											<app-select v-model="second.experience" commit="Experience" name="experience" label="Experiences"/>
										</div>
									</div>
									<hr class="mt-5">
									<div class="d-flex">
										<button @click.prevent="previousStep" type="button" class="prev btn btn-secondary">Previous</button>
										<button @click.prevent="secondStep"
											class="btn btn-primary ml-auto" :disabled="loading">
											<span v-if="loading" 
												class="spinner-border spinner-border-sm"
												role="status" aria-hidden="true"></span>
											Next step
										</button>
									</div>
								</fieldset>
								<!-- /fieldset -->
							</div>
							<!-- /.content -->

							<!-- .content -->
							<div class="content" :class="{active: step == 3, 'dstepper-none': step !== 3, 'dstepper-block': step == 3}">
								<!-- fieldset -->
								<fieldset>
									<legend>Employer Information</legend>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Company Logo</label>
												<input class="form-control" type="file" @change="imageSet" accept="image/*">
											</div>
										</div>
										<div class="col-md-8">
											<div v-if="show" class="avatar-preview">
										        <div id="imagePreview">
										        </div>
										    </div>
										</div>
									</div>
									<!-- .custom-control -->
									<app-input v-model="company.name" name="company" label="Company"/>

									<div class="row">
										<div class="col-md-6">
											<app-input v-model="company.phone" name="phone" label="Phone"/>
										</div>
										<div class="col-md-6">
											<app-input v-model="company.person" name="person" label="Person"/>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-6">
											<app-input v-model="company.email" name="email" label="Email"/>
										</div>
										<div class="col-md-6">
											<app-input v-model="company.address" name="address" label="Company address"/>
										</div>
									</div>
									<!-- /.custom-control -->

									<hr class="mt-5">
									<div class="d-flex">
										<button @click.prevent="previousStep" type="button" 
											class="prev btn btn-secondary">
											Previous
										</button>

										<button @click.prevent="submit"
											class="btn btn-primary ml-auto" :disabled="loading">
											<span v-if="loading" 
												class="spinner-border spinner-border-sm"
												role="status" aria-hidden="true"></span>
											Submit
										</button>
									</div>
								</fieldset>
								<!-- /fieldset -->
							</div>
							<!-- /.content -->
						</form>
						<!-- /form -->
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'
	import axios from 'axios'

	export default {
		data(){
			return {
				step: 1,
				loading: false,
				show: false,
				listing: {
					title: '',
					description: '',
					requirements: '',
					start_date: '',
					closing_date: '',
				},
				second: {
					location: '',
					category: '',
					term: '',
					level: '',
					education: '',
					salary: '',
					experience: '',
				},
				company: {
					name: '',
					person: '',
					phone: '',
					email: '',
					address: '',
				},
				file: '',
			}
		},
		methods: {
			...mapActions({
				clearMessage: 'clearMessage'
			}),
			imageSet(e){
				this.file = e.target.files[0]

				var reader = new FileReader()
				reader.onload = function(e) {
		            $('#imagePreview').css('background-image', 'url('+ e.target.result +')')
		            $('#imagePreview').hide()
		            $('#imagePreview').fadeIn(650)
		        }

		        reader.readAsDataURL(e.target.files[0])
		        this.show = true
			},
			nextStep(){
				this.loading = true
				axios.post('/api/listing/create/a', this.listing).then((response) => {
					this.loading = false
					this.clearMessage()
					this.step++
				}).catch((error) => {
					this.loading = false
				})
			},
			secondStep(){
				this.loading = true
				axios.post('/api/listing/create/b', this.second).then((response) => {
					this.loading = false
					this.clearMessage()
					this.step++
				}).catch((error) => {
					this.loading = false
				})
			},
			thirdStep(){
				this.step++
			},
			submit(e){
				this.$store.commit('setLoading')
				let formData = new FormData();

                formData.append('logo', this.file)
                formData.append('title', this.listing.title)
                formData.append('description', this.listing.description)
                formData.append('requirements', this.listing.requirements)
                formData.append('start_date', this.listing.start_date)
                formData.append('closing_date', this.listing.closing_date)

                formData.append('location', this.second.location)
                formData.append('category', this.second.category)
                formData.append('term', this.second.term)
                formData.append('level', this.second.level)
                formData.append('education', this.second.education)
                formData.append('salary', this.second.salary)
                formData.append('experience', this.second.experience)

                formData.append('name', this.company.name)
                formData.append('person', this.company.person)
                formData.append('phone', this.company.phone)
                formData.append('email', this.company.email)
                formData.append('address', this.company.address)

				return axios.post('/api/admin/job/create', formData).then((response) => {

					this.$router.replace('/admin/listings/publish')

	                return Promise.resolve(response)
	            }).catch((error) => {

	                return Promise.reject(error)
	            })
			},
			previousStep(){
				this.step--
			}
		}
	}
</script>

<style scoped>
	#imagePreview{
		width: 180px;
		height: 100px;
		background-size: contain;
		background-repeat: no-repeat;
	}
</style>