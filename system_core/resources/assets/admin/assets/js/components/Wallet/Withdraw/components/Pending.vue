<template>
    <div class="tab-pane fade show active mt-3" id="pending-withdraw" role="tabpanel" aria-labelledby="pending-withdraw-tab">
        <flash-message class="flash-message"></flash-message>
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
        <table class="table table-bordered" v-if="withdraws.length > 0">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>Receiving Account</th>
                    <th>User</th>
                    <th>Remark</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody v-if="withdrawPages.length > 0">
                <tr v-for="withdraw in withdrawPages[currentPage - 1]" :key="withdraw.id">
                    <td>{{ withdraw.id }}</td>
                    <td>{{ withdraw.method.indexOf('\\') ? withdraw.method.replace('Fxtutor\\Wallet\\Payments\\', '') : withdraw.method }}</td>
                    <td>{{ withdraw.total | currency }}</td>
                    <td>{{ withdraw.meta.account }}</td>
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
                        {{ withdraw.meta.remark }}
                    </td>
                    <td>
                        <!-- <button class="btn btn-raised btn-info btn-sm">Send Message</button> -->
                        <button class="btn btn-raised btn-success btn-sm" @click="approve(withdraw)" data-toggle="modal" data-target="#approve-withdraw-modal">Approve</button>
                        <button class="btn btn-raised btn-danger btn-sm" @click="cancel(withdraw)" data-toggle="modal" data-target="#cancel-withdraw-modal">Cancel</button>
                    </td>
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
        <approve-modal :withdraw="withdrawToBeApproved" />
        <cancel-modal :withdraw="withdrawToBeCanceled" />
    </div>
</template>

<script>

    import ApproveModal from './Modal/ApproveModal'
    import CancelModal from './Modal/CancelModal'

    export default {
        data () {
            return {
                withdrawToBeApproved: {},
                withdrawToBeCanceled: {},

                withdraws: [],
                withdrawPages: [],
                members: [],

                perPage: 10,
                pageCount: 1,
                currentPage: 1,
                message: 'Fetching Pending withdraw Data From The Server. Please Wait!',

                searchType: 'username',
                search: '',
                username: '',
                fullname: '',
                email: '',
                paymentMethod: '',
                searchPlaceholder: '',
            }
        },
        components: { ApproveModal, CancelModal },
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
            axios.get('/xhr/admin/wallet/withdraw/pending')
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


            EventBus.$on('withdraw-approve-confirmed', payload => {
                // console.log(payload)
                let data = { 
                    withdraw_id: payload.withdraw.id,
                    total: payload.amount,
                    payment_id: payload.transaction_id,
                    note: payload.note

                }
                axios.post('/xhr/admin/wallet/withdraw/approve', data)
                    .then(response => {
                        if (response.status === 200) {
                            this.flash('Approval of withdraw request successful', 'success')
                            this.withdraws = this.withdraws.filter(withdraw => {
                                return withdraw.id !== payload.withdraw.id
                            })
                            this.generatePages(this.withdraws)
                        }
                    })
                    .catch(error => {
                        this.flash('Something went wrong. Please try again', 'error')
                        console.log(error)
                    })
            })

            EventBus.$on('withdraw-approve-canceled', payload => {
                let data = { 
                    withdraw_id: payload.withdraw.id,
                    note: payload.note
                }

                
                axios.post('/xhr/admin/wallet/withdraw/cancel', data)
                    .then(response => {
                        if (response.status === 200) {
                            this.flash('Cancelation of withdraw request successful', 'success')
                            this.withdraws = this.withdraws.filter(withdraw => {
                                return withdraw.id !== payload.withdraw.id
                            })
                            this.generatePages(this.withdraws)
                        }
                    })
                    .catch(error => {
                        this.flash('Something went wrong. Please try again', 'error')
                        console.log(error)
                    })
            })
        },
        methods: {
            setCurrentPage (page) {
                this.currentPage = page
            },
            generatePages (withdraws) {
                this.withdrawPages = _.chunk(withdraws, this.perPage)
            
                this.pageCount = this.withdrawPages.length
                if (this.pageCount === 0) {
                    this.message = "Sorry! No Pending withdraw Data Found"
                }
            },
            approve(withdraw) {
                this.withdrawToBeApproved = withdraw
                // axios.post('/xhr/admin/wallet/withdraw/approve', { 
                //                                                     withdraw_id: withdraw.id,
                //                                                 })
                //     .then(response => {
                //         if (response.data === true) {
                //             let index = this.withdraws.findIndex(d => {
                //                 console.log(d.total)
                //                 return d.id = withdraw.id
                //             })
                //         }
                //     })
                //     .catch(error => {
                //         console.log(error)
                //     })
            },
            cancel(withdraw) {
                this.withdrawToBeCanceled = withdraw
                // axios.get('/xhr/admin/wallet/withdraw/cancel/'+withdraw)
                //     .then(response => {
                //         response.data
                //     })
                //     .catch(error => {
                //         console.log(error)
                //     })
            }
        }
    }
</script>

<style lang="scss" scoped>
    .flash-message {
        position: fixed;
        top: 165px;
        right: 0;
        z-index: 1051;
    }
</style>