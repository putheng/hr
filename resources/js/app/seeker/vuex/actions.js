
export const fetchUser = ({ commit }) => {
    return axios.get('/api/seeker/profile').then((response) => {
        commit('setUser', response.data.data)
    })
}