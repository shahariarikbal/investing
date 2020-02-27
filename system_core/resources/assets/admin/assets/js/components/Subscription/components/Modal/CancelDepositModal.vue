<template>
    <div class="modal fade" id="cancel-deposit-modal" role="dialog" aria-labelledby="modalLabelprimary">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="modalLabelprimary">Cancellation of Deposit</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="reason">Reason</label>
                        <textarea class="form-control" name="reason" id="reason" v-model="reason"></textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" data-dismiss="modal" @click="cancel">Cancel</button>
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
                reason: ''
            }
        },
        methods: {
            cancel() {
                let data = {
                    reason: this.reason,
                    deposit: this.deposit
                }

                EventBus.$emit('deposit-approve-canceled', data)

                this.reason = ''
            }
        }
    }
</script>