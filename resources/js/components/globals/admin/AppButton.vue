<template>
	<div class="form-group">
		<button 
			class="btn btn-primary" 
			:type="type"
			v-bind="$attrs"
			:disabled="loading"
		>
			<span v-if="loading" 
				class="spinner-border spinner-border-sm"
				role="status" aria-hidden="true"></span>
			<slot/>
		</button>
	</div>
</template>

<script>
import { mapGetters } from 'vuex'

export default{
	props: {
		type: {
			required: false,
			type: String,
			default: 'button'
		}
	},
	computed: {
		...mapGetters({
			loading: 'getLoading'
		})
	}
}
</script>