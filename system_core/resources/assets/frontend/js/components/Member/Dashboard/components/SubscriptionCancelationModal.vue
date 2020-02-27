<template>
    <div class="modal fade" id="subscriptionCancelationModal" tabindex="-1" role="dialog" aria-labelledby="subscriptionCancelationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subscriptionCancelationModalLabel">Subscription Cancel Confirmation</h5>
                <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <p>If you confirm this diaglog results waiting for admin approval and will be canceled at the end of the subscription. You will get as same previlages as before till the end of the subscription and won't automatically chargered for further period. You can resume this service after end of subscription anytime prior to having available balance for renewal process.</p>
                <h5 class="text-danger text-center">Are you sure you want to Cancel?</h5>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <a type="button" class="btn btn-dark btn-sm text-white" data-dismiss="modal">No</a>
                <a type="button" class="btn btn-danger btn-sm text-white" data-dismiss="modal" @click="cancel">Yes I am</a>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            subscription: {
                type: Object,
                required: true
            }
        },
        methods: {
            cancel () {
                axios.post(`/api/subscriprion/${this.subscription.id}/request-cancel`)
                    .then(response => {
                        if (response.status === 200) {
                            this.flash(response.data.message, response.data.type)
                            EventBus.$emit('subscription-cancel-request', response.data.subscription)
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        }
    }
</script>