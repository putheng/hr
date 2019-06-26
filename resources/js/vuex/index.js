import Vue from 'vue'
import Vuex from 'vuex'
import auth from '../app/auth/vuex'
import admin from '../app/admin/vuex'
import employer from '../app/employer/vuex'
import seeker from '../app/seeker/vuex'

import state from './state'
import * as actions from './actions'
import * as mutations from './mutations'
import * as getters from './getters'

Vue.use(Vuex)

export default new Vuex.Store({
	state,
	actions,
	mutations,
	getters,
    modules: {
        auth: auth,
        admin: admin,
        employer: employer,
        seeker: seeker,
    }
})
