import router from './router'
import store from './vuex'
import localforage from 'localforage'
import * as components from './components'

localforage.config({
    driver: localforage.LOCALSTORAGE,
    storeName: 'cambodiahr'
})

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./interceptors');

window.config = require('./config');
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('AppMain', require('./components/AppMain.vue').default);
Vue.component('App', require('./components/App.vue').default);
Vue.component('AppEmployer', require('./components/employer/AppEmployer.vue').default);
Vue.component('JobSeeker', require('./components/seeker/JobSeeker.vue').default);

Object.keys(components).forEach((key) => {
	Vue.component(key, components[key])
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

store.dispatch('auth/setToken').then(() => {
    store.dispatch('auth/fetchUser').catch(() => {
        store.dispatch('auth/clearAuth')
        router.replace({ name: 'login' })
    })
}).catch(() => {
    store.dispatch('auth/clearAuth')
})

const app = new Vue({
    router: router,
    store: store,
    el: '#app'
});
