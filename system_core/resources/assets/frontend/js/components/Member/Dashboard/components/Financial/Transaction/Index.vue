<template>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" id="seconddiv">
        <div class="drop-shadow">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="font-weight-normal text-5 mb-4"><strong class="font-weight-extra-bold">transaction </strong>history</h2>
                    <div class="transaction-entry-field d-flex justify-content-between" style="margin-bottom: 10px">
                        <div class="d-flex">
                            <div>
                                <span class="mr-1">Show</span>
                            </div>
                            <div>
                                <select class="form-control form-control-xs selectpicker" v-model="perPage">
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
                                    <option value="type">Type</option>
                                    <option value="payment_method">Payment Method</option>
                                    <option value="transaction_id">Transaction ID</option>
                                    <option value="amount">Amount</option>
                                    <option value="date">Date</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <select 
                                    class="form-control"
                                    style="width: 199px"
                                    v-if="searchType==='type'" 
                                    v-model="type">
                                    <option value="">Select a type</option>
                                    <option value="subscription">Subscription</option>
                                    <option value="deposit">Deposit</option>
                                    <option value="withdraw">withdraw</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                                
                                
                                <select 
                                    class="form-control"
                                    style="width: 199px"
                                    v-if="searchType==='payment_method'" 
                                    v-model="paymentMethod">
                                    <option value="">Select a payment method</option>
                                    <option value="paypal">Paypal</option>
                                    <option value="perfect-money">Perfect Money</option>
                                    <option value="neteller">Neteller</option>
                                    <option value="skrill">Skrill</option>
                                    <option value="bitcoin">Bitcoin</option>
                                </select>
                                
                                <input type="text" class="form-control" 
                                    v-if="searchType==='transaction_id' || searchType==='amount'" 
                                    v-model="search"
                                    :placeholder="searchPlaceholder">

                                <date-range-picker
                                    v-if="searchType==='date'"
                                    v-model="dateRange"
                                    opens="left"
                                    :linked-calendars="true"
                                    :showWeekNumbers="true"
                                    :showDropdowns="true"
                                    :autoApply="true"
                                    @update="searchWithDateRange"
                                ></date-range-picker>
                            </div>
                        </div>
                    </div>
                    <table class="table text-center table-bordered" v-if="transactionPages.length > 0">
                        <thead class="thead-dark text-uppercase">
                            <tr>
                                <th>date</th>
                                <th scope="col">payment type</th>
                                <th scope="col">payment method</th>
                                <th scope="col">transaction id</th>
                                <th scope="col">Description</th>
                                <th>amount</th>
                            </tr>
                        </thead>
                         <!-- v-text="transaction.meta.payment_method.toUpperCase()" -->
                        <tbody>
                            <tr v-for="transaction in transactionPages[currentPage - 1]" :key="transaction.id">
                                <td>{{ transaction.created_at | moment("llll") }}</td>
                                <td v-text="transaction.resource_type.split('\\')[transaction.resource_type.split('\\').length - 1]"></td>
                                <td style="text-align: left">
                                    <payment-processor 
                                        v-if="transaction.resource_type.split('\\')[transaction.resource_type.split('\\').length - 1] === 'Subscription'"
                                        :image="true" 
                                        :text="false" 
                                        data="wallet" />

                                    <payment-processor 
                                        v-else 
                                        :image="true" 
                                        :text="false" 
                                        :data="transaction.meta.payment_method" />
                                </td>
                                <td>{{ transaction.transaction_id }}</td>
                                <td class="text-left" v-text="transaction.message.replace('App\\', '')"></td>
                                <td style="text-align: right">{{ transaction.type === 'credit' ? '+' : '-' }} {{ transaction.amount | currency }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="alert alert-warning" role="alert" v-else v-html="fallbackMessage">
                    No Transaction Found
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
    </div>
</template>

<script>
    import DateRangePicker from 'vue2-daterange-picker'
    import 'vue2-daterange-picker/dist/vue2-daterange-picker.css'

    import moment from 'moment'

    export default {
        data () {
            return {
                transactions: {},
                transactionPages: {},
                fallbackMessage: 'Fetching transaction history from server <i class="fas fa-spinner fa-pulse"></i>',

                perPage: 10,
                pageCount: 1,
                currentPage: 1,

                searchType: 'type',
                search: '',
                type: '',
                paymentMethod: '',

                searchPlaceholder: '',

                dateRange: {
                    startDate: new Date(),
                    endDate: new Date(),
                }
            }
        },
        components: { DateRangePicker },
        watch: {
            searchType (value) {
                this.resetSelection()
                this.generatePages(this.transactions)

                if (this.searchType === 'transaction_id') {
                    this.searchPlaceholder = 'Type a transaction id'
                }
                if (this.searchType === 'amount') {
                    this.searchPlaceholder = 'Type a transaction amount'
                }
            },
            type (value) {
                this.generatePages(this.transactions)
                if (this.type !== '') {
                    let transactions = this.transactions.filter(transaction => {
                        if (transaction.resource_type.split('\\')[transaction.resource_type.split('\\').length - 1].toLowerCase() === this.type) {
                            return transaction
                        }
                    })

                    this.generatePages(transactions)
                }
            },
            paymentMethod (value) {
                this.generatePages(this.transactions)
                if (this.paymentMethod !== '') {
                    let transactions = this.transactions.filter(transaction => {
                        if (transaction.meta.payment_method === this.paymentMethod) {
                            return transaction
                        }
                    })

                    this.generatePages(transactions)
                }
            },
            search (value) {
                this.generatePages(this.transactions)
                if (this.search !== '') {
                    let transactions = this.transactions.filter(transaction => {
                        
                        if (this.searchType === 'amount') {
                            if (parseFloat(transaction.amount) === parseFloat(this.search)) {
                                return transaction
                            }
                        }

                        if (this.searchType === 'transaction_id') {
                            if (transaction.transaction_id.indexOf(this.search) !== -1) {
                                return transaction
                            }
                        }
                    })
                    
                    this.generatePages(transactions)
                }
            },
            perPage (value) {
                this.generatePages(this.transactions)
            }
        },
        created () {
            axios.post('/api/member/financial/transactions', { 'type': 'recent' }
                )
                .then(response => {
                    if (response.data.length === 0) {
                        this.fallbackMessage = 'No transaction found'
                    }
                    this.transactions = response.data
                    this.transactionPages = _.chunk(this.transactions, this.perPage)
                    this.pageCount = this.transactionPages.length
                })
                .catch(error => {
                    console.log(error)
                })
        },
        methods: {
            resetSelection () {
                // reset search options
                this.search = ''
                this.paymentType = ''
                this.paymentMethod = ''
                this.dateRange.startDate = new Date()
                this.dateRange.endDate = new Date()
                this.setCurrentPage(1)
            },
            resetResult () {
                // reset resutls
                this.transactionPages = _.chunk(this.transactions, this.perPage)
                this.pageCount = this.transactionPages.length
            },
            setCurrentPage (page) {
                this.currentPage = page
            },
            generatePages (transaction) {
                this.setCurrentPage(1)
                this.transactionPages = _.chunk(transaction, this.perPage)
                this.pageCount = this.transactionPages.length
                if (this.pageCount === 0) {
                    this.fallbackMessage = "No transaction found"
                }
            },
            searchWithDateRange (payload) {

                let startDate = new Date(payload.startDate)
                let endDate = new Date(payload.endDate)
                let transactions = this.transactions.filter(transaction => {
                    if (moment(new Date(transaction.created_at)) >= moment(startDate).startOf('day') && moment(new Date(transaction.created_at)) < moment(endDate).endOf('day')) {
                        return transaction
                    }
                })
                this.generatePages(transactions)
            }
        }
    }
</script>
