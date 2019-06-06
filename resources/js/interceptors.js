import axios from 'axios'
import store from './vuex'

axios.interceptors.response.use((response) => {
	if(response.status === 200){
		store.dispatch('clearErrors')
	}
	
	return response
}, (error) => {
	if(error.response.status === 422){
		store.dispatch('setValidationErrors', error.response.data.errors)
		store.dispatch('setErrors', error.response.data.message)
	}

	if(error.response.status === 500){
		store.dispatch('setErrors', "Status Code: 500, look like something went wrong. please try again later or report to your system administrator.")
	}

	if(error.response.status === 404){
		store.dispatch('setErrors', "Oop, look like something went wrong. please try again later or report to your system administrator.")
	}

	return Promise.reject(error)
})