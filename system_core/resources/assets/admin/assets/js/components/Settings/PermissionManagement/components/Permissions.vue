<template>
    <div>
        <div class="transaction-entry-field d-flex justify-content-between" style="margin-bottom: 10px">
            <div class="d-flex">
                <div>
                    <span class="mr-1">Show</span>
                </div>
                <div>
                    <select class="form-control form-control-xs selectpicker" v-model="perPage">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div>
                    <span class="ml-1">entries</span>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="d-flex"><span class="mr-1">Search:</span></div>
                <div class="d-flex">
                    <select class="form-control" v-model="searchType">
                        <option value="guard_name">Guard</option>
                        <option value="permission_name">Permission Name</option>
                    </select>
                </div>
                <div class="d-flex">
                    <select 
                        class="form-control"
                        style="width: 199px"
                        v-if="searchType==='guard_name'" 
                        v-model="guard_name">
                        <option value="" disabled>Select a guard</option>
                        <option value="admin">Admin</option>
                        <option value="member">Member</option>
                    </select>

                    <input type="text" class="form-control" 
                        v-if="searchType==='permission_name'" 
                        v-model="search"
                        :placeholder="searchPlaceholder">
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Guard</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody v-if="permissionPages.length > 0">
                <tr v-for="(permission, index) in permissionPages[currentPage - 1]" 
                        :key="permission.id">
                    <td>{{ permission.id }}</td>
                    <td>{{ permission.name }}</td>
                    <td>{{ permission.guard_name }}</td>
                    <td>
                        <RouterLink 
                            class="btn btn-raised btn-success btn-md"
                            :to="{ name: 'edit-permission', params: { id: permission.id } }">
                            Edit
                        </RouterLink>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="9" class="alert alert-warning" role="alert">
                    {{ message }}
                    </td>
                </tr>
            </tbody>
        </table>

        <paginate
            v-if="pageCount > 1"
            :page-count="pageCount"
            v-model="currentPage"
            :prev-text="'Prev'"
            :next-text="'Next'"
            :container-class="'pagination justify-content-center'"
            >
        </paginate>

        <RouterView/>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                permissions: [],
                permissionPages: [],
                perPage: 10,
                pageCount: 1,
                currentPage: 1,
                message: 'Fetching Permissions From The Server. Please Wait!',

                searchType: 'guard_name',
                search: '',
                guard_name: '',
                searchPlaceholder: '',
            }
        },
        watch: {
            searchType (value) {
                this.generatePages(this.permissions)
                this.guard_name = ''
                this.search = ''

                if (this.searchType === 'permission_name') {
                    this.searchPlaceholder = 'Input Permission name'
                }
            },

            perPage (value) {
                this.setCurrentPage(1)
                this.generatePages(this.permissions)
            },

            guard_name (value) {
                this.setCurrentPage(1)
                this.generatePages(this.permissions)
                if (this.guard_name != '') {
                    let permissions = this.permissions.filter(permission => {
                        return permission.guard_name == this.guard_name
                    })
                    this.generatePages(permissions)
                }
            },
            search (value) {
                this.setCurrentPage(1)
                this.generatePages(this.permissions)
                if (this.search !== '') {
                    
                    let permissions = this.permissions.filter(permission => {
                        //console.log(permission.name == this.search)
                        if (this.searchType === 'permission_name') {
                            if (permission.name.indexOf(this.search) !== -1) {
                                return permission
                            }
                        }
                    })
                    this.generatePages(permissions)
                }
            }
        },
        created () {
            axios.get('/xhr/admin/settings/permission-management/permissions')
                .then(response => {
                    this.permissions = response.data
                    
                    this.generatePages(this.permissions)
                })
                .catch(error => {
                    console.log(error)
                })

                EventBus.$on('permission-created', payload => {
                    this.permissions.unshift(payload)

                    this.generatePages(this.permissions)
                })

                EventBus.$on('permission-update', payload => {
                    let index = this.permissions.findIndex(permission => {
                        return permission.id === payload.id
                    })
                    this.permissions[index] = payload

                    this.generatePages(this.permissions)
                })
        },
        methods: {
            setCurrentPage (page) {
                this.currentPage = page
            },
            generatePages (permissions) {
                this.permissionPages = _.chunk(permissions, this.perPage)
              
                this.pageCount = 0
                this.pageCount = this.permissionPages.length
                if (this.pageCount === 0) {
                    this.message = "Sorry! No Permission Found"
                }
            }
        }
    }
</script>