import router from './router'
import store from './vuex'
import localforage from 'localforage'
import * as components from './components'

import VueInternationalization from 'vue-i18n';
import Locale from './vue-i18n-locales.generated';

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

Vue.use(VueInternationalization);

const lang = document.documentElement.lang.substr(0, 2);

const i18n = new VueInternationalization({
    locale: lang,
    messages: Locale
});

const app = new Vue({
    router: router,
    store: store,
    el: '#app',
    i18n
});
