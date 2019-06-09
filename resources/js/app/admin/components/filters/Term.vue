<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title"> Terms </h3>

		<app-form action="/api/term/create" method="post" class="col-md-6" commit="admin/setTerm">
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
				<tr v-for="(item, key) in terms">
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
			fetch: 'admin/fetchTerm'
		})
	},
	mounted(){
		this.fetch()
	},
	computed: {
		...mapGetters({
			terms: 'admin/getTerm'
		})
	}
}
</script>