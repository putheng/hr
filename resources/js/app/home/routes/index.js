import { Home } from '../components'

export default [
    {
        path: '/admin',
        component: Home,
        name: 'admin',
        meta: {
            guest: false,
            needsAuth: false
        }
    }
]