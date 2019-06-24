<template>
<div class="section-block">
	<h2 class="section-title"> Make a deposit to your wallet </h2>
	<p class="text-muted">Please choose your preferred payment method</p>
	
	<div class="row">
		<div class="col-md-6" v-for="(item, index) in gateway" :key="index">
			<div class="card card-fluid">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="col-auto">
							<div class="user-avatar user-avatar-xl">
								<img :src="item.image" :alt="item.name">
							</div>
						</div>
						<div class="col">
							<h3 class="card-title text-truncate">
								{{ item.name }}
							</h3>
							<h6 class="card-subtitle text-muted">{{ item.recipient }}</h6>
						</div>
						<div class="col-auto">
							<button 
								type="button"
								class="btn btn-icon btn-secondary mr-1"
								data-toggle="modal"
								:data-target="convertToTarget(item.name)"
								data-original-title="Click to deposit">
								<i class="fa fa-hand-holding-usd"></i>
							</button>
							<div class="text-left">
								<app-modal commit="employer/setUser" :key="item.id" :data="{id:item.id}" :option="options" cancel="Close" :id="convertToID(item.name)" :title="item.name">
									<app-input type="text" name="amount" label="Amount($)"/>
									<app-input type="text" name="code" label="Transaction Code"/>
								</app-modal>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	
</div>
</template>

<script>
	import {mapGetters, mapActions} from 'vuex'

	export default {
		data(){
			return {
				options: {
					title: 'Submit',
					url: '/api/payments/deposit',
					redirect: '/employer/payments/wallet'
				}
			}
		},
		methods: {
			...mapActions({
				fetch: 'employer/fetchPaymentGateway'
			}),
			convertToTarget(text){
			    return '#'+ text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'')
			},
			convertToID(text){
			    return text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'')
			},
		},
		computed: {
			...mapGetters({
				gateway: 'employer/getPaymentGateway'
			})
		},
		mounted(){
			this.fetch()
		}
	}
</script>