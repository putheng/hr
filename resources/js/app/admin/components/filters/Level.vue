<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title"> Levels </h3>

		<app-form action="/api/level/create" method="post" class="col-md-6" commit="admin/setLevel">
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
				<tr v-for="(item, key) in levels">
					<td>{{ item.id }}</td>
					<td>{{ item.name }}</td>
					<td>
						<a href="#" class="btn btn-sm btn-icon btn-secondary"
							data-toggle="modal"
							:data-target="'#'+ convertToID(item.name)+'edit'">
							<i class="fa fa-pencil-alt"></i>
							<span class="sr-only">Edit</span>
						</a>
						<app-modal 
							commit="admin/setLevel"
							:key="key" :data="{id:item.id}"
							:option="{ title: 'Update', url: '/api/level/edit'}"
							cancel="Close" :id="convertToID(item.name) +'edit'" :title="'Update'" >
							<h6>{{ item.name }}</h6>
							<app-input :value="item.name" name="name" label="Name"/>
						</app-modal>
						
						<a href="#" class="btn btn-sm btn-icon btn-secondary"
								data-toggle="modal"
							:data-target="'#'+ convertToID(item.name)">
							<i class="far fa-trash-alt"></i>
							<span class="sr-only">Remove</span>
						</a>
						<app-modal 
							commit="admin/setLevel"
							:key="item.id" :data="{id:item.id}"
							:option="{ title: 'Delete', url: '/api/level/delete'}"
							cancel="Close" :id="convertToID(item.name)" :title="'Delete ?'" >
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
			fetch: 'admin/fetchLevel'
		}),
		convertToID(text){
		    return 'ab'+ text.toLowerCase().replace(/ /g,'').replace(/[^\w-]+/g,'')+ 'ab'
		}
	},
	mounted(){
		this.fetch()
	},
	computed: {
		...mapGetters({
			levels: 'admin/getLevel'
		})
	}
}
</script>