<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title"> Experiences </h3>

		<app-form action="/api/experience/create" method="post" class="col-md-6" commit="admin/setExperience">
			<app-input name="title" label="Title"/>
			
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
				<tr v-for="(item, key) in experiences">
					<td>{{ item.id }}</td>
					<td>{{ item.name }}</td>
					<td>
						<a href="#" class="btn btn-sm btn-icon btn-secondary"
							data-toggle="modal"
							:data-target="'#'+ convertToID(item.id)+'edit'">
							<i class="fa fa-pencil-alt"></i>
							<span class="sr-only">Edit</span>
						</a>
						<app-modal 
							commit="admin/setExperience"
							:key="key" :data="{id:item.id}"
							:option="{ title: 'Update', url: '/api/experience/edit'}"
							cancel="Close" :id="convertToID(item.id) +'edit'" :title="'Update'" >
							<h6>{{ item.name }}</h6>
							<app-input :value="item.name" name="name" label="Name"/>
						</app-modal>
						
						<a href="#" class="btn btn-sm btn-icon btn-secondary"
								data-toggle="modal"
							:data-target="'#'+ convertToID(item.id)">
							<i class="far fa-trash-alt"></i>
							<span class="sr-only">Remove</span>
						</a>
						<app-modal 
							commit="admin/setExperience"
							:key="item.id" :data="{id:item.id}"
							:option="{ title: 'Delete', url: '/api/experience/delete'}"
							cancel="Close" :id="convertToID(item.id)" :title="'Delete ?'" >
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
import { mapActions, mapGetters } from 'vuex'

export default {
	methods: {
		...mapActions({
			fetch: 'admin/fetchExperience'
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
			experiences: 'admin/getExperience'
		})
	}
}
</script>