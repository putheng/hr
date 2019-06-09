<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title"> All Packages </h3>

		<table class="table">
			<thead>
				<th>Title</th>
				<th>Posts</th>
				<th>CVs</th>
				<th>Price</th>
				<th>Days</th>
				<th></th>
			</thead>
			<tbody>
				<template v-if="packages.length">
					<tr v-for="item in packages">
						<td>{{ item.title }}</td>
						<td>{{ item.post }}</td>
						<td>{{ item.cv }}</td>
						<td>{{ item.price }}</td>
						<td>{{ item.days }}</td>
						<td class="align-middle text-right">
							<router-link class="btn btn-sm btn-icon btn-secondary" :to="{ name: 'edit-package', params: { id: item.id }}">
								<i class="fa fa-pencil-alt"></i>
								<span class="sr-only">Edit</span>
							</router-link>
						</td>
					</tr>
				</template>

				<template v-else>
					<tr>
						<td colspan="6">
							<p class="text-center">Empty
								<router-link :to="{ name: 'create-package' }">Create</router-link>
							</p>
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
				'fetchPackages': 'admin/fetchPackages'
			})
		},
		computed: {
			...mapGetters({
				'packages': 'admin/packages'
			})
		},
		mounted(){
			this.fetchPackages()
		}
	}
</script>
