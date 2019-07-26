<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title"> Edit Package </h3>

		<p class="text-danger" v-if="errors">{{ errors }}</p>
		
		<app-form :action="url" method="post" redirect="/admin/package/all">
			<template v-for="(item, key, index) in package">
				<div class="col-md-7 mb-7" v-if="index != 0">
					<app-input v-if="key != 'name'" :name="key" :label="formatedText(key)" :value="item"/>
				</div>
			</template>

			<br>
			<div class="col-md-7 mb-7 text-center">
				<app-button type="submit">Submit</app-button>
			</div>
		</app-form>
	</div>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		methods: {
			...mapActions({
				'fetchPackage': 'admin/getPackage'
			}),
			formatedText(string){
				return string.charAt(0).toUpperCase() + string.slice(1);
			}
		},
		data(){
			return {
				url: '',
				id: this.$route.params.id
			}
		},
		computed: {
			...mapGetters({
				errors: 'getError',
				package: 'admin/getPackage'
			})
		},
		mounted(){
			this.url = '/api/package/all/'+ this.id
			this.fetchPackage(this.id)
		}
	}
</script>