<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title"> Company Types </h3>

		<app-form action="/api/company-type/create" method="post" class="col-md-6" commit="admin/setCompanyType">
			<app-input name="type" label="Type"/>
			
			<app-button type="submit">Add</app-button>
		</app-form>
		<br>
		<table class="table">
			<thead>
				<th>#</th>
				<th>Name</th>
			</thead>
			<tbody>
				<tr v-for="(type, key) in types">
					<td>{{ type.id }}</td>
					<td>{{ type.name }}</td>
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
			fetch: 'admin/fetchCompanyType'
		})
	},
	mounted(){
		this.fetch()
	},
	computed: {
		...mapGetters({
			types: 'admin/getCompanyType'
		})
	}
}
</script>