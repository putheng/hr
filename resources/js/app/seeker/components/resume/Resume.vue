<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title"> Resume </h3>
		<br>
		<table class="table" id="myTable2">
			<thead>
				<th>#</th>
				<th>Name</th>
				<th>Download</th>
				<th>Delete</th>
			</thead>
			<tbody>
				<template v-if="resumes.length">
					<tr v-for="(resume, key) in resumes" :key="resume.id">
						<td>{{ resume.id }}</td>
						<td>{{ resume.title }}</td>
						<td>
							<a :href="'/file/download/'+ resume.id" target="_blank">Download</a>
						</td>
						<td>

							<a href="#" class="btn btn-sm btn-icon btn-secondary"
									data-toggle="modal"
								:data-target="'#'+convertToID(resume.title)">
								<i class="far fa-trash-alt"></i>
								<span class="sr-only">Remove</span>
							</a>
							<app-modal 
								commit="seeker/setResume"
								:data="{id:resume.id}"
								:option="{ title: 'Delete', url: '/api/resume/destroy'}"
								cancel="Close" :id="convertToID(resume.title)" title="Delete ?" >
								<h6>{{ resume.title }}</h6>
							</app-modal>

						</td>
					</tr>
				</template>

				<template v-else>
					<tr>
						<td colspan="4"><p class="text-center">Empty</p></td>
					</tr>
				</template>
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
			fetch: 'seeker/fetchResumes'
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
			resumes: 'seeker/getResumes'
		})
	}
}
</script>