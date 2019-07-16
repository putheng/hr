import {
	Home, Profile, ChangePassword,
    Resume, CreateResume, Upload, Edit, Favorite
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
    },
    {
        path: '/jobseeker/resume/upload',
        component: Upload,
        name: 'j-create-upload'
    },
    {
        path: '/jobseeker/resume/edit/:id',
        component: Edit,
        name: 'j-resume-edit',
        props: true
    },
    {
        path: '/jobseeker/listing/favorite',
        component: Favorite,
        name: 'j-listing-favorite'
    }
]