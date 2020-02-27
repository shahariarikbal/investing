import FundManagementMonthlyTradeStatement from './components/FundManagement/FundManagementMonthlyTradeStatement.vue'
import CreateFundManagementMonthlyTradeStatement from './components/FundManagement/CreateFundManagementMonthlyTradeStatement.vue'
import EditFundManagementMonthlyTradeStatement from './components/FundManagement/EditFundManagementMonthlyTradeStatement.vue'
import AttachmentFundManagementMonthlyTradeStatement from './components/FundManagement/AttachmentFundManagementMonthlyTradeStatement.vue'

export default [
    {
        path: '/admin/monthly-trade-statement',
        redirect: { name: 'fund-management-monthly-trade-statement' }
    },
    {
        path: '/admin/monthly-trade-statement/fund-management',
        name: 'fund-management-monthly-trade-statement',
        component: FundManagementMonthlyTradeStatement,
        // redirect: {
        //     name: 'all-copytrade-subscription'
        // },
        children: [
            {
                path: 'create',
                name: 'create-fund-management-monthly-trade-statement',
                component: CreateFundManagementMonthlyTradeStatement
            },
            {
                path: 'edit/:id',
                name: 'edit-fund-management-monthly-trade-statement',
                component: EditFundManagementMonthlyTradeStatement
            },
            {
                path: 'attachment/:id',
                name: 'attachment-fund-management-monthly-trade-statement',
                component: AttachmentFundManagementMonthlyTradeStatement
            }
        ]
    },
]