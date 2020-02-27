import Member from './components/Index';
import Members from './components/Members'

    import IndividualMember from './components/IndividualMember'

    import MemberProfile from './components/Profile/Index'
    import MemberSubscription from './components/Subscription/Index'
    import MemberWallet from './components/Wallet/Index'
        import MemberWalletBalance from './components/Wallet/Balance'
        import MemberWalletDeposit from './components/Wallet/Deposit'
        import MemberWalletWithdraw from './components/Wallet/Withdraw'

    import MemberTransaction from './components/Transaction/Index'

export default [
    {
        path: '/admin/member-management',
        name: 'member-management',
        redirect: {
            name: 'members'
        }
    },
    {
        path: '/admin/member-management/members',
        name: 'members',
        component: Members,
        children: [
            {
                path: ':id',
                name: 'individual-member',
                component: IndividualMember,
                redirect: {
                    name: 'member-profile'
                },
                children: [
                    {
                        path: 'profile',
                        name: 'member-profile',
                        component: MemberProfile
                    },
                    {
                        path: 'subscription',
                        name: 'member-subscription',
                        component: MemberSubscription
                    },
                    {
                        path: 'wallet',
                        name: 'member-wallet',
                        component: MemberWallet,
                        redirect: {
                            name: 'member-wallet-balance'
                        },
                        children: [
                            {
                                path: 'balance',
                                name: 'member-wallet-balance',
                                component: MemberWalletBalance
                            },
                            {
                                path: 'deposit',
                                name: 'member-wallet-deposit',
                                component: MemberWalletDeposit
                            },
                            {
                                path: 'withdraw',
                                name: 'member-wallet-withdraw',
                                component: MemberWalletWithdraw
                            }
                        ]
                    },
                    {
                        path: 'transaction',
                        name: 'member-transaction',
                        component: MemberTransaction
                    }
                ],
            }
        ]
    },
    
]