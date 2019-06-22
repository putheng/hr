<template>
<div class="section-block">
	<h4 class="section-title">Manage your wallet</h4>
	<p>The Advertiser's Wallet allows you to make a larger deposit to your account and use these funds to purchase multiple packages. You can also transfer funds from previous package back to your wallet balance ready to fund a different package. It gives you complete control over the money in your advertising account and is ideal for testing many small packages.</p>

			<!-- metric row -->
			<div class="metric-row">
				<div class="col-lg-12">
					<div class="metric-row metric-flush">
						<!-- metric column -->
						<div class="col">
							<!-- .metric -->
							<router-link :to="{name:'publish-listing'}" class="metric metric-bordered align-items-center">
								<h2 class="metric-label"> Current </h2>
								<p class="metric-value h3">
									<sub><i class="fa fa-hand-holding-usd"></i></sub> <span class="value">00</span>
								</p>
							</router-link>
							<!-- /.metric -->
						</div>
						<!-- /metric column -->
						<!-- metric column -->
						<div class="col">
							<!-- .metric -->
							<router-link :to="{name:'my-packages'}" class="metric metric-bordered align-items-center">
								<h2 class="metric-label"> Accepted </h2>
								<p class="metric-value h3">
									<sub><i class="fa fa-hand-holding-usd"></i></sub> <span class="value">00</span>
								</p>
							</router-link>
							<!-- /.metric -->
						</div>
						<!-- /metric column -->
						<!-- metric column -->
						<div class="col">
							<!-- .metric -->
							<router-link :to="{name:'my-wallet'}" class="metric metric-bordered align-items-center">
								<h2 class="metric-label"> Pending </h2>
								<p class="metric-value h3">
									<sub><i class="fa fa-hand-holding-usd"></i></sub> <span class="value">00</span>
								</p>
							</router-link>
							<!-- /.metric -->
						</div>
						<!-- /metric column -->
					</div>
				</div>
			</div>


	<div class="card card-fluid">
		<div class="card-header border-0">
			<div class="d-flex align-items-center">
				<span class="mr-auto">Transactions</span>
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
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		methods: {
			...mapActions({
				fetch: 'employer/fetchDeposits'
			})
		},
		computed: {
			...mapGetters({
				deposits: 'employer/getDeposits'
			})
		},
		mounted(){
			this.fetch()
		}
	}
</script>