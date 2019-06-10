<template>
<div>
	<header class="page-title-bar">
		<h1 class="page-title"> Create Listing </h1>
		<p class="text-muted"> Please fill in the form below to create listings</p>
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
						<app-form action="/api/listing/create" class="p-lg-4 p-sm-3 p-0" >
							<!-- .content -->
							<div class="content" :class="{active: step == 1, 'dstepper-none': step !== 1, 'dstepper-block': step == 1 }">
								<!-- fieldset -->
								<fieldset>
									<legend>Listing details</legend>

										<div class="row">
											<div class="col-md-12">
												<app-input name="title" label="Title" />
											</div>
											<div class="col-md-6">
												<app-text max="1000" name="description" label="Description"/>
											</div>
											<div class="col-md-6">
												<app-text max="1000" name="requirements" label="Requirements"/>
											</div>
											<div class="col-md-6">
												<app-input type="date" name="start_date" label="Start Date" />
											</div>
											<div class="col-md-6">
												<app-input type="date" name="closing_date" label="Closing Date" />
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
									<legend>Filter Information</legend>
									<!-- .row -->
									<div class="row">
										<div class="col-md-6">
											<app-select commit="Location" name="location" label="Locations"/>
										</div>
										<div class="col-md-6">
											<app-select commit="Categories" name="category" label="Category"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<app-select commit="Term" name="term" label="Job Term"/>
										</div>
										<div class="col-md-6">
											<app-select commit="Level" name="level" label="Career Level"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<app-select commit="Education" name="education" label="Education"/>
										</div>
										<div class="col-md-6">
											<app-select commit="Salary" name="salary" label="Salary"/>
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
										<input type="radio" id="pmd3" class="custom-control-input" name="paymentMethod" value="stripe" data-parsley-multiple="paymentMethod">
										<label class="custom-control-label" for="pmd3">
											Basic packagek
										</label> <!-- .custom-control-hint -->
										<div class="custom-control-hint">
											<button class="btn btn-primary" type="button">
												Buy
												<strong><em>a package</em></strong>
											</button>
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
											Continue to Payment
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
											<input type="checkbox" id="agreement" name="agreement" class="custom-control-input"> 
											<label class="custom-control-label" for="agreement">Agree to terms and conditions</label>
										</div>
										<!-- /.custom-control -->
									</div>
									<!-- /.form-group -->
									<hr class="mt-5">
									<div class="d-flex">
										<button @click.prevent="previousStep"
											type="button"
											class="prev btn btn-secondary">
											Previous
										</button>
										&nbsp;&nbsp;&nbsp;
										<button @click.prevent="submit"
											type="submit"
											class="submit btn btn-secondary">
											Save
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