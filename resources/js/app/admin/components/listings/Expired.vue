<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title">Expires Jobs</h3>

		<table class="table">
			<thead>
				<th>#</th>
				<th>Title</th>
				<th>Company</th>
				<th>Category</th>
				<th>Location</th>
				<th>Expired at</th>
			</thead>
			<tbody>
				<template v-if="listings.length">
					<tr v-for="item in listings">
						<td>{{ item.id }}</td>
						<td>{{ item.title }}</td>
						<td>{{ item.company }}</td>
						<td>{{ item.category }}</td>
						<td>{{ item.location }}</td>
						<td>{{ item.expired }}</td>
					</tr>
				</template>

				<template v-else>
					<tr>
						<td colspan="5" class="text-center">
							No any Jobs
						</td>
					</tr>
				</template>
			</tbody>
		</table>
	</div>
</div>
</template>

<script>
	import { mapActions, mapGetters } from 'vuex'

	export default {
		methods: {
			...mapActions({
				'fetch': 'admin/fetchExpiredListings'
			})
		},
		computed: {
			...mapGetters({
				listings : 'admin/getListings'
			})
		},
		mounted(){
			this.fetch()
		}
	}
</script>
