import Vue from 'vue'

export const BuyPackage = Vue.component('all-package', require('./BuyPackage.vue').default)
export const MyPackages = Vue.component('my-packages', require('./MyPackages.vue').default)
export const Home = Vue.component('home', require('./Home.vue').default)
export const ChangePassword = Vue.component('change-password', require('./ChangePassword.vue').default)
export const CompanyProfile = Vue.component('company-profile', require('./CompanyProfile.vue').default)
export const MyProfile = Vue.component('my-profile', require('./MyProfile.vue').default)

export const Wallet = Vue.component('wallet', require('./payments/Wallet.vue').default)
export const Transaction = Vue.component('transaction', require('./payments/Transaction.vue').default)
export const Deposit = Vue.component('deposit', require('./payments/Deposit.vue').default)

export const CreateListing = Vue.component('create-listing', require('./listings/Create.vue').default)