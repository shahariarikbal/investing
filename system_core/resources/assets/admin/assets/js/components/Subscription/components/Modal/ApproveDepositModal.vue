<template>
    <div class="modal fade" id="approve-deposit-modal" role="dialog" aria-labelledby="modalLabelprimary">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white" id="modalLabelprimary">Approval of Deposit</h4>
                </div>
                <div class="modal-body">
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
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-danger" data-dismiss="modal">Close!</button>
                    <button class="btn btn-success" data-dismiss="modal" @click="confirm">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'deposit' ],
        data () {
            return {
                amount: '',
                transactionId: '',
                email: ''
            }
        },
        watch: {
            deposit(value) {
                this.amount = this.deposit.total
                this.transactionId = this.deposit.payment_id
            }
        },
        methods: {
            confirm() {
                let data = {
                    amount: this.amount,
                    transaction_id: this.transactionId,
                    email: this.email,
                    deposit: this.deposit
                }

                EventBus.$emit('deposit-approve-confirmed', data)

                this.amount = ''
                this.transactionId = ''
                this.email = ''
            }
        }
    }
</script>