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
export const Industry = Vue.component('industry', require('./filters/Industry.vue').default)

export const CompanyType = Vue.component('company-type', require('./filters/CompanyType.vue').default)
export const EmployeeType = Vue.component('employee-type', require('./filters/EmployeeType.vue').default)

export const UpdateProfile = Vue.component('employee-type', require('./profile/UpdateProfile.vue').default)
export const ChangePassword = Vue.component('change-password', require('./profile/ChangePassword.vue').default)
export const Adds = Vue.component('advertising', require('./profile/Adds.vue').default)
export const Answer = Vue.component('answer', require('./profile/Answer.vue').default)
export const Blog = Vue.component('blog', require('./profile/Blog.vue').default)

export const Gateway = Vue.component('gateway', require('./payment/Gateway.vue').default)
export const Pending = Vue.component('pending', require('./payment/Pending.vue').default)
export const Accepted = Vue.component('accepted', require('./payment/Accepted.vue').default)
export const Rejected = Vue.component('rejected', require('./payment/Rejected.vue').default)

export const Listings = Vue.component('listings', require('./listings/Publish.vue').default)
export const Unpublish = Vue.component('unpublish', require('./listings/Unpublish.vue').default)
export const Expired = Vue.component('expired', require('./listings/Expired.vue').default)
export const CreateJob = Vue.component('create-job', require('./listings/CreateJob.vue').default)

export const About = Vue.component('about', require('./pages/About.vue').default)

export const Employer = Vue.component('employer', require('./employer/Employers.vue').default)
export const Featured = Vue.component('featured', require('./employer/Featured.vue').default)
export const Blocked = Vue.component('blocked', require('./employer/Blocked.vue').default)

export const Seeker = Vue.component('seeker', require('./seeker/Seeker.vue').default)
export const Search = Vue.component('search', require('./seeker/Search.vue').default)