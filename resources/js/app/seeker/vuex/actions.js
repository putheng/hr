
export const fetchUser = ({ commit }) => {
    return axios.get('/api/seeker/profile').then((response) => {
        commit('setUser', response.data.data)
    })
}

export const fetchResumes = ({ commit }) => {
    return axios.get('/api/resume/my').then((response) => {
        commit('setResume', response.data.data)
    })
}

export const fetchFavorite = ({ commit }) => {
    return axios.get('/api/seeker/listings/favorite').then((response) => {
        commit('setFavorite', response.data.data)
    })
}