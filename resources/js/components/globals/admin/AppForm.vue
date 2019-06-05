<template>
	<form 
		:action="action"
		:method="method"
		@submit.prevent="submit"
	>
		<slot/>
	</form>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
	name: 'auth.signin',
	props: {
		action: {
			required: true,
			type: String
		},
		method: {
			required: false,
			type: String,
			default: 'post'
		},
		redirect: {
			required: true,
			type: String
		}
	},
	data(){
		return {
			form: {}
		}
	},
	methods: {
		submit(){

			const children = this.$children.filter((key, value) => {
				return key.type !== 'submit'
			})

			Object.keys(children).forEach((key) => {
				if(typeof children[key].inputName !== 'undefined'){
					this.form[children[key].inputName] = children[key].inputValue
				}
			})

			this.sendRequest({
				endpoint: this.action,
				payload: this.form,
				method: this.method
			}).then((response) => {
				if (response.data.success){
					return window.location.href = this.redirect
				}
			})
		},
		...mapActions({
			sendRequest: 'submit'
		})
	}
}
</script>