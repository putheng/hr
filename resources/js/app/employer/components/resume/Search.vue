<template>
<div>
	<header class="page-title-bar">
		<h1 class="page-title">CV Search</h1>
	</header>
	<div class="page-section">
		<!-- .section-block -->
		<div class="section-block">
			<div class="card card-fluid">
				<div class="card-header border-0">
					<div class="d-flex align-items-center">
						<span class="mr-auto">Resumes</span>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead class="thead-">
							<tr>
								<th>Title</th>
								<th>Username</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<template v-if="resume.length">
								<tr v-for="(item, index, key) in resume" :key="key">
									<td>
										<a target="_blank" :href="'/resume/view/'+ item.id">{{ item.title }}</a>
									</td>
									<td>{{ item.user }}</td>
									<td>
										<a 
											href="#" class="btn btn-primary btn-sm"
											data-toggle="modal"
											:data-target="'#'+ convertToID(item.id)"
										>Purchase</a>
										
										<app-modal 
											commit="admin/setResume"
											:key="item.id" :data="{id:item.id}"
											:option="{ title: 'Purchase', url: '/api/resume/purchase'}"
											cancel="Close" :id="convertToID(item.id)" title="Purchase" >
											<h6>{{ item.title }}</h6>
										</app-modal>
									</td>
								</tr>
							</template>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		methods: {
			...mapActions({
				fetch: 'employer/fetchResume'
			}),
			convertToID(text){
			    return 'ab'+ text + 'ab'
			}
		},
		computed: {
			...mapGetters({
				resume: 'employer/getResume'
			})
		},
		mounted(){
			this.fetch()
		}
	}
</script>