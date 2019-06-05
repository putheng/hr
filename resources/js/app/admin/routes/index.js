import { CreatePackage } from '../components'

export default [
    {
        path: '/admin/package/create',
        component: CreatePackage,
        name: 'create-package',
        meta: {
            guest: true,
            needsAuth: false
        }
    }
]