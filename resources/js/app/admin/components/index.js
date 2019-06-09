import Vue from 'vue'

export const CreatePackage = Vue.component('create-package', require('./package/CreatePackage.vue').default)
export const AllPackages = Vue.component('all-package', require('./package/AllPackages.vue').default)
export const EditPackage = Vue.component('edit-package', require('./package/EditPackage.vue').default)

export const Education = Vue.component('education', require('./filters/Education.vue').default)
export const Category = Vue.component('category', require('./filters/Category.vue').default)
export const Experience = Vue.component('experience', require('./filters/Experience.vue').default)
export const Level = Vue.component('level', require('./filters/Level.vue').default)
export const Location = Vue.component('location', require('./filters/Location.vue').default)
export const Salary = Vue.component('salary', require('./filters/Salary.vue').default)
export const Term = Vue.component('term', require('./filters/Term.vue').default)

export const CompanyType = Vue.component('company-type', require('./filters/CompanyType.vue').default)
export const EmployeeType = Vue.component('employee-type', require('./filters/EmployeeType.vue').default)

export const UpdateProfile = Vue.component('employee-type', require('./profile/UpdateProfile.vue').default)
export const ChangePassword = Vue.component('change-password', require('./profile/ChangePassword.vue').default)

export const Gateway = Vue.component('gateway', require('./payment/Gateway.vue').default)