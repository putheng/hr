import {
    CreatePackage,
    AllPackages,
    EditPackage,
    Education,
    Category,
    Level,
    Location,
    Salary,
    Term,
    CompanyType,
    EmployeeType,
    Experience,
    UpdateProfile,
    ChangePassword,
    Gateway
} from '../components'

export default [
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
    }
]