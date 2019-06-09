import store from '../vuex'
import localforage from 'localforage'

const beforeEach = ((to, from, next) => {
    store.dispatch('clearValidationErrors')
    store.commit('clearMessage')

    next()
})

export default beforeEach