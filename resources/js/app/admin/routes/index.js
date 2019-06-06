import { CreatePackage, AllPackages, EditPackage } from '../components'

export default [
    {
        path: '/admin/package/create',
        component: CreatePackage,
        name: 'create-package',
        meta: {
            guest: true,
            needsAuth: false
        }
    },
    {
        path: '/admin/package/all',
        component: AllPackages,
        name: 'all-packages',
        meta: {
            guest: true,
            needsAuth: false
        }
    },
    {
        path: '/admin/package/all/:id',
        component: EditPackage,
        name: 'edit-package',
        meta: {
            guest: true,
            needsAuth: false
        }
    }
]