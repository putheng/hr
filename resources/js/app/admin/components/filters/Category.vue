<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title">Job Category </h3>

		<app-form action="/api/category/create" method="post" class="col-md-6" commit="admin/setCategories">
			<app-input name="category" label="Category"/>
			
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
				<tr v-for="(category, key) in categories">
					<td>{{ category.id }}</td>
					<td>{{ category.name }}</td>
					<td>
						<a href="#" class="btn btn-sm btn-icon btn-secondary"
							data-toggle="modal"
							:data-target="'#'+ convertToID(category.id)+'edit'">
							<i class="fa fa-pencil-alt"></i>
							<span class="sr-only">Edit</span>
						</a>
						<app-modal 
							commit="admin/setCategories"
							:key="key" :data="{id:category.id}"
							:option="{ title: 'Update', url: '/api/category/edit'}"
							cancel="Close" :id="convertToID(category.id) +'edit'" :title="'Update'" >
							<h6>{{ category.name }}</h6>
							<app-input :value="category.name" name="name" label="Name"/>
						</app-modal>
						<a href="#" class="btn btn-sm btn-icon btn-secondary"
								data-toggle="modal"
							:data-target="'#'+ convertToID(category.id)">
							<i class="far fa-trash-alt"></i>
							<span class="sr-only">Remove</span>
						</a>
						<app-modal 
							commit="admin/setCategories"
							:key="category.id" :data="{id:category.id}"
							:option="{ title: 'Delete', url: '/api/category/delete'}"
							cancel="Close" :id="convertToID(category.id)" :title="'Delete ?'" >
							<h6>{{ category.name }}</h6>
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
			fetch: 'admin/fetchCategories'
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
			categories: 'admin/getCategories'
		})
	}
}
</script>