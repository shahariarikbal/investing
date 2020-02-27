<template>
    <div class="tab-pane fade show active mt-3" id="pending-withdraw" role="tabpanel" aria-labelledby="pending-withdraw-tab">
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
                        <option value="transaction_id">Transaction Id</option>
                        <option value="email">Email</option>
                        <option value="amount">Amount</option>
                        <option value="payment_method">Payment Methods</option>
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
                        v-if="searchType==='transaction_id' || searchType==='amount'" 
                        v-model="search"
                        :placeholder="searchPlaceholder">

                    <select 
                        class="form-control"
                        style="width: 199px"
                        v-if="searchType==='payment_method'" 
                        v-model="paymentMethod">
                        <option value="">Select a payment method</option>
                        <option value="10">Paypal</option>
                        <option value="wallet">Wallet</option>
                        <option value="perfect-money">Perfect Money</option>
                        <option value="neteller">Neteller</option>
                        <option value="skrill">Skrill</option>
                        <option value="bitcoin">Bitcoin</option>
                    </select>
                </div>
            </div>
        </div>
        <table class="table" v-if="withdraws.length > 0">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>User</th>
                    <th>Reason</th>
                </tr>
            </thead>
            <tbody v-if="withdrawPages.length > 0">
                <tr v-for="(withdraw, index) in withdrawPages[currentPage - 1]" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ withdraw.method.replace('Fxtutor\\Wallet\\Payments\\', '') }}</td>
                    <td>{{ withdraw.total | currency }}</td>
                    <td>
                        <div class="row">
                            <div class="col-3">
                                <img :src="`${withdraw.member.avater_path}/50x50-${withdraw.member.avater}`" alt="">
                            </div>
                            <div class="col-9">
                                {{ withdraw.member.username }}<br />
                                {{ withdraw.member.full_name }}<br />
                                {{ withdraw.member.email }}
                            </div>
                        </div>
                        
                    </td>
                    <td>
                        {{ withdraw.meta.cancel_note }}
                    </td>
                    <!-- <td>
                        <button class="btn btn-raised btn-success btn-sm" @click="approve(withdraw)">Approve</button>
                        <button class="btn btn-raised btn-danger btn-sm" @click="cancel(withdraw)">Cancel</button>
                    </td> -->
                </tr>
            </tbody>
        </table>
        <div class="alert alert-warning" role="alert" v-else>
            No Pending withdraw Found
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
</template>

<script>


    export default {
        data () {
            return {
                withdraws: [],
                withdrawPages: [],
                members: [],
                transactions: [],
                
                perPage: 10,
                pageCount: 1,
                currentPage: 1,
                message: 'Fetching Cancel withdraw Data From The Server. Please Wait!',

                searchType: 'username',
                search: '',
                username: '',
                fullname: '',
                email: '',
                paymentMethod: '',
                searchPlaceholder: '',
            }
        },
        watch: {
            searchType (value) {
                this.setCurrentPage(1)
                this.generatePages(this.withdraws)
                this.search = ''
                this.username = ''
                this.fullname = ''
                this.paymentMethod = ''
                this.email = ''

                if (this.searchType === 'transaction_id') {
                    this.searchPlaceholder = 'Type a transaction id'
                }
                if (this.searchType === 'amount') {
                    this.searchPlaceholder = 'Type a transaction amount'
                }
            },
            perPage (value) {
                this.setCurrentPage(1)
                this.generatePages(this.withdraws)
            },
        
        
            username (value) {
                this.setCurrentPage(1)
                if (this.username != '') {
                    let withdraws = this.withdraws.filter(withdraw => {
                        return parseInt(withdraw.member.id) == parseInt(this.username)
                    })

                    this.generatePages(withdraws)
                }
            },

            fullname(value) {
                this.setCurrentPage(1)
                if (this.fullname != '') {
                    let withdraws = this.withdraws.filter(withdraw => {
                        return withdraw.member.id == this.fullname
                    })
                    //console.log(withdraws)
                    this.generatePages(withdraws)
                }
            },

            paymentMethod (value) {
                this.setCurrentPage(1)
                if (this.paymentMethod !== '') {
                    let withdraws = this.withdraws.filter(withdraw => {
                        return withdraw.method.replace('Fxtutor\\Wallet\\Payments\\', '').toLowerCase() == this.paymentMethod
                    })

                    this.generatePages(withdraws)
                }
            },
            email(value) {
                this.setCurrentPage(1)
                if (this.email != '') {
                    let withdraws = this.withdraws.filter(withdraw => {
                        return withdraw.member.id == this.email
                    })
                    //console.log(withdraws)
                    this.generatePages(withdraws)
                }
            },
            search (value) {
                this.setCurrentPage(1)
                this.generatePages(this.withdraws)
                if (this.search !== '') {
                    let withdraws = this.withdraws.filter(withdraw => {
                        
                        if (this.searchType === 'amount') {
                            if (parseFloat(withdraw.amount) === parseFloat(this.search)) {
                                return withdraw
                            }
                        }

                        if (this.searchType === 'transaction_id') {
                            if (withdraw.payment_id.indexOf(this.search) !== -1) {
                                return withdraw
                            }
                        }
                    })
                    
                    this.generatePages(withdraws)
                }
            },
        },
        created() {
            axios.get('/xhr/admin/wallet/withdraw/canceled')
                .then(response => {
                    this.withdraws = response.data
                    this.generatePages(this.withdraws)

                    this.withdraws.map(withdraw => {
                        let index = this.members.findIndex(m => {
                            return m.id === withdraw.member.id
                        })

                        if (index === -1) {
                            let member = {}
                            member.id = withdraw.member.id
                            member.username = withdraw.member.username
                            member.email = withdraw.member.email
                            member.first_name = withdraw.member.first_name
                            member.last_name = withdraw.member.last_name
                            member.full_name = withdraw.member.full_name
                            member.avater = withdraw.member.avater

                            this.members.push(member)
                        }
                    })
                })
                .catch(error => {
                    console.log(error)
                })

                // axios.get('/xhr/admin/wallet/member/withdraw/canceled')
                //     .then(response => {
                //             this.members = response.data.map(res => {
                //             let member = {}
                //             member.id = res.member.id
                //             member.username = res.member.username
                //             member.email = res.member.email
                //             member.first_name = res.member.first_name
                //             member.last_name = res.member.last_name
                //             member.full_name = res.member.full_name
                //             member.avater = res.member.avater

                //             return member
                //         })
                //     })
                //     .catch(error => {
                //         console.log(error)
                //     })

                axios.get('/xhr/admin/wallet/cancel/withdraw/transaction')
                    .then(response => {
                        this.transactions = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
        },
        methods: {
            setScreenshot(screenshot) {
                this.screenshot = screenshot
            },
            setCurrentPage (page) {
                this.currentPage = page
            },
            generatePages (withdraws) {
                this.withdrawPages = _.chunk(withdraws, this.perPage)
            
                this.pageCount = this.withdrawPages.length
                if (this.pageCount === 0) {
                    this.message = "Sorry! No withdraw Data Found"
                }
            },
            approve(withdraw) {
                axios.post('/xhr/admin/wallet/withdraw/approve', { withdraw_id: withdraw.id, })
                    .then(response => {
                        if (response.data === true) {
                            let index = this.withdraws.findIndex(d => {
                                console.log(d.total)
                                return d.id = withdraw.id
                            })
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            cancel(withdraw) {
                axios.get('/xhr/admin/wallet/withdraw/cancel/'+withdraw)
                    .then(response => {
                        response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        }
    }
</script>