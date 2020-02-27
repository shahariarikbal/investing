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
                        <option value="role_name">Role Name</option>
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
                        v-if="searchType==='role_name'" 
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
            <tbody v-if="rolePages.length > 0">
                <tr v-for="(role, index) in rolePages[currentPage - 1]" 
                        :key="role.id">
                    <td>{{ role.id }}</td>
                    <td>{{ role.name }}</td>
                    <td>{{ role.guard_name }}</td>
                    <td>
                        <RouterLink 
                            class="btn btn-raised btn-success btn-md"
                            :to="{ name: 'edit-role', params: { id: role.id } }">
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
                roles: [],
                rolePages: [],
                perPage: 10,
                pageCount: 1,
                currentPage: 1,
                message: 'Fetching Role From The Server. Please Wait!',

                searchType: 'role_name',
                search: '',
                role_name: '',
                guard_name: '',
                searchPlaceholder: '',
            }
        },
        watch: {
            searchType (value) {
                this.generatePages(this.roles)
                this.role_name = ''
                this.search = ''

                if (this.searchType === 'role_name') {
                    this.searchPlaceholder = 'Input Role name'
                }
            },

            perPage (value) {
                this.setCurrentPage(1)
                this.generatePages(this.roles)
            },

            guard_name (value) {
                this.setCurrentPage(1)
                this.generatePages(this.roles)
                if (this.role_name != '') {
                    let roles = this.roles.filter(role => {
                        return roles.role_name == this.role_name
                    })
                    this.generatePages(roles)
                }
            },
            search (value) {
                this.setCurrentPage(1)
                this.generatePages(this.roles)
                if (this.search !== '') {
                    
                    let roles = this.roles.filter(role => {
                        //console.log(permission.name == this.search)
                        if (this.searchType === 'role_name') {
                            if (role.name.indexOf(this.search) !== -1) {
                                return role
                            }
                        }
                    })
                    this.generatePages(roles)
                }
            }
        },
        created () {
            axios.get('/xhr/admin/settings/role-management/roles')
                .then(response => {
                    this.roles = response.data
                    
                    this.generatePages(this.roles)
                })
                .catch(error => {
                    console.log(error)
                })

                EventBus.$on('role-created', payload => {
                    this.roles.unshift(payload)

                    this.generatePages(this.roles)
                })

                EventBus.$on('role-update', payload => {
                    let index = this.roles.findIndex(role => {
                        return role.id === payload.id
                    })
                    this.roles[index] = payload

                    this.generatePages(this.roles)
                })
        },
        methods: {
            setCurrentPage (page) {
                this.currentPage = page
            },
            generatePages (roles) {
                this.rolePages = _.chunk(roles, this.perPage)
              
                this.pageCount = 0
                this.pageCount = this.rolePages.length
                if (this.pageCount === 0) {
                    this.message = "Sorry! No Role Found"
                }
            }
        }
    }
</script>