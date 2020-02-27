import CopytradePreformanceGraph from './components/Copytrade/CopytradePreformanceGraph.vue'
import CreateCopytradePreformanceGraph from './components/Copytrade/CreateCopytradePreformanceGraph.vue'
import EditCopytradePreformanceGraph from './components/Copytrade/EditCopytradePreformanceGraph.vue'

import FundManagementPreformanceGraph from './components/FundManagement/FundManagementPreformanceGraph.vue'
import CreateFundManagementPreformanceGraph from './components/FundManagement/CreateFundManagementPreformanceGraph.vue'
import EditFundManagementPreformanceGraph from './components/FundManagement/EditFundManagementPreformanceGraph.vue'

export default [

    {
        path: '/admin/graphs/copytrade',
        name: 'copytrade-performance-graph',
        component: CopytradePreformanceGraph,
        // redirect: {
        //     name: 'all-copytrade-subscription'
        // },
        children: [
            {
                path: 'create',
                name: 'create-copytrade-performance-graph',
                component: CreateCopytradePreformanceGraph
            },
            {
                path: 'edit/:id',
                name: 'edit-copytrade-performance-graph',
                component: EditCopytradePreformanceGraph
            },
        ]
    },

    {
        path: '/admin/graphs/fund-management',
        name: 'fund-management-performance-graph',
        component: FundManagementPreformanceGraph,
        // redirect: {
        //     name: 'all-copytrade-subscription'
        // },
        children: [
            {
                path: 'create',
                name: 'create-fund-management-performance-graph',
                component: CreateFundManagementPreformanceGraph
            },
            {
                path: 'edit/:id',
                name: 'edit-fund-management-performance-graph',
                component: EditFundManagementPreformanceGraph
            }
        ]
    },
]