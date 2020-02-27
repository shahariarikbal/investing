import Pendingwithdraw from './components/Pending'
import Approvedwithdraw from './components/Approved'
import Canceledwithdraw from './components/Canceled'

export default [
    
    {
        path: '/admin/wallet/withdraw',
        redirect: {
            name: 'pending-withdraw'
        }
    },

    {
        path: '/admin/wallet/withdraw/pending',
        name: 'pending-withdraw',
        component: Pendingwithdraw,
    },
    
    {
        path: '/admin/wallet/withdraw/approved',
        name: 'approved-withdraw',
        component: Approvedwithdraw,
    },

    {
        path: '/admin/wallet/withdraw/cancel',
        name: 'canceled-withdraw',
        component: Canceledwithdraw,
    }

    
]
