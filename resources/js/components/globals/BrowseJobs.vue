<template>
	<div class="row table-urgent-job pb-3">
	    <div class="col-md-3 col-sm-12" v-for="category in categories">
			{{ category.name }}
		</div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
	methods: {
		...mapActions({
			fetch: 'admin/fetchCategories'
		})
	},
	mounted(){
		this.fetch()
	},
	computed: {
		...mapGetters({
			categories: 'admin/getCategories'
		})
	}
}
</script>