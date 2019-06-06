import axios from 'axios'

export const fetchPackages = ({commit}) => {
	return axios.get('/admin/api/package/all').then((response) => {
		commit('allPackages', response.data.data)
		return Promise.resolve(response)
	})
}

export const getPackage = ({commit}, id) => {
	commit('clearPackage')
	return axios.get('/admin/api/package/all/'+ id).then((response) => {
		commit('setPackage', response.data.data)
		return Promise.resolve(response)
	})
}