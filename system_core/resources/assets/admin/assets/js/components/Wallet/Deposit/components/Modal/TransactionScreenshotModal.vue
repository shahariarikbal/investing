<template>
    <div class="modal fade" id="modal-16" role="dialog" aria-labelledby="modalLabelprimary">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="modalLabelprimary">Transaction Screenshot</h4>
                </div>
                <div class="modal-body">
                    <img v-if="screenshot.length > 0" style="width: 100%" :src="`${InvestingPartner.app_url}/storage/transaction/${screenshot}`" :alt="screenshot">
                </div>
                <div class="modal-footer">
                    <button class="btn  btn-primary" data-dismiss="modal">Close me!</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'screenshot' ],
        data () {
            return {

            }
        }
    }
</script>