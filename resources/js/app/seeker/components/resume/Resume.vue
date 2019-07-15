<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title"> Resume </h3>
		<br>
		<table class="table">
			<thead>
				<th>#</th>
				<th>Name</th>
				<th>Action</th>
			</thead>
			<tbody>
				<template v-if="resumes.length">
					<tr v-for="(resume, key) in resumes" :key="resume.id">
						<td>{{ resume.id }}</td>
						<td>{{ resume.title }}</td>
						<td>
							<template v-if="resume.type == 1">
								<a :href="'/file/download/'+ resume.id" target="_blank">Download</a>
							</template>
							<template v-if="resume.type == 2">
								<a :href="'/resume/view/'+ resume.id" target="_blank">View</a>
								|
								<router-link 
									:to="{name: 'j-resume-edit', params: { id: resume.id}}">
										Edit
								</router-link>
							</template>
							|
							<a href="#" data-toggle="modal"
								:data-target="'#'+convertToID(resume.title)">
								Delete
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