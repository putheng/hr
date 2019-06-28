<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title">Pending deposits</h3>

		<table class="table v-top">
			<thead>
				<th>#</th>
				<th>Company</th>
				<th>Gateway</th>
				<th>Amount</th>
				<th>CODE</th>
				<th>Date</th>
				<th>Action</th>
			</thead>
			<tbody>
				<template v-if="deposits.length">
					<tr v-for="(item, key) in deposits">
						<td>{{ item.id }}</td>
						<td>{{ item.company }}</td>
						<td>{{ item.gateway }}</td>
						<td>{{ item.amount }}</td>
						<td>{{ item.transaction }}</td>
						<td>{{ item.date }}</td>
						<td>
							<a href="#" class="btn btn-primary btn-sm"
								data-toggle="modal"
								:data-target="convertToTarget(item.date)">
								Accept
							</a>
							<a href="#" class="btn btn-danger btn-sm"
								data-toggle="modal"
								:data-target="convertToTarget('reject'+item.date)">
								Reject
							</a>

							<app-modal commit="admin/setDeposits" :data="{id:item.id}" :option="options" cancel="Close" :id="convertToID(item.date)" title="Confirmation">
								<table class="table">
									<tr>
										<th>Gateway</th>
										<td>{{ item.gateway }}</td>
									</tr>
									<tr>
										<th>Amount</th>
										<td>{{ item.amount }}</td>
									</tr>
									<tr>
										<th>Code</th>
										<td>{{ item.transaction }}</td>
									</tr>
								</table>
							</app-modal>
							<app-modal commit="admin/setDeposits" :data="{id:item.id}" :option="rejectOption" cancel="Close" :id="convertToID('reject'+item.date)" title="Confirmation">
								<table class="table">
									<tr>
										<th>Gateway</th>
										<td>{{ item.gateway }}</td>
									</tr>
									<tr>
										<th>Amount</th>
										<td>{{ item.amount }}</td>
									</tr>
									<tr>
										<th colspan="2">
											<app-text max="200" name="description" label="Description" />
										</th>
									</tr>
								</table>
							</app-modal>
						</td>
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
				'fetch': 'admin/fetchPendingDeposit'
			}),
			convertToID(text){
			    return text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'')
			},
			convertToTarget(text){
			    return '#'+ this.convertToID(text)
			}
		},
		data(){
			return {
				options: {
					title: 'Confirm',
					url: '/api/payment/approve',
				},
				rejectOption: {
					title: 'Reject',
					url: '/api/payment/reject',
				}
			}
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
