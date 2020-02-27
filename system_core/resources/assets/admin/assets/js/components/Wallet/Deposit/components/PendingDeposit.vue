<template>
    <div class="tab-pane fade show active mt-3" id="pending-deposit" role="tabpanel" aria-labelledby="pending-deposit-tab">
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
        <table class="table table-bordered" v-if="deposits.length > 0">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>Transaction</th>
                    <th>User</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody v-if="depositPages.length > 0">
                <tr v-for="deposit in depositPages[currentPage - 1]" :key="deposit.id">
                    <td>{{ deposit.id }}</td>
                    <td>{{ deposit.method.indexOf('\\') ? deposit.method.replace('Fxtutor\\Wallet\\Payments\\', '') : deposit.method }}</td>
                    <td>{{ deposit.total | currency }}</td>
                    <td>
                        <button class="btn btn-raised btn-primary md-trigger adv_cust_mod_btn" @click="setScreenshot(deposit.meta.upload)" data-toggle="modal" data-target="#modal-16">{{ deposit.payment_id }}</button>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-3">
                                <img :src="`${deposit.member.avater_path}/50x50-${deposit.member.avater}`" alt="">
                            </div>
                            <div class="col-9">
                                {{ deposit.member.username }}<br />
                                {{ deposit.member.full_name }}<br />
                                {{ deposit.member.email }}
                            </div>
                        </div>
                        
                    </td>
                    <td>
                        <!-- <button class="btn btn-raised btn-info btn-sm">Send Message</button> -->
                        <button class="btn btn-raised btn-success btn-sm" @click="approve(deposit)" data-toggle="modal" data-target="#approve-deposit-modal">Approve</button>
                        <button class="btn btn-raised btn-danger btn-sm" @click="cancel(deposit)" data-toggle="modal" data-target="#cancel-deposit-modal">Cancel</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="alert alert-warning" role="alert" v-else>
            No Pending Deposit Found
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
        <transaction-screenshot-modal :screenshot="screenshot" />
        <approve-deposit-modal :deposit="depositToBeApproved" />
        <cancel-deposit-modal :deposit="depositToBeCanceled" />
    </div>
</template>

<script>
    import TransactionScreenshotModal from './Modal/TransactionScreenshotModal'
    import ApproveDepositModal from './Modal/ApproveDepositModal'
    import CancelDepositModal from './Modal/CancelDepositModal'

    export default {
        data () {
            return {
                depositToBeApproved: {},
                depositToBeCanceled: {},
                screenshot: '',

                deposits: [],
                depositPages: [],
                members: [],
                transactions: [],

                perPage: 10,
                pageCount: 1,
                currentPage: 1,
                message: 'Fetching Pending Deposit Data From The Server. Please Wait!',

                searchType: 'username',
                search: '',
                username: '',
                fullname: '',
                email: '',
                paymentMethod: '',
                searchPlaceholder: '',
            }
        },
        components: { TransactionScreenshotModal, ApproveDepositModal, CancelDepositModal },
        watch: {
            searchType (value) {
                this.setCurrentPage(1)
                this.generatePages(this.deposits)
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
                this.generatePages(this.deposits)
            },
        
        
            username (value) {
                this.setCurrentPage(1)
                if (this.username != '') {
                    let deposits = this.deposits.filter(deposit => {
                        return parseInt(deposit.member.id) == parseInt(this.username)
                    })

                    this.generatePages(deposits)
                }
            },

            fullname(value) {
                this.setCurrentPage(1)
                if (this.fullname != '') {
                    let deposits = this.deposits.filter(deposit => {
                        return deposit.member.id == this.fullname
                    })
                    //console.log(deposits)
                    this.generatePages(deposits)
                }
            },

            paymentMethod (value) {
                this.setCurrentPage(1)
                if (this.paymentMethod !== '') {
                    let deposits = this.deposits.filter(deposit => {
                        return deposit.method.replace('Fxtutor\\Wallet\\Payments\\', '').toLowerCase() == this.paymentMethod
                    })

                    this.generatePages(deposits)
                }
            },
            email(value) {
                this.setCurrentPage(1)
                if (this.email != '') {
                    let deposits = this.deposits.filter(deposit => {
                        return deposit.member.id == this.email
                    })
                    //console.log(deposits)
                    this.generatePages(deposits)
                }
            },
            search (value) {
                this.setCurrentPage(1)
                this.generatePages(this.deposits)
                if (this.search !== '') {
                    let deposits = this.deposits.filter(deposit => {
                        
                        if (this.searchType === 'amount') {
                            if (parseFloat(deposit.amount) === parseFloat(this.search)) {
                                return deposit
                            }
                        }

                        if (this.searchType === 'transaction_id') {
                            if (deposit.payment_id.indexOf(this.search) !== -1) {
                                return deposit
                            }
                        }
                    })
                    
                    this.generatePages(deposits)
                }
            },
        },
        created() {

            axios.get('/xhr/admin/wallet/deposit/pending')
                .then(response => {
                    this.deposits = response.data
                    this.generatePages(this.deposits)

                    this.deposits.map(deposit => {
                        let index = this.members.findIndex(m => {
                            return m.id === deposit.member.id
                        })

                        if (index === -1) {
                            let member = {}
                            member.id = deposit.member.id
                            member.username = deposit.member.username
                            member.email = deposit.member.email
                            member.first_name = deposit.member.first_name
                            member.last_name = deposit.member.last_name
                            member.full_name = deposit.member.full_name
                            member.avater = deposit.member.avater

                            this.members.push(member)
                        }
                    })
                })
                .catch(error => {
                    console.log(error)
                })

 
            axios.get('/xhr/admin/wallet/pending/deposit/transaction')
                .then(response => {
                    this.transactions = response.data
                })
                .catch(error => {
                    console.log(error)
                })

            EventBus.$on('deposit-approve-confirmed', payload => {
                // console.log(payload)
                let data = { 
                    deposit_id: payload.deposit.id,
                    amount: payload.amount,
                    total: payload.amount,
                    payment_id: payload.transaction_id,
                    meta: {
                        notes: payload.deposit.meta.notes,
                        upload: payload.deposit.meta.upload,
                        email: payload.email
                    }

                }
                axios.post('/xhr/admin/wallet/deposit/approve', data)
                    .then(response => {
                        if (response.data === true) {
                            this.flash('Approval of deposit request successful', 'success')
                            this.deposits = this.deposits.filter(deposit => {
                                return deposit.id !== payload.deposit.id
                            })
                            this.generatePages(this.deposits)
                        }
                    })
                    .catch(error => {
                        this.flash('Something went wrong. Please try again', 'error')
                        console.log(error)
                    })
            })

            EventBus.$on('deposit-approve-canceled', payload => {
                let data = { 
                    deposit_id: payload.deposit.id,
                    meta: {
                        notes: payload.deposit.meta.notes,
                        upload: payload.deposit.meta.upload,
                        reason: payload.reason
                    }

                }
                axios.post('/xhr/admin/wallet/deposit/cancel', data)
                    .then(response => {
                        if (response.data === true) {
                            this.flash('Cancelation of deposit request successful', 'success')
                            this.deposits = this.deposits.filter(deposit => {
                                return deposit.id !== payload.deposit.id
                            })
                            this.generatePages(this.deposits)
                        }
                    })
                    .catch(error => {
                        this.flash('Something went wrong. Please try again', 'error')
                        console.log(error)
                    })
            })
        },
        methods: {
            setScreenshot(screenshot) {
                this.screenshot = screenshot
            },
            setCurrentPage (page) {
                this.currentPage = page
            },
            generatePages (deposits) {
                this.depositPages = _.chunk(deposits, this.perPage)
            
                this.pageCount = this.depositPages.length
                if (this.pageCount === 0) {
                    this.message = "Sorry! No Pending Deposit Data Found"
                }
            },
            approve(deposit) {
                this.depositToBeApproved = deposit
            },
            cancel(deposit) {
                this.depositToBeCanceled = deposit
            }
        }
    }
</script>

<style lang="scss" scoped>
    .flash-message {
        position: fixed;
        top: 164px;
        right: 0;
        z-index: 1051;
    }
</style>