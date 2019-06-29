<template>
<div class="section-block">
	<div class="card card-fluid">
		<div class="card-body">
			<h4 class="card-title">
				Create Advertising
			</h4>
			<br>
			<div class="card-text col-md-12">
				<form action="/api/advertising/store" method="post" @submit.prevent="submit">
					<div class="form-group col-md-6">
						<label for="file">Select an image</label>
						<input @change="onFileChange" class="form-control" type="file" name="image" id="file" :class="{'is-invalid': validation['image']}">
						<div class="invalid-feedback" v-if="validation['image']">
				            <i class="fa fa-exclamation-circle fa-fw"></i>
				            {{ validation['image'][0] }}
				        </div>
						<div id="imagePreviewDiv" class="d-none">
							<br>
							<img id="imagePreview" style="max-width:700px; width:100%">
						</div>
					</div>
					<div class="col-md-6">
						<app-input v-model="form.url" name="url" label="URL"/>
					</div>
					<div class="col-md-6">
						<main-select v-model="form.area" name="area" :data="data" label="Area"/>
					</div>
					<br>
					
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
				<th>Area</th>
				<th>URL</th>
				<th>Image</th>
				<th>Status</th>
				<th></th>
			</thead>
			<tbody>
				<template v-if="ads.length">
					<tr v-for="(item, key) in ads" :key="key">
						<td>{{ item.id }}</td>
						<td>{{ item.area }}</td>
						<td>
							<a target="_blank" v-if="item.link" :href="item.link">Visit</a>
						</td>
						<td>
							<a :href="item.path" target="_blank">
								<img width="100" :src="item.path" :alt="item.name">
							</a>
						</td>
						<td>{{ item.status }}</td>
						<td>
							<a href="#" class="btn btn-sm btn-icon btn-secondary"
									data-toggle="modal"
								:data-target="'#'+ convertToID(item.id)">
								<i class="far fa-trash-alt"></i>
								<span class="sr-only">Remove</span>
							</a>
							<app-modal 
								commit="admin/setAds"
								:key="item.id" :data="{id:item.id}"
								:option="{ title: 'Delete', url: '/api/advertising/delete'}"
								cancel="Close" :id="convertToID(item.id)" :title="'Delete ?'" >
								<h6>Advertising id: {{ item.id }}</h6>
							</app-modal>
						</td>
					</tr>
				</template>

				<template v-else>
					<tr>
						<td colspan="6">
							<p class="text-center">No any ads yet</p>
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

	export default {
		data(){
			return {
				show: false,
				form:{
					file: '',
					area: '',
					url: ''
				},
				data: [
					{id: 1, title: 'one'},
					{id: 2, title: 'Two'},
					{id: 3, title: 'Three'},
					{id: 4, title: 'Four'},
				]
			}
		},
		methods: {
			onFileChange(e) {
				this.$store.commit('clearValidationErrors', '', {root:true})
	            this.form.file = e.target.files[0]

	            if (e.target.files && e.target.files[0]) {
				    
			        var reader = new FileReader()

			        reader.onload = function(e) {
			            $('#imagePreview').attr('src', e.target.result)
			            $('#imagePreview').hide()
			            $('#imagePreview').fadeIn(650)
			            $('#imagePreviewDiv').attr('style','display: block !important')
			        }

			        reader.readAsDataURL(e.target.files[0])
			    }
	        },
	        submit(){
	        	this.$store.commit('setLoading', '', {root:true})

	        	var form = new FormData();
	        	form.append('area',this.form.area);
	            form.append('image',this.form.file);
	            form.append('url',this.form.url);

	            axios.post('/api/advertising/upload', form).then(response=>{
	               this.$store.commit('admin/setAds', response.data.data)

	               return Promise.resolve(response)
	            })
	        },
	        ...mapActions({
	        	fetchAds: 'admin/fetchAds'
	        }),
	        convertToID(text){
			    return 'ab'+ text + 'ab'
			}
		},
		computed: {
			...mapGetters({
				validation: 'getValidationErrors',
				ads: 'admin/getAds'
			})
		},
		mounted(){
			this.fetchAds()
		}
	}
</script>