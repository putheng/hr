import {
    CreatePackage, AllPackages, EditPackage,
    Education, Category, Level, Location, Salary, Term, Experience, 
    CompanyType, EmployeeType, Industry,
    UpdateProfile, ChangePassword, Adds, Answer, Blog,
    Gateway, Pending, Accepted, Rejected,
    Listings, Unpublish, Expired, About
} from '../components'

export default [
    {
        path: '/admin/listings/publish',
        component: Listings,
        name: 'listings'
    },
    {
        path: '/admin/listings/unpublish',
        component: Unpublish,
        name: 'unpublish'
    },
    {
        path: '/admin/listings/expired',
        component: Expired,
        name: 'expired'
    },
    {
        path: '/admin/package/create',
        component: CreatePackage,
        name: 'create-package'
    },
    {
        path: '/admin/package/all',
        component: AllPackages,
        name: 'all-packages'
    },
    {
        path: '/admin/package/all/:id',
        component: EditPackage,
        name: 'edit-package'
    },
    {
        path: '/admin/profile',
        component: UpdateProfile,
        name: 'update-profile'
    },
    {
        path: '/admin/profile/password',
        component: ChangePassword,
        name: 'admin-change-password'
    },
    {
        path: '/admin/filter/education',
        component: Education,
        name: 'add-education'
    },
    {
        path: '/admin/filter/category',
        component: Category,
        name: 'add-category'
    },
    {
        path: '/admin/filter/experience',
        component: Experience,
        name: 'add-experience'
    },
    {
        path: '/admin/filter/level',
        component: Level,
        name: 'add-level'
    },
    {
        path: '/admin/filter/location',
        component: Location,
        name: 'add-location'
    },
    {
        path: '/admin/filter/salary',
        component: Salary,
        name: 'add-salary'
    },
    {
        path: '/admin/filter/term',
        component: Term,
        name: 'add-term'
    },
    {
        path: '/admin/filter/industry',
        component: Industry,
        name: 'add-industry'
    },
    {
        path: '/admin/filter/company-type',
        component: CompanyType,
        name: 'add-company-type'
    },
    {
        path: '/admin/filter/employee-type',
        component: EmployeeType,
        name: 'add-employee-type'
    },
    {
        path: '/admin/payment/gateway',
        component: Gateway,
        name: 'add-payment-gateway'
    },
    {
        path: '/admin/payment/pending',
        component: Pending,
        name: 'add-payment-pending'
    },
    {
        path: '/admin/payment/accepted',
        component: Accepted,
        name: 'add-payment-accepted'
    },
    {
        path: '/admin/payment/rejected',
        component: Rejected,
        name: 'add-payment-rejected'
    },
    {
        path: '/admin/setting/advertising',
        component: Adds,
        name: 'admin-adds'
    },
    {
        path: '/admin/setting/answer',
        component: Answer,
        name: 'admin-answer'
    },
    {
        path: '/admin/setting/tip',
        component: Blog,
        name: 'admin-blog'
    },
    {
        path: '/admin/page/all',
        component: About,
        name: 'admin-about'
    }
]