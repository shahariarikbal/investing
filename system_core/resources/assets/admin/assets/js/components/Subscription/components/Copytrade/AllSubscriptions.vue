<template>
    <div class="tab-pane fade show active mt-3" id="pending-deposit" role="tabpanel" aria-labelledby="pending-deposit-tab">
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
                        <option value="status">Status</option>
                        <option value="member">Member</option>
                        <option value="start_at">Subscription Start</option>
                        <option value="ends_at">Subscription End</option>
                        <option value="plan">Plan</option>
                        <option value="payment_method">Payment Methods</option>
                    </select>
                </div>
                <div class="d-flex">
                    <select 
                        class="form-control"
                        style="width: 199px"
                        v-if="searchType==='status'" 
                        v-model="status">
                        <option value="" disabled>Select a status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                    
                    <select 
                        class="form-control"
                        style="width: 199px"
                        v-if="searchType==='member'" 
                        v-model="member">
                        <option value="" disabled>Select a member</option>
                        <option v-for="member in members" :key="member.id" :value="member.id">{{ member.email }}</option>
                    </select>
                    
                    <date-range-picker
                        v-if="searchType==='start_at'" 
                        v-model="dateRange"
                        opens="left"
                        :linked-calendars="true"
                        :showWeekNumbers="true"
                        :showDropdowns="true"
                        :autoApply="true"
                        @update="searchWithDateRangeForStart"
                    ></date-range-picker>

                    <date-range-picker
                        v-if="searchType==='ends_at'" 
                        v-model="dateRange"
                        opens="left"
                        :linked-calendars="true"
                        :showWeekNumbers="true"
                        :showDropdowns="true"
                        :autoApply="true"
                        @update="searchWithDateRangeForEnd"
                    ></date-range-picker>

                    <select 
                        class="form-control"
                        style="width: 199px"
                        v-if="searchType==='plan'" 
                        v-model="plan">
                        <option value="" disabled>Select a package</option>
                        <option v-for="plan in packages" :value="plan.id" :key="plan.id">{{ plan.duration }} - {{ plan.name }}@{{ plan.price | currency }}</option>
                    </select>
                    <select 
                        class="form-control"
                        style="width: 199px"
                        v-if="searchType==='payment_method'" 
                        v-model="paymentMethod">
                        <option value="">Select a payment method</option>
                        <option value="paypal">Paypal</option>
                        <option value="wallet">Wallet</option>
                        <option value="perfect-money">Perfect Money</option>
                        <option value="neteller">Neteller</option>
                        <option value="skrill">Skrill</option>
                        <option value="bitcoin">Bitcoin</option>
                    </select>
                </div>
            </div>
        </div>
        <table class="table table-bordered" v-if="subscriptions.length > 0">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Member</th>
                    <th>Package</th>
                    <th>Subscription</th>
                    <th>Payment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody v-if="subscriptionPages.length > 0">
                <tr v-for="(subscription, index) in subscriptionPages[currentPage - 1]" :key="subscription.id">
                    <td>{{ index + 1 }}</td>
                    <td>
                        <div class="row">
                            <div class="col-3">
                                <img :src="`${subscription.member.avater_path}/50x50-${subscription.member.avater}`" alt="">
                            </div>
                            <div class="col-9">
                                <b>Username: </b>{{ subscription.member.username }}<br />
                                <b>Full Name: </b>{{ subscription.member.full_name }}<br />
                                <b>Email: </b>{{ subscription.member.email }}
                                <button class="btn btn-raised btn-info btn-sm" @click="balance(subscription)" data-toggle="modal" data-target="#balance-modal">Balance</button>
                            </div>
                        </div>
                    </td>
                    <td>{{ subscription.plan.duration }} {{ subscription.plan.name }} Package @{{ subscription.plan.price | currency }}</td>
                    <td>
                        <span v-if="subscription.start_at">
                            <b>Start: </b>{{ subscription.start_at | moment("llll") }}<br />
                            <b>End: </b>{{ subscription.ends_at | moment("llll") }}
                        </span>
                        <span v-else>
                            Not yet started
                        </span><br />
                        <button class="btn btn-raised btn-success btn-sm" @click="metaTraderInformation(subscription.meta_trader_account)" data-toggle="modal" data-target="#meta-trader-information-modal">Meta Trader Information</button>

                    </td>
                    <td>
                        <b>Status: </b>{{ subscription.status }}<br />
                        <b>Payment Method: </b><payment-processor :image="true" :text="false" :data="subscription.payment_method ? subscription.payment_method : 'wallet'" /><br />

                        <template v-if="subscription.status == 'Unpaid'">
                            <button class="btn btn-raised btn-primary btn-sm" @click="deposit(subscription)" data-toggle="modal" data-target="#deposit-modal">Deposits</button>
                        </template>
                        

                        <!-- <span v-else>{{ subscription.member.deposits }} <br />{{ subscription.member.transactions }}</span> -->

                    </td>
                    <td>
                        <button v-if="subscription.status == 'Unpaid'" class="btn btn-raised btn-success btn-sm" @click="approveSubscription(subscription)" data-toggle="modal" data-target="#approve-subscription-modal">Approve</button>
                        <button v-if="subscription.status == 'Unpaid'" class="btn btn-raised btn-danger btn-sm" @click="cancelSubscription(subscription)" data-toggle="modal" data-target="#cancel-subscription-modal">Cancel</button>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="6" class="alert alert-warning" role="alert">
                    {{ message }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="alert alert-warning" role="alert" v-else>
            No Subscription Found
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

        <deposit-modal v-if="displayDepositModal" :subscription="subscription" />
        
        <transaction-modal :transactions="transactionToBeDisplayed" />

        <balance-modal v-if="displayBalanceModal" :subscription="subscription" />

        <approve-subscription-modal v-if="displayApproveSubscriptionModal" :subscription="subscription" />

        <cancel-subscription-modal v-if="displayCancelSubscriptionModal" :subscription="subscription" />

        <meta-trader-information-modal v-if="displayMetaTraderInformationModal" :account="mtInformation" />
    </div>
</template>

<script>
    import DepositModal from './../Modal/DepositModal'
    import TransactionModal from './../Modal/TransactionModal'
    import BalanceModal from './../Modal/BalanceModal'
    import ApproveSubscriptionModal from './../Modal/ApproveSubscriptionModal'
    import CancelSubscriptionModal from './../Modal/CancelSubscriptionModal'
    import MetaTraderInformationModal from './../Modal/MetaTraderInformationModal'

    import DateRangePicker from 'vue2-daterange-picker'
    import 'vue2-daterange-picker/dist/vue2-daterange-picker.css'

    import moment from 'moment'

    export default {
        data () {
            return {
                
                subscription: {},
                transactionToBeDisplayed: [],

                displayDepositModal: false,
                displayBalanceModal: false,
                displayApproveSubscriptionModal: false,
                displayCancelSubscriptionModal: false,

                dateRange: {
                    startDate: new Date(),
                    endDate: new Date(),
                },
                displayMetaTraderInformationModal: false,
                mtInformation: {}
            }
        },
        components: { DepositModal, TransactionModal, BalanceModal, ApproveSubscriptionModal, CancelSubscriptionModal, MetaTraderInformationModal, DateRangePicker },

        created () {
            axios.get('/xhr/admin/subscriptions/copytrade/all-subscripton')
                .then(response => {
                    this.subscriptions = response.data

                    this.generatePages(this.subscriptions)
                })
                .catch(error => {
                    console.log(error)
                })

                //Package
                axios.get('/xhr/admin/subscriptions/package/copytrade')
                .then(response => {
                    //console.log(response)
                    this.packages = response.data
                })
                .catch(error => {
                    console.log(error)
                })

                // members
                axios.get('/xhr/admin/subscriptions/signal/member/copytrade')
                .then(response => {
                    this.members = response.data.map(res => {
                        let member = {}
                        member.id = res.member.id
                        member.username = res.member.username
                        member.email = res.member.email
                        member.first_name = res.member.first_name
                        member.last_name = res.member.last_name
                        member.full_name = res.member.full_name
                        member.avater = res.member.avater

                        return member
                    })
                })
                .catch(error => {
                    console.log(error)
                })
        },
        methods: {
            // resetSelection () {
            //     // reset search options
            //     this.status = ''
            //     this.member = ''
            //     this.dateRange.startDate = new Date()
            //     this.dateRange.endDate = new Date()
            //     this.plan = ''
            //     this.paymentMethods = ''
            //     this.setCurrentPage(1)
            // },
            metaTraderInformation (metaTraderInformation) {
                console.log(metaTraderInformation)
                this.mtInformation = metaTraderInformation
                this.displayMetaTraderInformationModal = true
            },
            approveSubscription (subscription) {
                this.subscription = subscription
                this.displayApproveSubscriptionModal = true
            },

            cancelSubscription (subscription) {
                this.subscription = subscription
                this.displayCancelSubscriptionModal = true
            },

            balance (subscription) {
                this.subscription = subscription
                this.displayBalanceModal = true
            },

            deposit (subscription) {
                this.displayDepositModal = true
                console.log(subscription)
                this.subscription = subscription
            },
            transaction (transaction) {
                this.transactionToBeDisplayed = transaction
            },
            
        }
    }
</script>