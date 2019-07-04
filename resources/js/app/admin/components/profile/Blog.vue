<template>
<div class="section-block">
	<div class="card card-fluid">
		<div class="card-body">
			<h4 class="card-title">
				Create Tips
			</h4>
			<br>
			<div class="card-text col-md-12">
				<form @submit.prevent="submit">
					<app-input class="col-md-6" name="Title" label="title" v-model="form.title"/>

					<br>

					<div class="form-group">
						<label>Body</label>
						<vue-editor v-model="form.content"></vue-editor>

						<p class="text-danger" v-if="validation.content">
				            <i class="fa fa-exclamation-circle fa-fw"></i>
				            {{ validation.content[0] }}
				        </p>
					</div>
					<app-button type="submit">Submit</app-button>
				</form>
			</div>
		</div>
	</div>

<div class="card">
	<div class="card-body">
		<h3 class="card-title"> All Packages </h3>

		<table class="table">
			<thead>
				<th>#</th>
				<th>Title</th>
				<th></th>
			</thead>
			<tbody>
				<template v-if="blogs.length">
					<tr v-for="(item, key) in blogs" :key="key">
						<td>{{ item.id }}</td>
						<td>{{ item.title }}</td>
						<td>
							<a href="#" class="btn btn-sm btn-icon btn-secondary">
								<i class="fa fa-pencil-alt"></i>
								<span class="sr-only">Edit</span>
							</a>
							
							<a href="#" class="btn btn-sm btn-icon btn-secondary"
									data-toggle="modal"
								:data-target="'#'+ convertToID(item.id)">
								<i class="far fa-trash-alt"></i>
								<span class="sr-only">Remove</span>
							</a>
							<app-modal 
								commit="admin/setBlog"
								:key="item.id" :data="{id:item.id}"
								:option="{ title: 'Delete', url: '/api/admin/blog/delete'}"
								cancel="Close" :id="convertToID(item.id)" title="Delete blog ?" >
								<h6>{{ item.title }}</h6>
							</app-modal>
						</td>
					</tr>
				</template>

				<template v-else>
					<tr>
						<td colspan="6">
							<p class="text-center">No any blog</p>
						</td>
					</tr>
				</template>
			</tbody>
		</table>
	</div>
</div>
</div>
</template>

<script>
	import { mapActions, mapGetters } from 'vuex'
	import { VueEditor } from "vue2-editor"

	export default {
		components: {
		    VueEditor
		},
		methods: {
			submit(){
				this.$store.commit('setLoading')
				axios.post('/api/admin/blog', this.form).then((response) => {
					this.$store.commit('admin/setBlog', response.data.data)
					this.$store.commit('clearLoading')
				})
			},
	        ...mapActions({
	        	fetch: 'admin/fetchBlog'
	        }),
	        convertToID(text){
			    return 'ab'+ text + 'ab'
			}
		},
		computed: {
			...mapGetters({
				validation: 'getValidationErrors',
				blogs: 'admin/getBlog'
			})
		},
		mounted(){

			this.fetch()
		},
		data() {
		    return {
		    	form: {
		    		title: '',
		    		content: ''
		    	}
		    }
		}
	}
</script>