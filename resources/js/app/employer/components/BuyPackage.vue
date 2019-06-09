<template>
<div class="section-block">
	<h2 class="section-title"> Service Packages </h2>
	<div class="row">
		<div class="col-md-4" v-for="(item, key) in packages">
			<div class="card text-dark bg-light">
				<div class="card-header text-center">{{ item.title }}</div>
				<!-- .card-body -->
				<div class="card-body">
					<p class="card-text">
						<div class="h6 text-center">Price: {{ item.price }}<small>$</small></div><br>
						<p class="text-center">{{ item.post }} Job</p>
						<p class="text-center">{{ item.cv }} Free CVs</p>
						<p class="text-center">{{ item.days }} Days</p>
					</p>
				</div>
				<!-- /.card-body -->
				<!-- .card-footer -->
				<div class="card-footer">
					<a href="#" class="card-footer-item card-footer-item-bordered card-link"
						data-toggle="modal"
						:data-target="convertToTarget(item.title)"
					>
						Purchase Now
					</a>
					<app-modal :data="{id:item.id,price:item.price}" :option="options" cancel="Close" :id="convertToID(item.title)" title="Purchase order confirmation">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<th>ORDER DESCRIPTION</th>
									<th class="text-center">QUANTITY</th>
									<th>AMOUNT</th>
								</tr>
								<tr>
									<td>{{ item.title }}</td>
									<td class="text-center">1</td>
									<td>${{ item.price }}.00</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td class="text-right">
										Subtotal
									</td>
									<td>$<span id="subtotal">{{ item.price }}</span>.00</td>
								</tr>
								<tr>
									<td colspan="2" class="text-right"><strong>Amount Payable:</strong></td>
									<td>$<span id="payable">{{ item.price }}</span>.00</td>
								</tr>
							</tbody>
						</table>
					</app-modal>
				</div>
				<!-- /.card-footer -->
			</div>
		</div>
	</div>
</div>
</template>

<script>
	import { mapActions, mapGetters } from 'vuex'

	export default {
		data(){
			return {
				options: {
					title: 'Complete Payment',
					url: '/api/package/buy',
					redirect: '/employer/package/my'
				}
			}
		},
		methods: {
			...mapActions({
				'fetchPackages': 'employer/fetchPackages'
			}),
			convertToID(text){
			    return text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'')
			},
			convertToTarget(text){
			    return '#'+ text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'')
			}
		},
		computed: {
			...mapGetters({
				'packages': 'employer/packages'
			}),
		},
		mounted(){
			this.fetchPackages()
		}
	}
</script>
