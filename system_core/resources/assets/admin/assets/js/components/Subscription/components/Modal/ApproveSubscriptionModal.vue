<template>
    <div class="modal fade" id="approve-subscription-modal" role="dialog" aria-labelledby="modalLabelprimary">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white" id="modalLabelprimary">Deposit Requests</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to approve this subscription?
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn  btn-danger" data-dismiss="modal">No</button>
                    <button class="btn  btn-success" data-dismiss="modal" @click="approveSubscription">Yes</button>
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

            }
        },

        methods: {
            approveSubscription () {
                axios.post('/xhr/admin/subscriptions/' + this.subscription.id + '/approve')
                    .then(response => {
                        if(response.data.status === 'Active') {
                            this.flash('Subscription Approved successful!', 'success')
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