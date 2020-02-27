<template>
    <div class="modal fade" id="cancel-withdraw-modal" role="dialog" aria-labelledby="modalLabelprimary">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="modalLabelprimary">Cancellation of withdraw</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="reason">Cancel Note</label>
                        <textarea class="form-control" name="reason" id="reason" v-model="note"></textarea>
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
        props: [ 'withdraw' ],
        data () {
            return {
                note: ''
            }
        },
        methods: {
            cancel() {
                let data = {
                    note: this.note,
                    withdraw: this.withdraw
                }

                EventBus.$emit('withdraw-approve-canceled', data)

                this.note = ''
            }
        }
    }
</script>