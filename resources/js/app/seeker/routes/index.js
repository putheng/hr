import {
	Home, Profile, ChangePassword,
    Resume, CreateResume
} from '../components'

export default [
	{
        path: '/jobseeker',
        component: Home,
        name: 'jobseeker'
    },
    {
        path: '/jobseeker/profile',
        component: Profile,
        name: 'j-profile'
    },
    {
        path: '/jobseeker/password',
        component: ChangePassword,
        name: 'j-password'
    },
    {
        path: '/jobseeker/resume',
        component: Resume,
        name: 'j-resume'
    },
    {
        path: '/jobseeker/resume/create',
        component: CreateResume,
        name: 'j-create-resume'
    }
]