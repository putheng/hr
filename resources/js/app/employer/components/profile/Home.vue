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

			<div class="row">

				<div class="col-md-12">
					<div class="card card-fluid">
						<div class="card-header border-0">
							<div class="d-flex align-items-center">
								<span class="mr-auto">Latest Listing</span>
								
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-hover">
								<thead class="thead-">
									<tr>
										<th>#</th>
										<th>Title</th>
										<th>Location</th>
										<th>Category</th>
									</tr>
								</thead>
								<tbody>
									<template v-if="listings.length">
										<tr v-for="(item, index, key) in listings">
											<td>{{ item.id }}</td>
											<td>{{ item.title }}</td>
											<td>{{ item.category }}</td>
											<td>{{ item.location }}</td>
										</tr>
									</template>
									<template v-else>
										<tr>
											<td colspan="5" class="text-center">
												No any listing
												<router-link :to="{name: 'create-listing'}">
													Create listing
												</router-link>
											</td>
										</tr>
									</template>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				<div class="col-md-12">
					<div class="card card-fluid">
						<div class="card-header border-0">
							<div class="d-flex align-items-center">
								<span class="mr-auto">Packages</span>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-hover">
								<thead class="thead-">
									<tr>
										<th>Title</th>
										<th>Listings</th>
										<th>Remain Listings</th>
										<th>CV</th>
										<th>Price</th>
										<th>Expire Days</th>
									</tr>
								</thead>
								<tbody>
									<template v-if="listings.length">
										<tr v-for="(item, index, key) in packages">
											<td>{{ item.title }}</td>
											<td>{{ item.post }}</td>
											<td>{{ item.remain_post }}</td>
											<td>{{ item.cv }}</td>
											<td>{{ item.price }}</td>
											<td>{{ item.days }}</td>
										</tr>
									</template>
									<template v-else>
										<tr>
											<td colspan="5" class="text-center">
												No any package
												<router-link :to="{name: 'buy-package'}">
													Buy a package
												</router-link>
											</td>
										</tr>
									</template>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="card card-fluid">
						<div class="card-header border-0">
							<div class="d-flex align-items-center">
								<span class="mr-auto">Wellet Transactions</span>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-hover">
								<thead class="thead-">
									<tr>
										<th> DATE </th>
										<th> Gateway </th>
										<th> AMOUNT </th>
										<th> TRANSACTION CODE </th>
										<th> STATUS </th>
									</tr>
								</thead>
								<tbody>
									<template v-if="deposits.length">
										<tr v-for="(item, key) in deposits" :key="key">
											<td>{{ item.date }}</td>
											<td> {{ item.gateway }} </td>
											<td> ${{ item.amount }} </td>
											<td> {{ item.transaction }} </td>
											<td> {{ item.status }} </td>
										</tr>
									</template>
									<template v-else>
										<tr>
											<td colspan="5">
												<p class="text-center">
													No any deposit 
													<router-link :to="{name:'my-deposit'}">Make a deposit</router-link>
												</p>
											</td>
										</tr>
									</template>
								</tbody>
							</table>
						</div>
					</div>
				</div>
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
				user : 'employer/getUser',
				listings: 'employer/getListing',
				packages: 'employer/getPackages',
				deposits: 'employer/getDeposits',
			})
		},
		methods: {
			...mapActions({
				fetchListing: 'employer/fetchListing',
				fetchMyPackages: 'employer/fetchMyPackages',
				fetchDeposits: 'employer/fetchDeposits'
			})
		},
		mounted(){
			this.fetchListing()
			this.fetchMyPackages()
			this.fetchDeposits()
		}
	}
</script>
