<template>
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header bg-white">
                Balance
            </div>
            <br/>
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
                            <option value="amount">Amount</option>
                        </select>
                    </div>
                    <div class="d-flex">
                        <select 
                            class="form-control"
                            style="width: 199px"
                            v-if="searchType==='username'" 
                            v-model="username">
                            <option value="" disabled>Select a username</option>
                            <option v-for="member in members" :key="member.id" :value="member.id">{{ member.username }}</option>
                        </select>
                        
                        <select 
                            class="form-control"
                            style="width: 199px"
                            v-if="searchType==='fullname'" 
                            v-model="fullname">
                            <option value="" disabled>Select a fullname</option>
                            <option v-for="member in members" :key="member.id" :value="member.id">{{ member.full_name }}</option>
                        </select>

                        <select 
                            class="form-control"
                            style="width: 199px"
                            v-if="searchType==='email'" 
                            v-model="email">
                            <option value="" disabled>Select a email</option>
                            <option v-for="member in members" :key="member.id" :value="member.id">{{ member.email }}</option>
                        </select>

                        <input type="text" class="form-control" 
                            v-if="searchType==='amount'" 
                            v-model="search"
                            :placeholder="searchPlaceholder">
                    </div>
                </div>
            </div>
            <div class="card-body card_block_top_align ">
                <table class="table table-bordered" v-if="members.length > 0">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>User</th>
                            <th>Main Balance</th>
                            <th>Restricted Blanace</th>
                            <th>Inreview Balance</th>
                            <th>Pending Balance</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(member, index) in balancePages[currentPage - 1]" :key="member.id">
                            <td>{{ index + 1 }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-3">
                                        <img :src="`${member.avater_path}/50x50-${member.avater}`" alt="">
                                    </div>
                                    <div class="col-9">
                                        {{ member.username }}<br />
                                        {{ member.full_name }}<br />
                                        {{ member.email }}
                                    </div>
                                </div>
                            </td>
                            <td>{{ member.account.balance | currency }}</td>
                            <td>{{ member.account.restricted | currency }}</td>
                            <td>{{ member.account.inreview | currency }}</td>
                            <td>{{ member.account.pending | currency }}</td>
                            <!-- <td>
                                <button class="btn btn-raised btn-success btn-sm" @click="approve(deposit)">Approve</button>
                                <button class="btn btn-raised btn-danger btn-sm" @click="cancel(deposit)">Cancel</button>
                            </td> -->
                        </tr>
                    </tbody>
                    
                </table>
                <div class="alert alert-warning" role="alert" v-else>
                    No balance information found
                </div>
                <paginate
                    v-if="pageCount > 1"
                    :page-count="pageCount"
                    v-model="currentPage"
                    :prev-text="'Prev'"
                    :next-text="'Next'"
                    :container-class="'pagination justify-content-center'"
                    >
                </paginate>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                members: [],
                //balances: [],
                balancePages: [],

                perPage: 10,
                pageCount: 1,
                currentPage: 1,
                message: 'Fetching Balance Data From The Server. Please Wait!',

                searchType: 'username',
                search: '',
                username: '',
                fullname: '',
                email: '',
                searchPlaceholder: '',

            }
        },

        watch: {
            searchType (value) {
                this.setCurrentPage(1)
                this.generatePages(this.members)
                this.search = ''
                this.username = ''
                this.fullname = ''
                this.email = ''

                if (this.searchType === 'amount') {
                    this.searchPlaceholder = 'Type a available balance'
                }
            },
            perPage (value) {
                this.setCurrentPage(1)
                this.generatePages(this.members)
            },
        
        
            username (value) {
                this.setCurrentPage(1)
                if (this.username != '') {
                    let members = this.members.filter(member => {
                        return parseInt(member.id) == parseInt(this.username)
                    })

                    this.generatePages(members)
                }
            },

            fullname(value) {
                this.setCurrentPage(1)
                if (this.fullname != '') {
                    let members = this.members.filter(member => {
                        return member.id == this.fullname
                    })
                    //console.log(deposits)
                    this.generatePages(members)
                }
            },

            email(value) {
                this.setCurrentPage(1)
                if (this.email != '') {
                    let members = this.members.filter(member => {
                        return member.id == this.email
                    })
                    //console.log(deposits)
                    this.generatePages(members)
                }
            },
            search (value) {
                
                this.setCurrentPage(1)
                this.generatePages(this.members)
                if (this.search !== '') {
                    let members = this.members.filter(member => {
                        
                        if (this.searchType === 'amount') {
                            if (parseFloat(member.account.balance) === parseFloat(this.search)) {
                                return member
                            }
                        }

                    })
                    
                    this.generatePages(members)
                }
            },
        },

        created () {
            axios.get('/xhr/admin/wallet/balance')
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
                this.currentPage = page
            },
            generatePages (members) {
                this.balancePages = _.chunk(members, this.perPage)
            
                this.pageCount = this.balancePages.length

                if (this.pageCount === 0) {
                    this.message = "Sorry! No Balance Data Found"
                }
            },
        }
    }
</script>
