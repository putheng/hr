<template>
	<div class="">
		<h5>Payment Options</h5>
		<br>
		<div class="list-group list-group-bordered mb-3">
			<div class="list-group-item" v-for="item in gateways">
				<div class="list-group-item-figure">
			        <div class="user-avatar">
			          <img :src="item.image" :alt="item.name">
			        </div>
			    </div>
				<div class="list-group-item-body">{{ item.name }}</div>
				<div class="list-group-item-figure">
					<label class="switcher-control switcher-control-success">
						<input 
							type="checkbox"
							name="onoffswitch"
							class="switcher-input"
							:checked="item.status"
							@change="update(item.id)"
						>
						<span class="switcher-indicator"></span>
					</label>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import { mapActions, mapGetters, } from 'vuex'

	export default {
		methods: {
			...mapActions({
				'fetch' : 'admin/fetchPaymentGateway',
				'update': 'admin/updatePaymentOption'
			})
		},
		computed: {
			...mapGetters({
				'gateways' : 'admin/getPaymentGateway'
			})
		},
		mounted(){
			this.fetch()
		}
	}
</script>