<template>
<div class="section-block">
	<div class="card card-fluid">
		<div class="card-body">
			<h4 class="card-title">
				Upload your resume
			</h4>

			<br>
			<form @submit.prevent="submit">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
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

					<div class="form-group">
						<label for="tf3">Select resume</label>
						<div class="custom-file">
							<input 
								@change="onImageChange" type="file" class="custom-file-input" id="tf3"
								:class="{'is-invalid': validation.resume}"
							>
							<label class="custom-file-label" for="tf3">Choose file</label>

							<p class="text-danger" v-if="validation.resume">
					            <i class="fa fa-exclamation-circle fa-fw"></i>
					            {{ validation.resume[0] }}
					        </p>
						</div>
					</div>

					<br>
					<app-button type="submit">Upload</app-button>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
</template>

<script>
	import { mapActions, mapGetters } from 'vuex'

	export default {
	    data () {
	        return {
	            form: {
	            	files: '',
	            	title: ''
	        	}
	        }
	    },
		methods: {
			submit(e){
				this.$store.commit('setLoading')

				let formData = new FormData();

                formData.append('resume', this.form.files)
                formData.append('title', this.form.title)

				return axios.post('/api/resume/upload', formData).then((response) => {

					if(response.data.success){
						this.$router.replace('/jobseeker/resume')
					}

	                return Promise.resolve(response)
	            }).catch((error) => {

	                return Promise.reject(error)
	            })
			},
			onImageChange(e) {
				this.form.files = e.target.files[0]
            }
		},
		computed: {
			...mapGetters({
				validation: 'getValidationErrors',
			})
		}
	}
</script>