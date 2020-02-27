
import Roles from './components/Roles.vue'
import CreateRole from './components/CreateRole'
import EditRole from './components/EditRole'

export default [
    {
        path: '/admin/settings/role-management',
        // name: 'admin-permission-management',
        // component: PermissionManagementIndex,
        redirect: {
            name: 'roles'
        }
    },
    {
        path: '/admin/settings/role-management/roles',
        name: 'roles',
        component: Roles,
        children: [
            {
                path: 'create',
                name: 'create-role',
                component: CreateRole
            },
            {
                path: 'edit/:id',
                name: 'edit-role',
                component: EditRole
            }
        ]
    },
    
]