<template>
    <div class="diposit-page">
        <div class="row">
            <div class="col-md-12">
                <div class="payment-title">
                    <h3>Select Payment Method</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="payment-wrapper-box">
                    <div class="payment-box active-box">
                        <div class="form-row title-bar">
                            <div class="form-group col-md-6">
                                <div class="custom-control custom-radio">
                                    <input
                                        id="customRadio1"
                                        type="radio"
                                        name="customRadio"
                                        class="custom-control-input"
                                        checked
                                    >
                                    <label
                                        class="custom-control-label font-weight-bold"
                                        for="customRadio1"
                                    > Credit or Debit Card </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="float-right"> All major cards accepted </label>
                            </div>
                        </div>
                        <div class="clickable-show-wrapper">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="cardNumber">Card Number:</label>
                                    <input
                                        id="cardNumber"
                                        type="text"
                                        class="form-control"
                                    >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="expiryDate">Expiry date:</label>
                                    <input
                                        id="expiryDate"
                                        type="text"
                                        class="form-control"
                                    >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="cardHolderName">Cardholder Name:</label>
                                    <input
                                        id="cardHolderName"
                                        type="text"
                                        class="form-control"
                                    >
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="d-flex justify-content-between">
                                        <label for="ccv">CCV/CVV:</label>
                                        <label
                                            tabindex="0"
                                            data-toggle="tooltip"
                                            title="The last 3 digits displayed on the back of ypur card"
                                        >
                                            <i class="fas fa-question-circle text-muted mr-2" />
                                        </label>
                                    </div>
                                    <input
                                        id="ccv"
                                        type="text"
                                        class="form-control"
                                    >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <img
                                        src="https://www.f-cdn.com/assets/main/en/assets/payments/cc/visa.svg"
                                        alt="visa"
                                    >
                                    <img
                                        src="https://www.f-cdn.com/assets/main/en/assets/payments/cc/mastercard.svg"
                                        alt="mastercard"
                                    >
                                    <img
                                        src="https://www.f-cdn.com/assets/main/en/assets/payments/cc/amex.svg"
                                        alt="amex"
                                    >
                                    <img
                                        src="https://www.f-cdn.com/assets/main/en/assets/payments/cc/jcb.svg"
                                        alt="jcb"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        v-for="m in methods"
                        :key="m.name"
                        class="payment-box"
                        :class="{'active-box': $route.params.method === m.class}"
                        @click="changeMethod(m.class)"
                    >
                        <div class="form-row title-bar">
                            <div class="form-group col-md-6">
                                <div class="custom-control custom-radio">
                                     {{ m.name }}
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="float-right">
                                    <img
                                        :src="m.icon"
                                        width="80"
                                        height="25"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="showall-box">
                        <div class="form-row title-bar">
                            <div class="form-group col-md-6">
                                <label>  Show All Payment Options  </label>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="float-right">
                                    <i class="fas fa-chevron-down" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                
                class="col-md-6 "
            >
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>

import mixin from './mixin'

export default {
    mixins: [mixin],
    data () {
        return {
            selectedMethod: {}
        }
    },
    computed: {

    },
    created () {
        if (this.$route.name !== 'deposit-method') {
            this.$router.push({
                name: 'deposit-method',
                params: {
                    method: this.methods[0].class
                }
            })
        }
        
    },
    methods: {
        changeMethod(name) {
            this.$router.push({
                name: 'deposit-method',
                params: {
                    method: name
                }
            })
        }
    }
}
</script>
<style lang="scss">
.diposit-page {
    .method-list {
        .card {
            border: none;
            justify-content: center;
            align-items: center;
            img {
                width: 120px;
            }
        }
    }
}
</style>
