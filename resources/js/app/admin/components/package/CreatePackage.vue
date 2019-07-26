<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title"> Create Package </h3>

		<p class="text-danger" v-if="errors">{{ errors }}</p>
		
		<form action="/api/package/create" method="post" redirect="/admin/package/all" @submit.prevent="submit">
			<div class="col-md-7 mb-7">
				<app-input v-model="form.title" name="title" label="Title"/>
			</div>

			<div class="col-md-7 mb-7">
				<app-input v-model="form.post" name="post" label="Post"/>
			</div>

			<div class="col-md-7 mb-7">
				<app-input v-model="form.cv" name="cv" label="CV"/>
			</div>

			<div class="col-md-7 mb-7">
				<app-input v-model="form.price" name="price" label="Price($)"/>
			</div>

			<div class="col-md-7 mb-7">
				<app-input v-model="form.days" name="days" label="Days"/>
			</div>

			<div class="col-md-10 mb-10">
				<p>Description</p>
				<vue-editor v-model="form.description"></vue-editor>
			</div>

			<br>
			<div class="col-md-7 mb-7 text-center">
				<app-button type="submit">Submit</app-button>
			</div>
		</form>
			
	</div>
</div>
</template>

<script>
	import { VueEditor } from "vue2-editor"
	import { mapGetters } from 'vuex'

	export default {
		components: {
		    VueEditor
		},
		data(){
			return {
				form: {
					title: '',
					post: '',
					cv: '',
					price: '',
					days: '',
					description: '',
				}
			}
		},
		methods: {
			submit(){
				this.$store.commit('setLoading')
				axios.post('/api/package/create', this.form).then((response) => {
					if (response.data.success) {
						this.$router.replace('/admin/package/all')
					}

					this.$store.commit('clearLoading')
				})
			}
		},
		computed: {
			...mapGetters({
				errors: 'getError'
			})
		}
	}
</script>