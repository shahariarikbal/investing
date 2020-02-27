<template>
    <div class="modal fade show" style="display: block" id="attachment-fund-management-monthly-trade-statement-modal" role="dialog" aria-labelledby="attachment-fund-management-monthly-trade-statement-modal">
        
        <div class="modal-dialog modal-xl" style="position: relative;" id="attachment-fund-management-monthly-trade-statement-modal-dialog" role="document">
            <div id="loading" style="display: none">
                <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
            </div>
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white">Fund Management Monthly Trade Statement Attachment</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <iframe :src="attachmentUrl" style="width:100%; height: 600px;" frameborder="0"></iframe>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-danger" data-dismiss="modal" @click="close">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                attachment: []
            }
        },
        created () {
            axios.get(`/admin/monthly-trade-statement-attachment/${this.$route.params.id}`)
                .then(response => {
                    console.log(response)
                    this.attachment = response.data.attachment
                })
                .catch(error => {
                    console.log(error)
                })
        },
        computed: {
            attachmentUrl() {
                return InvestingPartner.app_url + `/storage/monthly-trade-statement/${this.attachment}`
            }
        },

        methods: {
            close () {
                this.$router.push({ name: 'fund-management-monthly-trade-statement' })
            },
        }
    }
</script>