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
				<th>Delete</th>
			</thead>
			<tbody>
				<tr v-for="(type, key) in types">
					<td>{{ type.id }}</td>
					<td>{{ type.name }}</td>
					<td>
						<a href="#" class="btn btn-sm btn-icon btn-secondary"
							data-toggle="modal"
							:data-target="'#'+ convertToID(type.id)+'edit'">
							<i class="fa fa-pencil-alt"></i>
							<span class="sr-only">Edit</span>
						</a>
						<app-modal 
							commit="admin/setCompanyType"
							:data="{id:type.id}"
							:option="{ title: 'Update', url: '/api/company-type/edit'}"
							cancel="Close" :id="convertToID(type.id) +'edit'" :title="'Update'" >
							<h6>{{ type.name }}</h6>
							<app-input :value="type.name" name="name" label="Name"/>
						</app-modal>

						<a href="#" class="btn btn-sm btn-icon btn-secondary"
								data-toggle="modal"
							:data-target="'#'+ convertToID(type.id)">
							<i class="far fa-trash-alt"></i>
							<span class="sr-only">Remove</span>
						</a>
						<app-modal 
							commit="admin/setCompanyType"
							:data="{id:type.id}"
							:option="{ title: 'Delete', url: '/api/company-type/delete'}"
							cancel="Close" :id="convertToID(type.id)" :title="'Delete ?'" >
							<h6>{{ type.name }}</h6>
						</app-modal>

					</td>
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
		}),
		convertToID(text){
		    return 'ab'+ text + 'ab'
		}
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