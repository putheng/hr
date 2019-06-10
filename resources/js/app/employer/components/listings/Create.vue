<template>
<div>
	<header class="page-title-bar">
		<h1 class="page-title"> Create Listing </h1>
		<p class="text-muted"> A process/progress indicator component communicates to the user the progress of a particular process. </p>
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
									<a @click.prevent="step == 2" href="#" class="step-trigger" tabindex="-1" aria-selected="false"><span class="step-indicator step-indicator-icon"><i class="oi oi-person"></i></span> <span class="d-none d-sm-inline">Personal</span></a>
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
						<form id="stepper-form" name="stepperForm" class="p-lg-4 p-sm-3 p-0" novalidate="">
							<!-- .content -->
							<div class="content" :class="{active: step == 1, 'dstepper-none': step !== 1, 'dstepper-block': step == 1 }">
								<!-- fieldset -->
								<fieldset>
									<legend>Listing details</legend>

									<div class="row">
										<div class="col-md-6">
											<app-input name="location" label="Locations"/>
										</div>
										<div class="col-md-6">
											<app-input name="category" label="Category"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<app-input name="term" label="Job Term"/>
										</div>
										<div class="col-md-6">
											<app-input name="level" label="Career Level"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<app-input name="education" label="Education"/>
										</div>
										<div class="col-md-6">
											<app-input name="salary" label="Salary"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<app-input name="age" label="Age"/>
										</div>
										<div class="col-md-6">
											<app-input name="gender" label="Gender"/>
										</div>
									</div>

									<hr class="mt-5">
									<!-- .d-flex -->
									<div class="d-flex">
										<button @click.prevent="nextStep" type="button" class="next btn btn-primary ml-auto" data-validate="fieldset01">Next step</button>
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
									<legend>Personal Information</legend>
									<!-- .row -->
									<div class="row">
										<!-- grid column -->
										<div class="col-md-6 mb-4">
											<div class="form-label-group">
												<input type="text" id="firstName" class="form-control parsley-success" name="firstName" value="Beni" data-parsley-group="fieldset02" required="" data-parsley-id="7"> <label for="firstName">First name</label>
											</div>
											<div class="invalid-feedback"> Valid first name is required. </div>
										</div>
										<!-- /grid column -->
										<!-- grid column -->
										<div class="col-md-6 mb-4">
											<div class="form-label-group">
												<input type="text" id="lastName" class="form-control parsley-success" name="lastName" value="Arisandi" data-parsley-group="fieldset02" required="" data-parsley-id="9"> <label for="lastName">Last name</label>
											</div>
											<div class="invalid-feedback"> Valid last name is required. </div>
										</div>
										<!-- /grid column -->
									</div>
									<!-- /.row -->
									<!-- .form-group -->
									<!-- /.form-group -->
									<!-- .form-group -->
									<!-- /.form-group -->
									<!-- .row -->
									<!-- /.row -->
									<hr class="mt-5">
									<div class="d-flex">
										<button @click.prevent="previousStep" type="button" class="prev btn btn-secondary">Previous</button>
										<button @click.prevent="nextStep" type="button" class="next btn btn-primary ml-auto" data-validate="fieldset02">Next step</button>
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
									<!-- /.custom-control -->
									<!-- .custom-control -->
									<!-- /.custom-control -->
									<!-- .custom-control -->
									<div class="custom-control custom-radio mb-4">
										<input type="radio" id="pmd3" class="custom-control-input" name="paymentMethod" value="stripe" data-parsley-multiple="paymentMethod"> <label class="custom-control-label" for="pmd3">Stripe</label> <!-- .custom-control-hint -->
										<div class="custom-control-hint">
											<button class="btn btn-primary" type="button">Connect with <strong><em>Stripe</em></strong></button>
										</div>
										<!-- /.custom-control-hint -->
									</div>
									<!-- /.custom-control -->
									<hr class="mt-5">
									<div class="d-flex">
										<button @click.prevent="previousStep" type="button" 
											class="prev btn btn-secondary">
											Previous
										</button>

										<button @click.prevent="nextStep" type="button" 
											class="next btn btn-primary ml-auto"
											data-validate="fieldset03">
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
											<p> Dicta asperiores ea voluptatum nihil quasi, officia tempora voluptates. Quidem reprehenderit nesciunt culpa, architecto iure, neque itaque suscipit, iusto, porro ipsum consequatur! </p>
										</div>
									</div>
									<!-- /.card -->
									<!-- .form-group -->
									<div class="form-group">
										<!-- .custom-control -->
										<div class="custom-control custom-checkbox">
											<input type="checkbox" id="agreement" name="agreement" class="custom-control-input" data-parsley-group="agreement" required="" data-parsley-multiple="agreement"> <label class="custom-control-label" for="agreement">Agree to terms and conditions</label>
										</div>
										<!-- /.custom-control -->
									</div>
									<!-- /.form-group -->
									<hr class="mt-5">
									<div class="d-flex">
										<button @click.prevent="previousStep" type="button" class="prev btn btn-secondary">Previous</button>
										<button @click.prevent="submit" type="submit" class="submit btn btn-primary ml-auto" data-validate="agreement">Submit</button>
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
	import { mapGetters } from 'vuex'

	export default {
		data(){
			return {
				step: 1,
			}
		},
		methods: {
			nextStep(){
				if(this.step <= 4){
					this.step++
				}
			},
			previousStep(){
				this.step--
			},
			submit(){

			}
		}
	}
</script>