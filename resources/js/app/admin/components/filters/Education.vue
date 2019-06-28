<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title"> Education </h3>

		<app-form action="/api/education/create" method="post" class="col-md-6" commit="admin/setEducation">
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
				<tr v-for="(item, key) in educations">
					<td>{{ item.id }}</td>
					<td>{{ item.name }}</td>
					<td>
						<a href="#" class="btn btn-sm btn-icon btn-secondary"
								data-toggle="modal"
							:data-target="convertToTarget(item.name)">
							<i class="far fa-trash-alt"></i>
							<span class="sr-only">Remove</span>
						</a>
						<app-modal 
							commit="admin/setEducation"
							:key="item.id" :data="{id:item.id}"
							:option="{ title: 'Delete', url: '/api/education/delete'}"
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
			fetch: 'admin/fetchEducation'
		}),
		convertToID(text){
		    return text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'')
		},
		convertToTarget(text){
	    	return '#'+ this.convertToID(text)
		}
	},
	mounted(){
		this.fetch()
	},
	computed: {
		...mapGetters({
			educations: 'admin/getEducation'
		})
	}
}
</script>