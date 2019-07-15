<template>
<div>
	<header class="page-title-bar">
		<h1 class="page-title">Purchased CV</h1>
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
							</tr>
						</thead>
						<tbody>
							<template v-if="resume.length">
								<tr v-for="(item, index, key) in resume" :key="key">
									<td>
										<a target="_blank" :href="'/resume/view/'+ item.id">{{ item.title }}</a>
									</td>
									<td>{{ item.user }}</td>
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
				fetch: 'employer/fetchMyResume'
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