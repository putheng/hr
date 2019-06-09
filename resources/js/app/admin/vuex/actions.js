import axios from 'axios'

export const fetchPackages = ({commit}) => {
	return axios.get('/api/package/all').then((response) => {
		commit('allPackages', response.data.data)
		return Promise.resolve(response)
	})
}

export const getPackage = ({commit}, id) => {
	commit('clearPackage')
	return axios.get('/api/package/all/'+ id).then((response) => {
		commit('setPackage', response.data.data)
		return Promise.resolve(response)
	})
}

export const fetchCategories = ({commit}) => {
	return axios.get('/api/category/all').then((response) => {
		commit('setCategories', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchCompanyType = ({commit}) => {
	return axios.get('/api/company-type/all').then((response) => {
		commit('setCompanyType', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchEducation = ({commit}) => {
	return axios.get('/api/education/all').then((response) => {
		commit('setEducation', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchExperience = ({commit}) => {
	return axios.get('/api/experience/all').then((response) => {
		commit('setExperience', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchLevel = ({commit}) => {
	return axios.get('/api/level/all').then((response) => {
		commit('setLevel', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchLocation = ({commit}) => {
	return axios.get('/api/location/all').then((response) => {
		commit('setLocation', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchSalary = ({commit}) => {
	return axios.get('/api/salary/all').then((response) => {
		commit('setSalary', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchTerm = ({commit}) => {
	return axios.get('/api/term/all').then((response) => {
		commit('setTerm', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchEmployeeType = ({commit}) => {
	return axios.get('/api/employee-type/all').then((response) => {
		commit('setEmployeeType', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchPaymentGateway = ({commit}) => {
	return axios.get('/api/payment/gateway').then((response) => {
		commit('setPaymentGateway', response.data.data)

		return Promise.resolve(response)
	})
}

export const updatePaymentOption = ({commit}, id) => {
	return axios.post('/api/payment/gateway', {id:id}).then((response) => {
		commit('setPaymentGateway', response.data.data)
		
		return Promise.resolve(response)
	})
}