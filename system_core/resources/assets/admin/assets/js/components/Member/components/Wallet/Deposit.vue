<template>
    <div class="tab-pane fade show active" id="v-pills-wallet-deposit" role="tabpanel" aria-labelledby="v-pills-wallet-deposit-tab">
        <table class="table table-bordered" v-if="deposits.length > 0">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>Transaction</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody v-if="depositPages.length > 0">
                <tr v-for="(deposit, index) in depositPages[currentPage - 1]" :key="deposit.id">
                    <td>{{ index + 1 }}</td>
                    <td>{{ deposit.method.replace('Fxtutor\\Wallet\\Payments\\', '') }}</td>
                    <td>{{ deposit.total | currency }}</td>
                    <td>
                        <button class="btn btn-raised btn-default md-trigger adv_cust_mod_btn">{{ deposit.payment_id }}</button>
                        <button class="btn btn-raised btn-primary md-trigger adv_cust_mod_btn" @click="setScreenshot(deposit.meta.upload)" data-toggle="modal" data-target="#modal-16">Screenshot</button>
                        <button class="btn btn-raised btn-info md-trigger adv_cust_mod_btn" @click="setTransactions(deposit.transactions)" data-toggle="modal" data-target="#transaction-modal">Transactions</button>
                    </td>
                    <td>{{ deposit.status }}</td>
                </tr>
            </tbody>
            <div class="alert alert-warning" role="alert" v-else>
                No Pending Deposit Found
            </div>
            <tbody v-else>
                <tr>
                    <td colspan="6" class="alert alert-warning" role="alert">
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
        <transaction-screenshot-modal :screenshot="screenshot" />
        <transaction-modal :transactions="transactions" />
    </div>
</template>

<script>
    import TransactionScreenshotModal from './../../../Wallet/Deposit/components/Modal/TransactionScreenshotModal'
    import TransactionModal from './../../../Wallet/Deposit/components/Modal/TransactionModal'
    // import ApproveDepositModal from './Modal/ApproveDepositModal'
    // import CancelDepositModal from './Modal/CancelDepositModal'

    export default {
        data () {
            return {
                deposits: [],
                depositPages: [],
        
                transactions: [],
                screenshot: '',

                perPage: 10,
                pageCount: 1,
                currentPage: 1,
                message: 'Fetching Deposit Data From The Server. Please Wait!',

                searchType: 'username',
                search: '',
                username: '',
                fullname: '',
                email: '',
                paymentMethod: '',
               
            }
        },
        components: { 
            TransactionScreenshotModal,
            TransactionModal,
            // ApproveDepositModal, 
            // CancelDepositModal 
        },
        watch: {
            // searchType (value) {
            //     this.setCurrentPage(1)
            //     this.generatePages(this.deposits)
            //     this.search = ''
            //     this.username = ''
            //     this.fullname = ''
            //     this.paymentMethod = ''
            //     this.email = ''
            // },
            // perPage (value) {
            //     this.setCurrentPage(1)
            //     this.generatePages(this.deposits)
            // },
        
            // username (value) {
            //     this.setCurrentPage(1)
            //     if (this.username != '') {
            //         let deposits = this.deposits.filter(deposit => {
            //             return parseInt(deposit.member.id) == parseInt(this.username)
            //         })

            //         this.generatePages(deposits)
            //     }
            // },

            // fullname(value) {
            //     this.setCurrentPage(1)
            //     if (this.fullname != '') {
            //         let deposits = this.deposits.filter(deposit => {
            //             return deposit.member.id == this.fullname
            //         })
            //         //console.log(deposits)
            //         this.generatePages(deposits)
            //     }
            // },

            // paymentMethod (value) {
            //     this.setCurrentPage(1)
            //     if (this.paymentMethod !== '') {
            //         let deposits = this.deposits.filter(deposit => {
            //             return deposit.method.replace('Fxtutor\\Wallet\\Payments\\', '').toLowerCase() == this.paymentMethod
            //         })

            //         this.generatePages(deposits)
            //     }
            // },
            // email(value) {
            //     this.setCurrentPage(1)
            //     if (this.email != '') {
            //         let deposits = this.deposits.filter(deposit => {
            //             return deposit.member.id == this.email
            //         })
            //         //console.log(deposits)
            //         this.generatePages(deposits)
            //     }
            // },
            // search (value) {
            //     this.generatePages(this.deposits)
            //     if (this.search !== '') {
            //         let deposits = this.deposits.filter(deposit => {
                        
            //             if (this.searchType === 'amount') {
            //                 if (parseFloat(deposit.amount) === parseFloat(this.search)) {
            //                     return deposit
            //                 }
            //             }

            //             if (this.searchType === 'transaction_id') {
            //                 if (deposit.payment_id.indexOf(this.search) !== -1) {
            //                     return deposit
            //                 }
            //             }
            //         })
                    
            //         this.generatePages(deposits)
            //     }
            // },
        },
        created() {
            axios.get(`/xhr/admin/member-management/members/${this.$route.params.id}/deposit`)
                .then(response => {
                    this.deposits = response.data.deposits
                    this.generatePages(this.deposits)
                })
                .catch(error => {
                    console.log(error)
                })
        },
        methods: {
            setScreenshot (screenshot) {
                this.screenshot = screenshot
            },
            setTransactions (transactions) {
                this.transactions = transactions
            },
            setCurrentPage (page) {
                this.currentPage = page
            },
            generatePages (deposits) {
                this.depositPages = _.chunk(deposits, this.perPage)
            
                this.pageCount = this.depositPages.length
                if (this.pageCount === 0) {
                    this.message = "Sorry! No Deposit Data Found"
                }
            },
        }
    }
</script>