import axios from 'axios'

export const fetchQuestion = ({commit}) => {
	return axios.get('/api/admin/question').then((response) => {
		commit('setQuestion', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchResume = ({commit}) => {
	return axios.get('/api/admin/resume').then((response) => {
		commit('setResume', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchSeeker = ({commit}) => {
	return axios.get('/api/admin/seeker').then((response) => {
		commit('setSeeker', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchBlog = ({commit}) => {
	return axios.get('/api/admin/blog').then((response) => {
		commit('setBlog', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchPageType = ({commit}) => {
	return axios.get('/api/admin/post-type').then((response) => {
		commit('setPageType', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchUser = ({commit}) => {
	return axios.get('/api/admin/profile/all').then((response) => {
		commit('setUser', response.data.data)

		return Promise.resolve(response)
	})
}

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

export const fetchIndustries = ({commit}) => {
	return axios.get('/api/industry/all').then((response) => {
		commit('setIndustries', response.data.data)

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

export const fetchMyPackages = ({commit}) => {
	return axios.get('/api/package/my').then((response) => {
		commit('setPackages', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchListings = ({commit}) => {
	commit('resetListings')
	return axios.get('/api/admin/listings/all').then((response) => {
		commit('setListings', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchPublishListings = ({commit}) => {
	commit('resetListings')
	return axios.get('/api/admin/listings/publish').then((response) => {
		commit('setListings', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchUnPublishListings = ({commit}) => {
	commit('resetListings')
	return axios.get('/api/admin/listings/unpublish').then((response) => {
		commit('setListings', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchExpiredListings = ({commit}) => {
	commit('resetListings')
	return axios.get('/api/admin/listings/expired').then((response) => {
		commit('setListings', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchCompany = ({commit}) => {
	return axios.get('/api/admin/employers/all').then((response) => {
		commit('setCompany', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchFeaturedCompany = ({commit}) => {
	return axios.get('/api/admin/employer/featured').then((response) => {
		commit('setCompany', response.data.data)

		return Promise.resolve(response)
	})
}
export const fetchBlockedCompany = ({commit}) => {
	return axios.get('/api/admin/employer/blocked').then((response) => {
		commit('setCompany', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchDeposit = ({commit}) => {
	commit('resetDeposits')
	return axios.get('/api/admin/deposits/all').then((response) => {
		commit('setDeposits', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchPendingDeposit = ({commit}) => {
	commit('resetDeposits')
	return axios.get('/api/admin/deposits/pending').then((response) => {
		commit('setDeposits', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchAcceptedDeposit = ({commit}) => {
	commit('resetDeposits')
	return axios.get('/api/admin/deposits/accepted').then((response) => {
		commit('setDeposits', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchRejectedDeposit = ({commit}) => {
	commit('resetDeposits')
	return axios.get('/api/admin/deposits/rejected').then((response) => {
		commit('setDeposits', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchAds = ({commit}) => {
	return axios.get('/api/advertising/show').then((response) => {
		commit('setAds', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchPage = ({commit}) => {
	return axios.get('/api/admin/page/show').then((response) => {
		commit('setPage', response.data.data)

		return Promise.resolve(response)
	})
}