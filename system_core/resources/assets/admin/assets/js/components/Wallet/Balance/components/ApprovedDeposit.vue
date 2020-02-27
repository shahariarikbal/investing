<template>
    <div class="tab-pane fade show active mt-3" id="pending-deposit" role="tabpanel" aria-labelledby="pending-deposit-tab">
        <table class="table" v-if="deposits.length > 0">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>Transaction</th>
                    <th>User</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
                <tr v-for="(deposit, index) in deposits" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ deposit.method.replace('Fxtutor\\Wallet\\Payments\\', '') }}</td>
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
                    <!-- <td>
                        <button class="btn btn-raised btn-success btn-sm" @click="approve(deposit)">Approve</button>
                        <button class="btn btn-raised btn-danger btn-sm" @click="cancel(deposit)">Cancel</button>
                    </td> -->
                </tr>
            </tbody>
            
        </table>
        <div class="alert alert-warning" role="alert" v-else>
            No Pending Deposit Found
        </div>
        <transaction-screenshot-modal :screenshot="screenshot" />
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
                screenshot: ''
            }
        },
        components: { TransactionScreenshotModal, ApproveDepositModal, CancelDepositModal },
        created() {
            axios.get('/xhr/admin/wallet/deposit/approved')
                .then(response => {
                    this.deposits = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        methods: {
            setScreenshot(screenshot) {
                this.screenshot = screenshot
            }
        }
    }
</script>