<template>
<div>
	<header class="page-title-bar">
		<h1 class="page-title"> Publish jobs </h1>
		<p class="text-muted">Manage your publish jobs</p>
	</header>
	<div class="page-section">
		<!-- .section-block -->
		<div class="section-block">
			<div class="card card-fluid">
				<div class="card-header border-0">
					<div class="d-flex align-items-center">
						<span class="mr-auto">Jobs</span>
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
										No any Job
										<router-link :to="{name: 'create-listing'}">
											Create Job
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
				fetch: 'employer/fetchListing'
			})
		},
		computed: {
			...mapGetters({
				listings: 'employer/getListing'
			})
		},
		mounted(){
			this.fetch()
		}
	}
</script>