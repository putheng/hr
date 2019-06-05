export const setValidationErrors = (state, errors) => {
	state.validation = errors
	state.loading = false
}

export const setErrors = (state, errors) => {
	state.error = errors
	state.loading = false
}

export const clearValidationErrors = (state) => {
	state.validation = []
	state.loading = false
}

export const clearValidateFor = (state, error) => {
	state.validation[error] = null
}


export const setLoading = (state) => {
	state.loading = true
}

export const clearLoading = (state) => {
	state.loading = false
}