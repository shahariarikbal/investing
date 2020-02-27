<template>
    <div class="modal fade" id="cancel-subscription-modal" role="dialog" aria-labelledby="modalLabelprimary">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-white" id="modalLabelprimary">Cancel Subscription</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to cancel this subscription?</p>

                    <div class="form-group">
                        <label for="reason">Reason</label>
                        <textarea class="form-control" name="reason" id="reason" cols="30" rows="4" v-model="reason"></textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn  btn-dark" data-dismiss="modal">No</button>
                    <button class="btn  btn-danger" data-dismiss="modal" @click="cancelSubscription">Yes</button>
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
                reason: ''
            }
        },

        methods: {
            cancelSubscription () {
                axios.post('/xhr/admin/subscriptions/' + this.subscription.id + '/cancel', { reason: this.reason })
                    .then(response => {
                        if(response.data.status === 'Active') {
                            this.flash('Subscription canceled successful!', 'success')
                            location.reload()
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        },

        created () {
            // axios.get('/xhr/admin/subscriptions/' + this.subscription.id + '/balance')
            //     .then(response => {
            //         this.member = response.data.member
            //         this.balance = this.member.account.balance
            //         this.restricted = this.member.account.restricted
            //         this.inreview = this.member.account.inreview
            //         this.pending = this.member.account.pending
            //     })
            //     .catch(error => {
            //         console.log(error)
            //     })
        }
    }
</script>