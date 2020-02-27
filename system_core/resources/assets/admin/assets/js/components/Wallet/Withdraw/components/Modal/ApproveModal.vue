<template>
    <div class="modal fade" id="approve-withdraw-modal" role="dialog" aria-labelledby="modalLabelprimary">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white" id="modalLabelprimary">Approval of withdraw</h4>
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
                        <label for="email">Success Note</label>
                        <textarea v-model="note" class="form-control" ></textarea>
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
        props: [ 'withdraw' ],
        data () {
            return {
                amount: '',
                transactionId: '',
                note: ''
            }
        },
        watch: {
            withdraw(value) {
                this.amount = this.withdraw.total
                this.transactionId = this.withdraw.payment_id
            }
        },
        methods: {
            confirm() {
                let data = {
                    amount: this.amount,
                    transaction_id: this.transactionId,
                    note: this.note,
                    withdraw: this.withdraw
                }

                EventBus.$emit('withdraw-approve-confirmed', data)

                this.amount = ''
                this.transactionId = ''
                this.note = ''
            }
        }
    }
</script>