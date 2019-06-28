<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title">Rejected deposits</h3>

		<table class="table">
			<thead>
				<th>#</th>
				<th>Company</th>
				<th>Gateway</th>
				<th>Amount</th>
				<th>CODE</th>
				<th>Description</th>
			</thead>
			<tbody>
				<template v-if="deposits.length">
					<tr v-for="item in deposits">
						<td>{{ item.id }}</td>
						<td>{{ item.company }}</td>
						<td>{{ item.gateway }}</td>
						<td>{{ item.amount }}</td>
						<td>{{ item.transaction }}</td>
						<td>{{ item.description }}</td>
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
</template>

<script>
	import { mapActions, mapGetters } from 'vuex'

	export default {
		methods: {
			...mapActions({
				'fetch': 'admin/fetchRejectedDeposit'
			})
		},
		computed: {
			...mapGetters({
				deposits : 'admin/getDeposits'
			})
		},
		mounted(){
			this.fetch()
		}
	}
</script>
