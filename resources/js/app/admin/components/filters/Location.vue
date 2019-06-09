<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title"> Levels </h3>

		<app-form action="/api/location/create" method="post" class="col-md-6" commit="admin/setLocation">
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
				<tr v-for="(item, key) in locations">
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
			fetch: 'admin/fetchLocation'
		})
	},
	mounted(){
		this.fetch()
	},
	computed: {
		...mapGetters({
			locations: 'admin/getLocation'
		})
	}
}
</script>