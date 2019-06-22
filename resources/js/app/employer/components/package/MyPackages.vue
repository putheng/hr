<template>
<div>
	<header class="page-title-bar">
		<h1 class="page-title"> My Package </h1>
	</header>
	<div class="page-section">
		<!-- .section-block -->
		<div class="section-block">
			<div class="card card-fluid">
				<div class="card-header border-0">
					<div class="d-flex align-items-center">
						<span class="mr-auto">Wallet</span>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead class="thead-">
							<tr>
								<th>Title</th>
								<th>Listings</th>
								<th>CV</th>
								<th>Price</th>
								<th>Expire Days</th>
							</tr>
						</thead>
						<tbody>
							<template v-if="listings.length">
								<tr v-for="(item, index, key) in listings">
									<td>{{ item.title }}</td>
									<td>{{ item.post }}</td>
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
	</div>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		methods: {
			...mapActions({
				fetch: 'employer/fetchMyPackages'
			})
		},
		computed: {
			...mapGetters({
				listings: 'employer/getPackages'
			})
		},
		mounted(){
			this.fetch()
		}
	}
</script>