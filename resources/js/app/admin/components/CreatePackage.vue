<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title"> Create Package </h3>
		
		<app-form action="/admin/api/package/create" method="post" redirect="/sd">
			<div class="col-md-7 mb-7">
				<app-input name="title" label="Title"/>
			</div>

			<div class="col-md-7 mb-7">
				<app-input name="post" label="Post"/>
			</div>

			<div class="col-md-7 mb-7">
				<app-input name="price" label="Price"/>
			</div>

			<br>
			<div class="col-md-7 mb-7 text-center">
				<app-button type="submit">Submit</app-button>
			</div>
		</app-form>
			<p class="text-danger" v-if="errors">{{ errors }}</p>
	</div>
</div>
</template>

<script>
	import { mapGetters } from 'vuex'

	export default {
		computed: {
			...mapGetters({
				errors: 'getError'
			})
		}
	}
</script>