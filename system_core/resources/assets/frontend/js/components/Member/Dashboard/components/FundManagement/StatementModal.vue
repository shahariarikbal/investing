<template>
    <div class="modal show" style="display: block;background: #000000cc;" id="statementModal" tabindex="-1" role="dialog" aria-labelledby="statementModalLabel" aria-hidden="true">
        <div style="top: 50px; width: 600px" id="statement-modal-dialog" class="modal-dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row" style="position: relative" id="statement-modal">
                        <div id="loading" style="display: none">
                            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
                        </div>
                        <div class="col-lg-12">
                            <iframe :src="attachmentUrl" style="width:100%; height: 600px" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            attachment: {
                type: String,
                required: true
            }
        },
        date () {
            return {
                
            }
        },
        computed: {
            attachmentUrl() {
                return InvestingPartner.app_url + "/storage/monthly-trade-statement/" + this.attachment
            }
        },
        mounted () {
            document.getElementById('statementModal').addEventListener('click', function(e){
                if (document.getElementById('statement-modal-dialog').contains(e.target) === false) {
                    EventBus.$emit('statementModalDisplay', false)
                }
            })
        }
    }
</script>