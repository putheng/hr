import Vue from 'vue'

export const BuyPackage = Vue.component('all-package', require('./package/BuyPackage.vue').default)
export const MyPackages = Vue.component('my-packages', require('./package/MyPackages.vue').default)

export const Home = Vue.component('home', require('./profile/Home.vue').default)
export const ChangePassword = Vue.component('change-password', require('./profile/ChangePassword.vue').default)
export const CompanyProfile = Vue.component('company-profile', require('./profile/CompanyProfile.vue').default)
export const MyProfile = Vue.component('my-profile', require('./profile/MyProfile.vue').default)

export const Wallet = Vue.component('wallet', require('./payments/Wallet.vue').default)
export const Transaction = Vue.component('transaction', require('./payments/Transaction.vue').default)
export const Deposit = Vue.component('deposit', require('./payments/Deposit.vue').default)

export const CreateListing = Vue.component('create-listing', require('./listings/Create.vue').default)
export const ExpiredListing = Vue.component('create-listing', require('./listings/Expired.vue').default)
export const PublishListing = Vue.component('create-listing', require('./listings/Publish.vue').default)
export const UnpublishListing = Vue.component('create-listing', require('./listings/Unpublish.vue').default)

export const Search = Vue.component('search', require('./resume/Search.vue').default)
export const Purchased = Vue.component('purchased', require('./resume/Purchased.vue').default)