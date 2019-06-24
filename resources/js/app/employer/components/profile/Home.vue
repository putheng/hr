<template>
<div>
	<header class="page-title-bar">
		<div class="d-flex flex-column flex-md-row">
			<p class="lead">
				<span class="font-weight-bold">Hi, {{ user.name }}.</span>
				<span class="d-block text-muted">
					Here’s what’s happening with your business today.
				</span>
			</p>
		</div>
	</header>

	<div class="page-section">
		<div class="section-block">
			<!-- metric row -->
			<div class="metric-row">
				<div class="col-lg-12">
					<div class="metric-row metric-flush">
						<!-- metric column -->
						<div class="col">
							<!-- .metric -->
							<router-link :to="{name:'publish-listing'}" class="metric metric-bordered align-items-center">
								<h2 class="metric-label"> Listings </h2>
								<p class="metric-value h3">
									<sub><i class="fa fa-tasks"></i></sub> <span class="value">{{ user.listings }}</span>
								</p>
							</router-link>
							<!-- /.metric -->
						</div>
						<!-- /metric column -->
						<!-- metric column -->
						<div class="col">
							<!-- .metric -->
							<router-link :to="{name:'my-packages'}" class="metric metric-bordered align-items-center">
								<h2 class="metric-label"> Packages </h2>
								<p class="metric-value h3">
									<sub><i class="oi oi-fork"></i></sub> <span class="value">{{ user.packages }}</span>
								</p>
							</router-link>
							<!-- /.metric -->
						</div>
						<!-- /metric column -->
						<!-- metric column -->
						<div class="col">
							<!-- .metric -->
							<router-link :to="{name:'my-wallet'}" class="metric metric-bordered align-items-center">
								<h2 class="metric-label"> Balance </h2>
								<p class="metric-value h3">
									<sub><i class="fa fa-hand-holding-usd"></i></sub> <span class="value">{{ user.usd }}</span>
								</p>
							</router-link>
							<!-- /.metric -->
						</div>
						<!-- /metric column -->
					</div>
				</div>
			</div>
			<!-- /metric row -->
		</div>
	</div>
</div>
</template>

<script>
	import { mapGetters } from 'vuex'

	export default {
		computed: {
			...mapGetters({
				user : 'employer/getUser'
			})
		}
	}
</script>
