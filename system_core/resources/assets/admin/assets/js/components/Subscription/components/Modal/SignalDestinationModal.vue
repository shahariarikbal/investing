<template>
    <div class="modal fade" id="signal-receiving-information-modal" role="dialog" aria-labelledby="signalReceivingInformationModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white" id="signalReceivingInformationModalLabel">Signal Destination</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="border-top: 1px solid #efefef;border-bottom: 1px solid #efefef;">
                        <div class="col"><b>Email: </b></div>
                        <div class="col">{{ destinaton.email }}</div>
                    </div>
                    <div class="row" style="border-bottom: 1px solid #efefef;">
                        <div class="col"><b>Contact Number: </b></div>
                        <div class="col">{{ destinaton.contact }}</div>
                    </div>
                    <div class="row" style="border-bottom: 1px solid #efefef;">
                        <div class="col"><b>Skype: </b></div>
                        <div class="col">{{ destinaton.skype }}</div>
                    </div>
                    <div class="row" style="border-bottom: 1px solid #efefef;">
                        <div class="col"><b>Telegram: </b></div>
                        <div class="col">{{ destinaton.telegram }}</div>
                    </div>
                    <div class="row" style="border-bottom: 1px solid #efefef;">
                        <div class="col"><b>WhatsApp: </b></div>
                        <div class="col">{{ destinaton.whatsapp }}</div>
                    </div>
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
        props: [ 'destinaton' ]
    }
</script>