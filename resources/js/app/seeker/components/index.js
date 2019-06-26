import Vue from 'vue'

export const Home = Vue.component('home', require('./profile/index.vue').default)
export const Profile = Vue.component('profile', require('./profile/Profile.vue').default)
export const ChangePassword = Vue.component('change-password', require('./profile/ChangePassword.vue').default)

export const Resume = Vue.component('resume', require('./resume/Resume.vue').default)
export const CreateResume = Vue.component('resume', require('./resume/Create.vue').default)