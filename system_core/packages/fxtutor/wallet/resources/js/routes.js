import financialDash from './components/dashboard/index.vue'
import TransactionPage from './components/transactions/index.vue'
import Transactions from './components/transactions/Transactions.vue'
import Milestones from './components/transactions/Milestones.vue'
import InvoicesHistory from './components/transactions/Invoices.vue'
import DipositsHistory from './components/transactions/Deposits.vue'
import WithDrawHistory from './components/transactions/Withdraws.vue'
import PendingFundHistory from './components/transactions/PendingFund.vue'
import PaymentVerify from './components/PaymentVerify.vue'
import Deposit from './components/Deposit/index.vue'
import DepositForm from './components/Deposit/DepositForm'
import Withdraw from './components/withdraw/index.vue'

export default [
    {
        path: '/dashboard/wallet',
        redirect: { name: 'financial-dash' },
        component: {
            render (c) {
                return c('router-view')
            }
        },
        children: [
            {
                path: '/',
                name: 'financial-dash',
                component: financialDash
            },
            {
                path: 'verify',
                name: 'verify',
                component: PaymentVerify
            },
            {
                path: 'transactions',
                name: 'transaction-page',
                component: TransactionPage,
                children: [
                    {
                        path: '/',
                        name: 'transactions',
                        component: Transactions
                    },
                    {
                        path: 'milestones',
                        name: 'milestone-history',
                        component: Milestones
                    },
                    {
                        path: 'deposit-history',
                        name: 'deposit-history',
                        component: DipositsHistory
                    },
                    {
                        path: 'withdraw-history',
                        name: 'withdraw-history',
                        component: WithDrawHistory
                    },
                    {
                        path: 'pending-funds',
                        name: 'pending-funds-history',
                        component: PendingFundHistory
                    },
                    {
                        path: 'invoices',
                        name: 'invoices-history',
                        component: InvoicesHistory
                    }
                ]
            },
            {
                path: 'withdraw',
                name: 'withdraw',
                component: Withdraw
            },
            {
                path: 'deposit',
                name: 'deposit',
                component: Deposit,
                children: [
                    {
                        path: ':method',
                        name: 'deposit-method',
                        component: DepositForm
                    }
                    
                ]
            }
        ]
    }

]
