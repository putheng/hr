<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title">Featured Companies </h3>
		<table class="table">
			<thead>
				<th>#</th>
				<th>Name</th>
				<th>User</th>
				<th>Email</th>
				<th>Phone</th>
				<th></th>
			</thead>
			<tbody>
				<tr v-for="(item, key) in companies">
					<td>{{ item.id }}</td>
					<td>{{ item.name }}</td>
					<td>{{ item.username }}</td>
					<td>{{ item.email }}</td>
					<td>{{ item.phone }}</td>
					<td>
						<a href="#" class="btn btn-sm btn-icon btn-secondary"
								data-toggle="modal"
							:data-target="'#'+ convertToID(item.name)">
							<i class="oi oi-circle-x"></i>
							<span class="sr-only">remove</span>
						</a>

						<app-modal 
							commit="admin/setCompany"
							:key="item.id" :data="{id:item.id}"
							:option="{ title: 'Remove', url: '/api/admin/employer/remove-featured'}"
							cancel="Cancel" :id="convertToID(item.name)" title="Remove featured company" >
							<h6>{{ item.name }}</h6>
						</app-modal>
					</td>
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
				fetch: 'admin/fetchFeaturedCompany'
			}),
			convertToID(text){
			    return 'ab'+ text.toLowerCase().replace(/ /g,'').replace(/[^\w-]+/g,'')+ 'ab'
			}
		},
		computed: {
			...mapGetters({
				companies: 'admin/getCompany'
			})
		},
		mounted(){
			this.fetch()
		}
	}
</script>