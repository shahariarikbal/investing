<template>
    <div class="modal fade" id="meta-trader-information-modal" role="dialog" aria-labelledby="signalReceivingInformationModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white" id="signalReceivingInformationModalLabel">Signal Destination</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="border-top: 1px solid #efefef;border-bottom: 1px solid #efefef;">
                        <div class="col"><b>Platform: </b></div>
                        <div class="col">{{ account.platform_type }}</div>
                    </div>
                    <div class="row" style="border-bottom: 1px solid #efefef;">
                        <div class="col"><b>Account Number: </b></div>
                        <div class="col">{{ account.account_number }}</div>
                    </div>
                    <div class="row" style="border-bottom: 1px solid #efefef;">
                        <div class="col"><b>Password: </b></div>
                        <div class="col">{{ account.password }}</div>
                    </div>
                    <div class="row" style="border-bottom: 1px solid #efefef;">
                        <div class="col"><b>Broker: </b></div>
                        <div class="col">{{ account.broker_name }}</div>
                    </div>
                    <div class="row" style="border-bottom: 1px solid #efefef;">
                        <div class="col"><b>Broker Server Name: </b></div>
                        <div class="col">{{ account.broker_server_name }}</div>
                    </div>
                    <div class="row" style="border-bottom: 1px solid #efefef;">
                        <div class="col"><b>Risk preferance: </b></div>
                        <div class="col">{{ account.risk_preferance }}</div>
                    </div>
                    <div class="row" style="border-bottom: 1px solid #efefef;">
                        <div class="col"><b>Comment: </b></div>
                        <div class="col">{{ account.comment }}</div>
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
        props: [ 'account' ]
    }
</script>