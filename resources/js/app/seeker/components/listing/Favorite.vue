<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title">Favorite Listings</h3>

		<table class="table">
			<thead>
				<th>#</th>
				<th>Title</th>
				<th>Company</th>
				<th>Category</th>
				<th>Location</th>
				<th>Closing</th>
				<th></th>
			</thead>
			<tbody>
				<template v-if="listings.length">
					<tr v-for="item in listings">
						<td>{{ item.id }}</td>
						<td>{{ item.title }}</td>
						<td>{{ item.company }}</td>
						<td>{{ item.category }}</td>
						<td>{{ item.location }}</td>
						<td>{{ item.closing }}</td>
						<td>
							<a href="#" class="btn btn-sm btn-icon btn-secondary"
								data-toggle="modal"
							:data-target="'#'+ convertToID(item.id)">
							<i class="far fa-trash-alt"></i>
							<span class="sr-only">Remove</span>
						</a>
						<app-modal 
							commit="seeker/setFavorite"
							:data="{id:item.id}"
							:option="{ title: 'Remove', url: '/api/seeker/listings/favorite/remove'}"
							cancel="Close" :id="convertToID(item.id)" title="Remove" >
							<h6>{{ item.title }}</h6>
						</app-modal>
						</td>
					</tr>
				</template>

				<template v-else>
					<tr>
						<td colspan="5" class="text-center">
							No any listing
						</td>
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
				'fetch': 'seeker/fetchFavorite'
			}),
			convertToID(text){
			    return 'ab'+ text +'ab'
			}
		},
		computed: {
			...mapGetters({
				listings : 'seeker/getFavorite'
			})
		},
		mounted(){
			this.fetch()
		}
	}
</script>
