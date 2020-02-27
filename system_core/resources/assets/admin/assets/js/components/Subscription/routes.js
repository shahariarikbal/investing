import SignalSubscriptions from './components/SignalSubscriptions'
import CopytradeSubscriptions from './components/CopytradeSubscriptions'
import FundManagementSubscription from './components/FundManagementSubscription'

import AllSignalSubscription from './components/Signal/AllSubscriptions'
import AllCopytradeSubscription from './components/Copytrade/AllSubscriptions'
import AllFundManagementSubscription from './components/FundManagement/AllSubscriptions.vue'

export default [
    
    // {
    //     path: '/admin/wallet/deposit',
    //     redirect: {
    //         name: 'pending-deposit'
    //     }
    // },

    {
        path: '/admin/subscriptions/signal',
        name: 'signal-subscriptions',
        component: SignalSubscriptions,
        redirect: {
            name: 'all-signal-subscription'
        },
        children: [
            {
                path: 'all-subscriptions',
                name: 'all-signal-subscription',
                component: AllSignalSubscription
            }
        ]
    },
    
    {
        path: '/admin/subscriptions/copytrade',
        name: 'copytrade-subscriptions',
        component: CopytradeSubscriptions,
        redirect: {
            name: 'all-copytrade-subscription'
        },
        children: [
            {
                path: 'all-subscriptions',
                name: 'all-copytrade-subscription',
                component: AllCopytradeSubscription
            }
        ]
    },

    {
        path: '/admin/subscriptions/fund-management',
        name: 'fund-management-subscriptions',
        component: FundManagementSubscription,
        redirect: {
            name: 'all-fund-management-subscription'
        },
        children: [
            {
                path: 'all-subscriptions',
                name: 'all-fund-management-subscription',
                component: AllFundManagementSubscription
            }
        ]
    }
]
