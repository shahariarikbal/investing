<template>
    <div class="tab-pane fade show active mt-3" id="pending-deposit" role="tabpanel" aria-labelledby="pending-deposit-tab">
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
            <tbody>
                <tr v-for="(deposit, index) in deposits" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ deposit.method.indexOf('\\') ? deposit.method.replace('Fxtutor\\Wallet\\Payments\\', '') : deposit.method }}</td>
                    <td>{{ deposit.total }}<i class="fa fa-usd"></i></td>
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
                deposits: [],
                depositToBeApproved: {},
                depositToBeCanceled: {},
                screenshot: ''
            }
        },
        components: { TransactionScreenshotModal, ApproveDepositModal, CancelDepositModal },
        created() {
            axios.get('/xhr/admin/wallet/deposit/pending')
                .then(response => {
                    this.deposits = response.data
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
                            this.deposits = this.deposits.filter(deposit => {
                                return deposit.id !== payload.deposit.id
                            })
                            // console.log(this.deposits)
                        }
                    })
                    .catch(error => {
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
                            this.deposits = this.deposits.filter(deposit => {
                                return deposit.id !== payload.deposit.id
                            })
                            // console.log(this.deposits)
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            })
        },
        methods: {
            setScreenshot(screenshot) {
                this.screenshot = screenshot
            },
            approve(deposit) {
                this.depositToBeApproved = deposit
                // axios.post('/xhr/admin/wallet/deposit/approve', { 
                //                                                     deposit_id: deposit.id,
                //                                                 })
                //     .then(response => {
                //         if (response.data === true) {
                //             let index = this.deposits.findIndex(d => {
                //                 console.log(d.total)
                //                 return d.id = deposit.id
                //             })
                //         }
                //     })
                //     .catch(error => {
                //         console.log(error)
                //     })
            },
            cancel(deposit) {
                this.depositToBeCanceled = deposit
                // axios.get('/xhr/admin/wallet/deposit/cancel/'+deposit)
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