import Dashboard from './components/Index/Dashboard'
import AccountSettings from './components/AccountSettings/Index'
import ProfileSettings from './components/AccountSettings/ProfileSettings'
import ChangePassword from './components/AccountSettings/ChangePassword'
import ServiceSettings from './components/AccountSettings/ServiceSettings'
import SupportTickets from './components/SupportTicket/SupportTickets'
import NewSupportTicket from './components/SupportTicket/NewSupportTicket'
import SupportTicketDetails from './components/SupportTicket/TicketDetails'

import PremiumSignal from './components/PremiumSignal/PremiumSignal'
import IndividualSignal from './components/PremiumSignal/IndividualSignal'

import CopyTrade from './components/CopyTrade/CopyTrade'
import FundManagement from './components/FundManagement/FundManagement'

import Wallet from './components/Financial/Wallet/Wallet'
import Deposit from './components/Financial/Deposit/Deposit'
import Invoice from './components/Financial/Invoice'
import EditDeposit from './components/Financial/Deposit/EditDeposit'
import Withdraw from './components/Financial/Withdraw/Withdraw'
import Transaction from './components/Financial/Transaction/Index'

import Affiliate from './components/Affiliate/Affiliate'
import AffiliateTools from './components/Affiliate/Tools'
import AffiliateReffers from './components/Affiliate/Reffers'


export default [
    {
        path: '/member/dashboard',
        name: 'dashboard',
        component: Dashboard,
    },
    {
        path: '/member/dashboard/account-settings',
        name: 'account-settings',
        component: AccountSettings,
        redirect: { name: 'profile' },
        children: [
            {
                path: 'profile',
                name: 'profile',
                component: ProfileSettings
            },
            {
                path: 'change-password',
                name: 'change-password',
                component: ChangePassword
            },
            {
                path: 'service',
                name: 'service-settings',
                component: ServiceSettings
            }
        ]
    },
    {
        path: '/member/dashboard/support-tickets',
        name: 'support-tickets',
        component: SupportTickets,
        children: [
            {
                path: 'new',
                name: 'new-support-ticket',
                component: NewSupportTicket
            },
            {
                path: 'details/:id',
                name: 'support-ticket-details',
                component: SupportTicketDetails,
                props: true
            }
        ]
    },
    {
        path: '/member/dashboard/signal',
        name: 'premium-signal',
        component: PremiumSignal,
        children: [
            {
                path: ':currency/:id',
                name: 'individual-signal',
                component: IndividualSignal
            }
        ]
    },
    {
        path: '/member/dashboard/copytrade',
        name: 'copy-trade',
        component: CopyTrade
    },
    {
        path: '/member/dashboard/fund-management',
        name: 'fund-management',
        component: FundManagement
    },
    {
        path: '/member/dashboard/financial/wallet',
        name: 'wallet',
        component: Wallet
    },
    {
        path: '/member/dashboard/financial/wallet/deposit',
        name: 'deposit',
        component: Deposit,
        children: [
            // {
            //     path: ':id/edit',
            //     name: 'edit-deposit',
            //     component: EditDeposit
            // }
        ]
    },
    {
        path: '/member/dashboard/financial/wallet/invoice',
        name: 'invoice',
        component: Invoice
    },
    {
        path: '/member/dashboard/financial/wallet/withdraw',
        name: 'withdraw',
        component: Withdraw
    },
    {
        path: '/member/dashboard/financial/wallet/transactions',
        name: 'transactions',
        component: Transaction
    },
    {
        path: '/member/dashboard/affiliate',
        name: 'affiliate',
        component: {
            render (c) {
                return c('router-view')
            }
        },

        redirect: { name: 'affiliate-dash' },
        children: [
            {
                path: '/',
                name: 'affiliate-dash',
                component: Affiliate
            },
            {
                path: 'tools',
                name: 'affiliate-tools',
                component: AffiliateTools
            },
            {
                path: 'reffers',
                name: 'affiliate-reffers',
                component: AffiliateReffers

            }
        ]
    }

]
