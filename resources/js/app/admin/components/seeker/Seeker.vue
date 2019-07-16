<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title">All job seekers </h3>
		<table class="table">
			<thead>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Gender</th>
				<th>Marital</th>
				<th>Nationality</th>
			</thead>
			<tbody>
				<tr v-for="(item, key) in seekers">
					<td>{{ item.id }}</td>
					<td>{{ item.first_name }} {{ item.last_name }}</td>
					<td>{{ item.email }}</td>
					<td>{{ item.mobile }}</td>
					<td>{{ item.gender }}</td>
					<td>{{ item.marital }}</td>
					<td>{{ item.nationality }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'
	export default {
		methods: {
			...mapActions({
				fetch: 'admin/fetchSeeker'
			}),
			convertToID(text){
			    return 'ab'+ text.toLowerCase().replace(/ /g,'').replace(/[^\w-]+/g,'')+ 'ab'
			}
		},
		computed: {
			...mapGetters({
				seekers: 'admin/getSeeker'
			})
		},
		mounted(){
			this.fetch()
		}
	}
</script>