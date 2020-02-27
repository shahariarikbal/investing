<template>
    <div class="card-body card_block_top_align ">
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
                        <option value="username">Username</option>
                        <option value="fullname">Full Name</option>
                        <option value="email">Email</option>
                    </select>
                </div>
                <div class="d-flex">
                    <input type="text" name="search" id="search" class="form-controll" v-model="searchText" />
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Photo</th>
                    <th>User name</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="member in memberPages[currentPage]" :key="member.id">
                    <td>{{ member.id }}</td>
                    <td>
                        <img :src="`${member.avater_path}/50x50-${member.avater}`" alt="">
                    </td>
                    <td>{{ member.username }}</td>
                    <td>{{ member.full_name }}</td>
                    <td>{{ member.email }}</td>
                    <td>
                        <RouterLink 
                            class="btn btn-raised btn-info btn-sm"
                            :to="{ name: 'individual-member', params: { id: member.id } }">
                            Details
                        </RouterLink>
                    </td>
                </tr>
            </tbody>
        </table>
        <paginate
            v-if="pageCount > 1"
            :page-count="pageCount"
            :click-handler="setCurrentPage"
            
            :prev-text="'Prev'"
            :next-text="'Next'"
            :container-class="'pagination justify-content-center'">
        </paginate>
        <RouterView />
    </div>
</template>

<script>
    export default {
        data () {
            return {
                members: [],
                memberPages: [],
                perPage: 5,
                pageCount: 1,
                currentPage: 0,
                message: 'Fetching User Data From The Server. Please Wait!',

                searchType: 'username',
                searchText: ''
            }
        },

        watch: {
            searchType (value) {
                this.generatePages(this.members)
            },
            perPage (value) {
                this.generatePages(this.members)
            },
            searchText (value) {
                this.generatePages(this.members)
                if (this.searchText.length > 0) {
                    if (this.searchType === 'username') {
                        let members = this.members.filter(member => {
                            return member.username.search(this.searchText) !== -1
                        })
                        this.generatePages(members)
                    }
                
                    if (this.searchType === 'fullname') {
                        let members = this.members.filter(member => {
                            return member.full_name.search(this.searchText) !== -1
                        })
                        this.generatePages(members)
                    }

                    if (this.searchType === 'email') {
                        let members = this.members.filter(member => {
                            return member.email.search(this.searchText) !== -1
                        })
                        this.generatePages(members)
                    }
                }
            }
        },

        created () {
            axios.get('/xhr/admin/member-management/members')
                .then(response => {
                    this.members = response.data
                    this.generatePages(this.members)
                })
                .catch(error => {
                    console.log(error)
                })
        },
        methods: {
            setCurrentPage (page) {
                this.currentPage = page - 1
            },
            generatePages (members) {
                this.memberPages = _.chunk(members, this.perPage)
                this.pageCount = this.memberPages.length
                if (this.pageCount === 0) {
                    this.message = "Sorry! No User Data Found"
                }
            },
        }
    }
</script>