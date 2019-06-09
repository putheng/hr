<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title"> Employee Type </h3>

		<app-form action="/api/employee-type/create" method="post" class="col-md-6" commit="admin/setEmployeeType">
			<app-input name="title" label="Title"/>
			
			<app-button type="submit">Add</app-button>
		</app-form>
		<br>
		<table class="table">
			<thead>
				<th>#</th>
				<th>Name</th>
			</thead>
			<tbody>
				<tr v-for="(item, key) in employee">
					<td>{{ item.id }}</td>
					<td>{{ item.name }}</td>
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
			fetch: 'admin/fetchEmployeeType'
		})
	},
	mounted(){
		this.fetch()
	},
	computed: {
		...mapGetters({
			employee: 'admin/getEmployeeType'
		})
	}
}
</script>