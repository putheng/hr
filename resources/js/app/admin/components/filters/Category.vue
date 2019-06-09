<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title"> Category </h3>

		<app-form action="/api/category/create" method="post" class="col-md-6" commit="admin/setCategories">
			<app-input name="category" label="Category"/>
			
			<app-button type="submit">Add</app-button>
		</app-form>
		<br>
		<table class="table">
			<thead>
				<th>#</th>
				<th>Name</th>
			</thead>
			<tbody>
				<tr v-for="(category, key) in categories">
					<td>{{ category.id }}</td>
					<td>{{ category.name }}</td>
				</tr>
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
			fetch: 'admin/fetchCategories'
		})
	},
	mounted(){
		this.fetch()
	},
	computed: {
		...mapGetters({
			categories: 'admin/getCategories'
		})
	}
}
</script>