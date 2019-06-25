<template>
<div>
	<header class="page-title-bar">
		<div class="d-flex flex-column flex-md-row">
			<p class="lead">
				<span class="font-weight-bold">Hi, Admin.</span>
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
							<div class="metric metric-bordered align-items-center">
								<h2 class="metric-label">Listings </h2>
								<p class="metric-value h3">
									<sub>
										<i class="fa fa-tasks"></i>
									</sub>
									<span class="value">{{ user.listings }}</span>
								</p>
							</div>
							<!-- /.metric -->
						</div>
						<!-- /metric column -->
						<!-- metric column -->
						<div class="col">
							<!-- .metric -->
							<div class="metric metric-bordered align-items-center">
								<h2 class="metric-label">Employers</h2>
								<p class="metric-value h3">
									<sub>
										<i class="oi oi-people"></i>
									</sub>
									<span class="value">{{ user.employers }}</span>
								</p>
							</div>
							<!-- /.metric -->
						</div>
						<!-- /metric column -->
						<!-- metric column -->
						<div class="col">
							<!-- .metric -->
							<div class="metric metric-bordered align-items-center">
								<h2 class="metric-label">Candidates</h2>
								<p class="metric-value h3">
									<sub>
										<i class="oi oi-people"></i>
									</sub>
									<span class="value">00</span>
								</p>
							</div>
							<!-- /.metric -->
						</div>
						<!-- /metric column -->
						<!-- metric column -->
						<div class="col">
							<!-- .metric -->
							<div class="metric metric-bordered align-items-center">
								<h2 class="metric-label">Deposit</h2>
								<p class="metric-value h3">
									<sub>
										<i class="fa fa-hand-holding-usd"></i>
									</sub>
									<span class="value">{{ user.deposits }}</span>
								</p>
							</div>
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
										<th>Company</th>
									</tr>
								</thead>
								<tbody>
									<template v-if="listings.length">
										<tr v-for="(item, index, key) in listings">
											<td>{{ item.id }}</td>
											<td>{{ item.title }}</td>
											<td>{{ item.category }}</td>
											<td>{{ item.location }}</td>
											<td>
												{{ item.company }}
											</td>
										</tr>
									</template>
									<template v-else>
										<tr>
											<td colspan="5" class="text-center">
												No any listing
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
								<span class="mr-auto">Latest Companies</span>
								
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-hover">
								<thead class="thead-">
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Username</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Website</th>
									</tr>
								</thead>
								<tbody>
									<template v-if="company.length">
										<tr v-for="(item, index, key) in company">
											<td>{{ item.id }}</td>
											<td>{{ item.name }}</td>
											<td>{{ item.username }}</td>
											<td>{{ item.phone }}</td>
											<td>{{ item.email }}</td>
											<td>{{ item.website }}</td>
										</tr>
									</template>
									<template v-else>
										<tr>
											<td colspan="5" class="text-center">
												No any company
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
								<span class="mr-auto">Latest Pending Deposits</span>
								
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-hover">
								<thead class="thead-">
									<tr>
										<th>#</th>
										<th>Company</th>
										<th>Gateway</th>
										<th>Amount</th>
										<th>Status</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									<template v-if="deposits.length">
										<tr v-for="(item, index, key) in deposits">
											<td>{{ item.id }}</td>
											<td>{{ item.company }}</td>
											<td>{{ item.gateway }}</td>
											<td>{{ item.amount }}</td>
											<td>{{ item.status }}</td>
											<td>{{ item.date }}</td>
										</tr>
									</template>
									<template v-else>
										<tr>
											<td colspan="5" class="text-center">
												No any deposits
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
		methods: {
			...mapActions({
				fetchListings: 'admin/fetchListings',
				fetchCompany: 'admin/fetchCompany',
				fetchDeposits: 'admin/fetchPendingDeposit',
			})
		},
		mounted(){
			this.fetchListings()
			this.fetchCompany()
			this.fetchDeposits()
		},
		computed: {
			...mapGetters({
				user: 'admin/getUser',
				listings: 'admin/getListings',
				company: 'admin/getCompany',
				deposits: 'admin/getDeposits',
			})
		}
	}
</script>
