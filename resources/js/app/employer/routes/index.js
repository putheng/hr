import { 
    BuyPackage,
    Home,
    MyPackages,
    MyProfile,
    ChangePassword,
    CompanyProfile,
    Wallet,
    Transaction,
    Deposit,
    CreateListing,
    PublishListing,
    UnpublishListing,
    ExpiredListing,
} from '../components'

export default [
	{
        path: '/employer',
        component: Home,
        name: 'employer'
    },
    {
        path: '/employer/package/buy',
        component: BuyPackage,
        name: 'buy-package'
    },
    {
        path: '/employer/package/my',
        component: MyPackages,
        name: 'my-packages'
    },
    {
        path: '/employer/setting/profile',
        component: MyProfile,
        name: 'my-profile'
    },
    {
        path: '/employer/setting/company',
        component: CompanyProfile,
        name: 'company-profile'
    },
    {
        path: '/employer/setting/password',
        component: ChangePassword,
        name: 'change-password'
    },
    {
        path: '/employer/payments/wallet',
        component: Wallet,
        name: 'my-wallet'
    },
    {
        path: '/employer/payments/deposit',
        component: Deposit,
        name: 'my-deposit'
    },
    {
        path: '/employer/payments/transaction',
        component: Transaction,
        name: 'my-transaction'
    },
    {
        path: '/employer/listing/create',
        component: CreateListing,
        name: 'create-listing'
    },
    {
        path: '/employer/listing/publish',
        component: PublishListing,
        name: 'publish-listing'
    },
    {
        path: '/employer/listing/unpublish',
        component: UnpublishListing,
        name: 'unpublish-listing'
    },
    {
        path: '/employer/listing/expired',
        component: ExpiredListing,
        name: 'expired-listing'
    }
]