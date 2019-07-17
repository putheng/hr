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
									<a href="#" class="step-trigger" tabindex="-1" aria-selected="true"><span class="step-indicator step-indicator-icon"><i class="oi oi-account-login"></i></span> <span class="d-none d-sm-inline">Listing</span></a>
								</li>
								<li class="step" :class="{active: step == 2, success: step > 2 }">
									<a @click.prevent="step == 2" href="#" class="step-trigger" tabindex="-1" aria-selected="false"><span class="step-indicator step-indicator-icon"><i class="oi oi-person"></i></span> <span class="d-none d-sm-inline">Filters</span></a>
								</li>
								<li @click.prevent="step == 3" class="step" :class="{active: step == 3, success: step > 3 }">
									<a href="#" class="step-trigger" tabindex="-1" aria-selected="false"><span class="step-indicator step-indicator-icon"><i class="oi oi-credit-card"></i></span> <span class="d-none d-sm-inline">Payment</span></a>
								</li>
								<li @click.prevent="step == 4" class="step" :class="{active: step == 4, success: step > 4 }">
									<a href="#" class="step-trigger" tabindex="-1" aria-selected="false"><span class="step-indicator step-indicator-icon"><i class="oi oi-check"></i></span> <span class="d-none d-sm-inline">Confirm</span></a>
								</li>
							</ul>
						</div>
						<!-- /.steps -->
					</div>
					<!-- /.card-header -->
					<!-- .card-body -->
					<div class="card-body">
						<app-form id="create-listing-form" action="/api/listing/create" class="p-lg-4 p-sm-3 p-0" redirect="/employer/listing/publish">
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
									<legend>Payment Information</legend>
									<!-- .custom-control -->
									<app-select v-model="payment.package" label="Package" name="package" commit="MyPackages"></app-select>
									<!-- /.custom-control -->

									<hr class="mt-5">
									<div class="d-flex">
										<button @click.prevent="previousStep" type="button" 
											class="prev btn btn-secondary">
											Previous
										</button>
										<!-- &nbsp;&nbsp;&nbsp;
										<button @click.prevent="formSave"
											type="submit"
											class="submit btn btn-secondary">
											Save
										</button> -->

										<button @click.prevent="submitPayment"
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
							<div class="content" :class="{active: step == 4, 'dstepper-none': step !== 4, 'dstepper-block': step == 4 }">
								<fieldset>
									<legend>Terms Agreement</legend>
									<!-- .card -->
									<div class="card bg-light">
										<div class="card-body overflow-auto" style="height: 260px">
											<p>HR Dimension operates as a talent solutions company with expertise in specialised permanent and contracting recruitment, using database and websites. Our solutions are built on trust and privacy. This is why we are committed to protecting the personal information of employers and candidates. We encourage you to review the statements below explaining how we collect and use information you share with us.</p>
											<p>The HR Dimension Privacy Policy outlines how HR Dimension collects, discloses, uses, stores or otherwise handles your personal information.</p>

											<h6>CONSENT</h6>
											<p>By accessing HR Dimension websites and/or submitting your personal information to HR Dimension through any means, you consent to the use of your information as set out in the Policy. If you do not agree with any term of the Policy, please do not use HR Dimension's services or website.</p>

											<h6>DATA SECURITY AND STORAGE</h6>
											<p>HR Dimension takes reasonable steps to protect the personal information we hold from loss, unauthorised access, and misuse. The use of locks and security systems assist HR Dimension in protecting your personal information. Your personal information may be stored in hard copy documents, or electronically on HR Dimension's software or systems. When no longer required, personal information is destroyed in a secure manner or deleted.</p>
										</div>
									</div>
									<!-- /.card -->
									<!-- .form-group -->
									<app-checkbox name="terms_conditions" label="Agree to terms and conditions"/>
									<!-- /.form-group -->
									<hr class="mt-5">
									<div class="d-flex">
										<button @click.prevent="previousStep"
											type="button"
											class="prev btn btn-secondary">
											Previous
										</button>

										<app-button class="ml-auto" type="submit">Publish</app-button>
									</div>
								</fieldset>
								<!-- /fieldset -->
							</div>
							<!-- /.content -->
						</app-form>
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
				payment: {
					package: ''
				}
			}
		},
		methods: {
			...mapActions({
				clearMessage: 'clearMessage'
			}),
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
			submitPayment(){
				this.loading = true
				axios.post('/api/listing/create/c', this.payment).then((response) => {
					this.loading = false
					this.clearMessage()
					this.step++
				}).catch((error) => {
					this.loading = false
				})
			},
			formSave(){
				this.loading = true
				axios.post('/api/listing/create/save', [ this.payment, this.second, this.listing ]).then((response) => {
					this.loading = false

				}).catch((error) => {
					this.loading = false
				})
			},
			previousStep(){
				this.step--
			}
		}
	}
</script>