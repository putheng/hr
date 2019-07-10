<template>
<div class="section-block">
	<div class="card card-fluid">
		<div class="card-body">
			<h4 class="card-title">
				Create Page
			</h4>
			<br>
			<div class="card-text col-md-12">
				<form @submit.prevent="submit">

					<div class="form-group col-md-6">
						<label for="title" class="col-form-label">Title</label>
						<input 
							name="title" id="title"
							type="text" class="form-control"
							v-model="form.title"
							:class="{'is-invalid': validation.title}"
						>
						<p class="text-danger" v-if="validation.title">
				            <i class="fa fa-exclamation-circle fa-fw"></i>
				            {{ validation.title[0] }}
				        </p>
					</div>

					<br>

					<div class="form-group">
						<label>Body</label>
						<vue-editor v-model="form.content"></vue-editor>

						<p class="text-danger" v-if="validation.content">
				            <i class="fa fa-exclamation-circle fa-fw"></i>
				            {{ validation.content[0] }}
				        </p>
					</div>

					<br>
					<app-select class="col-md-6" v-model="form.type" commit="PageType" name="type" label="Page Type"/>
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
				<th>Title</th>
				<th>Type</th>
				<th></th>
			</thead>
			<tbody>
				<template v-if="pages.length">
					<tr v-for="item in pages">
						<td>{{ item.title }}</td>
						<td>{{ item.type_name }}</td>
						<td class="align-middle">
							<a @click.prevent="setFormData(item)" href="#" class="btn btn-sm btn-icon btn-secondary">
								<i class="fa fa-pencil-alt"></i>
								<span class="sr-only">Edit</span>
							</a>
							<a href="#" class="btn btn-sm btn-icon btn-secondary"
								data-toggle="modal"
								:data-target="'#'+convertToID(item.title)">
								<i class="far fa-trash-alt"></i>
								<span class="sr-only">Remove</span>
							</a>
							<app-modal commit="admin/setPage" :key="item.id" :data="{id:item.id}" :option="options" cancel="Close" :id="convertToID(item.title)" :title="'Delete page?'" > 
								{{ item.title }}
							</app-modal>
						</td>
					</tr>
				</template>

				<template v-else>
					<tr>
						<td colspan="6">
							<p class="text-center">No any page yet</p>
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
		data() {
		    return {
		    	form: {
		    		title: '',
		    		content: '',
		    		type: ''
		    	},
		    	options: {
					title: 'Delete',
					url: '/api/admin/page/delete',
				}
		    }
		},
		methods: {
			...mapActions({
				fetch: 'admin/fetchPage'
			}),
			convertToID(text){
			    return 'ab'+ text.toLowerCase().replace(/ /g,'').replace(/[^\w-]+/g,'')+ 'ab'
			},
			submit(){
				this.$store.commit('setLoading')
				axios.post('/api/admin/page/create', this.form).then((response) => {
					if(response.data.data.success){
						this.$store.commit('clearValidationErrors')
					}
					this.$store.commit('admin/setPage', response.data.data)
					this.$store.commit('clearLoading')
				})
			},
			setFormData(data){
				this.form.title = data.title
				this.form.content = data.content
			}
		},
		mounted(){
			this.fetch()
		},
		computed: {
			...mapGetters({
				validation: 'getValidationErrors',
				pages: 'admin/getPages'
			})
		}
	}
</script>