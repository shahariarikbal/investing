<template>
    <div class="modal fade" id="deposit-modal" role="dialog" aria-labelledby="modalLabelprimary">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="modalLabelprimary">Deposit Requests</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Payment Method</th>
                                <th>Transaction ID</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(deposit, index) in deposits" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>
                                    <payment-processor :image="true" :text="false" :data="deposit.method.indexOf('\\') ? deposit.method.replace('Fxtutor\\Wallet\\Payments\\', '') : deposit.method" />
                                </td>
                                <td>
                                    <button class="btn btn-raised btn-primary md-trigger adv_cust_mod_btn" @click="showTransactionScreenshot(deposit.meta.upload, deposit.payment_id)">{{ deposit.payment_id }}</button>
                                </td>
                                <td>{{ deposit.total | currency }}</td>
                                <td>{{ deposit.status }}</td>
                                <td>
                                    <!-- <button class="btn btn-raised btn-info btn-sm">Send Message</button> -->
                                    <template v-if="deposit.status==='unapproved'">
                                        <button class="btn btn-raised btn-success btn-sm" @click="approve(deposit)" data-toggle="modal" data-target="#approve-deposit-modal">Approve</button>
                                        <button class="btn btn-raised btn-danger btn-sm" @click="cancel(deposit)" data-toggle="modal" data-target="#cancel-deposit-modal">Cancel</button>
                                    </template>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div v-if="screenshotDisplay">
                        <div class="d-flex justify-content-between">
                            <h4>Screenshot: {{ this.transaction_id }}</h4>
                            <button class="btn btn-raised btn-danger btn-sm" @click="screenshotDisplay=false">Close</button>
                        </div>
                        <img style="width: 100%" :src="`${InvestingPartner.app_url}/storage/transaction/${this.screenshot}`" alt="">
                    </div>

                    <div v-if="approveDisplay">
                        <div class="card-header bg-success">
                            <h4 class="card-title text-white" id="modalLabelprimary">Approval of Deposit: {{ transactionId }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Amount">Amount</label>
                                <input type="number" class="form-control" name="amount" id="amount" v-model="amount">
                            </div>

                            <div class="form-group">
                                <label for="transactionId">Transaction Id</label>
                                <input type="text" class="form-control" name="amount" id="transactionId" v-model="transactionId">
                            </div>

                            <div class="form-group">
                                <label for="email">Fund Receiving Email</label>
                                <input type="email" class="form-control" name="email" id="email" v-model="email">
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-danger" @click="approveDisplay=false">Close!</button>
                            <button class="btn btn-success" @click="confirmDeposit">Confirm</button>
                        </div>
                    </div>
                    
                    <div v-if="cancelDisplay">
                        <div class="card-header bg-primary">
                            <h4 class="card-title text-white" id="modalLabelprimary">Cancellation of Deposit</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="reason">Reason</label>
                                <textarea class="form-control" name="reason" id="reason" v-model="reason"></textarea>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-danger" @click="cancelDisplay = false">Close</button>
                            <button class="btn btn-success" @click="cancelDeposit">Cancel</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn  btn-primary" data-dismiss="modal">Close me!</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: [ 'subscription' ],
        data () {
            return {
                screenshotDisplay: false,
                screenshot: '',
                transaction_id: '',

                approveDisplay: false,
                cancelDisplay: false,

                deposits: {},

                deposit: {},
                amount: '',
                transactionId: '',
                email: '',

                reason: ''
            }
        },

        created () {
            axios.get('/xhr/admin/subscriptions/' + this.subscription.id + '/deposit')
                .then(response => {
                    this.deposits = response.data.member.deposits
                })
                .catch(error => {
                    console.log(error)
                })
        },

        methods: {
            showTransactionScreenshot (screenshot, transaction_id) {
                this.screenshotDisplay = true
                this.screenshot = screenshot
                this.transaction_id = transaction_id
            },
            approve (deposit) {
                
                this.cancelDisplay = false

                this.deposit = deposit
                this.amount = deposit.total
                this.transactionId = deposit.payment_id
                this.approveDisplay = true
            },

            cancel (deposit) {
                this.approveDisplay = false
                this.deposit = deposit
                this.cancelDisplay = true
            },

            confirmDeposit () {
                let data = { 
                    deposit_id: this.deposit.id,
                    amount: this.amount,
                    total: this.amount,
                    payment_id: this.transactionId,
                    meta: {
                        notes: this.deposit.meta.notes,
                        upload: this.deposit.meta.upload,
                        email: this.email
                    }

                }
                console.log(data)
                axios.post('/xhr/admin/wallet/deposit/approve', data)
                    .then(response => {
                        if (response.data === true) {
                            alert('Deposit approve successful')
                            // EventBus.$emit('deposit-approve-successful')
                            this.deposits.map(deposit => {
                                if (deposit.id === this.deposit.id) {
                                    this.deposit.status = 'approved'
                                }
                            })
                            this.approveDisplay = false
                            // console.log(this.deposits)
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            cancelDeposit () {
                let data = { 
                    deposit_id: this.deposit.id,
                    meta: {
                        notes: this.deposit.meta.notes,
                        upload: this.deposit.meta.upload,
                        reason: this.reason
                    }

                }
                axios.post('/xhr/admin/wallet/deposit/cancel', data)
                    .then(response => {
                        if (response.data === true) {
                            alert('Deposit canceled successful')
                            // EventBus.$emit('deposit-approve-successful')
                            this.deposits.map(deposit => {
                                if (deposit.id === this.deposit.id) {
                                    this.deposit.status = 'cancel'
                                }
                            })
                            this.cancelDisplay = false
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        }
    }
</script>