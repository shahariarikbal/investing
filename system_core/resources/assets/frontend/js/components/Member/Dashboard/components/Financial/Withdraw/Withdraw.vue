<template>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" id="seconddiv">
        <Form :balance="balance" />
        <withdraw-history />
        <div class="mb-2 drop-shadow payment">
            <div class="row">
                <div class="col-md-6">
                    <faq />
                </div>
                <div class="col-md-6">
                    <div class="money-pie-chart">
                        <iframe
                            class="chartjs-hidden-iframe"
                            tabindex="-1"
                            style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"
                        ></iframe>
                        <canvas
                            id="myChart"
                            width="399"
                            height="199"
                            style="display: block; width: 399px; height: 199px;"
                        ></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import WithdrawHistory from "./History.vue";
import Faq from "./Faq.vue";
import Form from "./Form"

export default {
    components: {
        WithdrawHistory,
        Faq,
        Form
    },
    data (){
        return {
            balance: 0,
        }
    },
    created() {
        this.availableBalance()
    },
    methods: {
        availableBalance () {
            axios.post(`/api/wallet/available-balance`)
                .then(res=> {
                    this.balance = res.data;
                })
        }
    }
};
</script>
<style lang="scss">
.transaction-entry-field {
    background: #f1f1f1bf;
    padding: 5px 10px;
    border-radius: 4px;
    margin: 1rem 0;
    text-transform: capitalize;
    font-size: 14px;
    color: #191818;
}
.transaction-entry-field .form-control {
    display: block;
    width: 100%;
    height: calc(1.6em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 0.9rem;
    font-weight: 400;
    line-height: 1.6;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    -moz-appearance: button;
    -webkit-appearance: button;
}
</style>
<style>
.vue-daterange-picker .reportrange-text i,
.vue-daterange-picker .reportrange-text span {
    vertical-align: sub;
}
</style>
