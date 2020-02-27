//import PermissionManagementIndex from './components/Index.vue'

import Permissions from './components/Permissions.vue'
import CreatePermission from './components/CreatePermission'
import EditPermission from './components/EditPermission'

export default [
    {
        path: '/admin/settings/permission-management',
        // name: 'admin-permission-management',
        // component: PermissionManagementIndex,
        redirect: {
            name: 'permissions'
        }
    },
    {
        path: '/admin/settings/permission-management/permissions',
        name: 'permissions',
        component: Permissions,
        children: [
            {
                path: 'create',
                name: 'create-permission',
                component: CreatePermission
            },
            {
                path: 'edit/:id',
                name: 'edit-permission',
                component: EditPermission
            }
        ]
    },
    
]