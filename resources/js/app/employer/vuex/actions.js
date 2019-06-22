import axios from 'axios'

export const fetchPackages = ({commit}) => {
	return axios.get('/api/package/all').then((response) => {
		commit('allPackages', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchUser = ({commit}) => {
	return axios.get('/api/user/profile').then((response) => {
		commit('setUser', response.data.data)

		return Promise.resolve(response)
	})
}

export const setUser = ({commit}, data) => {
	commit('setUser', data)
}

export const getPackage = ({commit}, id) => {
	commit('clearPackage')
	return axios.get('/api/package/all/'+ id).then((response) => {
		commit('setPackage', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchFilter = ({commit}, url) => {
	return axios.get(url).then((response) => {
		commit('setPackage', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchCompany = ({commit}) => {
	return axios.get('/api/employer/profile').then((response) => {
		commit('setCompany', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchListing = ({commit}) => {
	return axios.get('/api/listing/publish').then((response) => {
		commit('setListing', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchUnListing = ({commit}) => {
	return axios.get('/api/listing/unpublish').then((response) => {
		commit('setListing', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchExpiredListing = ({commit}) => {
	return axios.get('/api/listing/expired').then((response) => {
		commit('setListing', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchMyPackages = ({commit}) => {
	return axios.get('/api/package/my').then((response) => {
		commit('setPackages', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchDeposits = ({commit}) => {
	return axios.get('/api/payments/transaction').then((response) => {
		commit('setDeposits', response.data.data)

		return Promise.resolve(response)
	})
}