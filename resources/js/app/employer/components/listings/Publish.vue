<template>
<div>
	<header class="page-title-bar">
		<h1 class="page-title"> Publish Listing </h1>
		<p class="text-muted">Manage your publish listings</p>
	</header>
	<div class="page-section">
		<!-- .section-block -->
		<div class="section-block">
			<div class="card card-fluid">
				<div class="card-header border-0">
					<div class="d-flex align-items-center">
						<span class="mr-auto">Wallet</span>
						<div class="dropdown">
							<button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
							<div class="dropdown-arrow"></div>
							<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: top, left; top: 36px; left: 36px;">
								<a href="#" class="dropdown-item">#</a>
								<a href="#" class="dropdown-item">Title</a>
								<a href="#" class="dropdown-item">Location</a>
								<a href="#" class="dropdown-item">Action</a>
								<a href="#" class="dropdown-item">Category</a>
							</div>
						</div>
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
								<th>Action</th>
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
										edit
									</td>
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
	</div>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		methods: {
			...mapActions({
				fetch: 'employer/fetchPublishListing'
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