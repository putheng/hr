<template>
	<div class="modal modal-alert fade" :id="id" data-backdrop="static" tabindex="-1" role="dialog" :aria-labelledby="id" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 :id="id" class="modal-title">
						{{ title }}
					</h5>
				</div>
				<div class="modal-body">
					<p class="text-center">
						<slot/>
					</p>
					<p v-if="errors" class="text-danger">{{ errors }}</p>
				</div>
				<div class="modal-footer">
					<app-form :hide-modal="id" :action="option.url" method="post" :redirect="option.redirect">
						
							<template v-for="(item, key, index) in data">
								<app-input type="hidden" :name="key" :value="item" />
							</template>
						
						<app-button type="submit">{{ option.title }}</app-button>
					</app-form>

					<button
						type="button"
						@click="resetLoading"
						class="btn btn-warning"
						data-dismiss="modal"
					>
						{{ cancel }}
					</button>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import { mapActions, mapGetters } from 'vuex'

export default {
	props: {
		id: {
			required: true,
			type: String
		},
		title: {
			required: true,
			type: String
		},
		option: {
			required: true,
			type: Object
		},
		data: {
			required: false,
			type: Object
		},
		cancel: {
			required: true,
			type: String
		},
		body: {
			required: false,
			type: String,
			default: 'Are you sure you want to delete this package ?'
		}
	},
	computed: {
		...mapGetters({
			loading: 'getLoading',
			errors: 'getError'
		})
	},
	methods: {
		...mapActions({
			'resetLoading': 'resetLoading'
		})
	},
	mounted(){
		
	}
}
</script>