<template>
    <div class="modal fade" id="withdrawCancelationModal" tabindex="-1" role="dialog" aria-labelledby="withdrawCancelationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="withdrawCancelationModalLabel">Withdraw Cancel Confirmation</h5>
                <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                Are you sure you want to Cancel?
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
            withdraw: {
                type: Object,
                required: true
            }
        },
        methods: {
            cancel () {
                axios.post("/api/member/financial/withdraws/"+this.withdraw.id+"/cancel")
                    .then(response => {
                        if (response.status === 200) {
                            this.flash(response.data.message, response.data.type)
                            EventBus.$emit('withdraw-request-canceled', response.data.withdraw)
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        }
    }
</script>