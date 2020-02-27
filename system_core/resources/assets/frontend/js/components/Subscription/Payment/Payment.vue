<template>
    <div class="row">
        <div class="d-flex justify-content-center col-md-12">
            <div class="first-step second-step">
                <div class="flex flex-column mb-4 mt-4">
                    <div class="d-flex justify-content-between">
                        <span class="step-title">STEP 5</span>
                        <span><i class="fas fa-unlock-alt fa-2x text-muted"></i></span>
                    </div>
                    <div>
                        <span>Select a secure payment method.</span>
                    </div>
                </div>
                <div class="flex flex-column mb-4 mt-4">
                    <div class="custom-control custom-radio d-flex mb-2">
                        <div class="mr-3">
                            <input type="radio" id="paypal" name="paymentOption" class="custom-control-input" value="paypal" v-model="paymentOption">
                            <label class="custom-control-label" for="paypal">PayPal</label>
                        </div>
                        <div>
                            <span class="pointer mr-2"><i class="fab fa-cc-paypal fa-2x"></i></span>
                        </div>
                    </div>
                    <div class="custom-control custom-radio d-flex mb-2">
                        <div class="mr-3">
                            <input type="radio" id="credit-card" name="paymentOption" class="custom-control-input" value="credit-card" v-model="paymentOption">
                            <label class="custom-control-label" for="credit-card">Credit Card</label>
                        </div>
                        <div>
                            <span class="pointer mr-2"><i class="fab fa-cc-visa fa-2x"></i></span>
                            <span class="pointer  mr-1"><i class="fab fa-cc-mastercard fa-2x"></i></span>
                            <span class="pointer  mr-1"><i class="fab fa-cc-amex fa-2x"></i></span>
                            <span class="pointer  mr-1"><i class="fab fa-cc-discover fa-2x"></i></span>
                        </div>
                    </div>
                    <div class="custom-control custom-radio d-flex mb-2">
                        <div class="mr-3">
                            <input type="radio" id="perfect-money" name="paymentOption" class="custom-control-input" value="perfect-money" v-model="paymentOption">
                            <label class="custom-control-label" for="perfect-money">Perfect Money</label>
                        </div>
                        <div>
                            <span class="pointer mr-2"><img :src="`${InvestingPartner.app_url}/assets/images/payment/perfect-money.png`" class="border" width="56"  alt="visa"></span>
                        </div>
                    </div>
                    <div class="custom-control custom-radio d-flex mb-2">
                        <div class="mr-3">
                            <input type="radio" id="neteller" name="paymentOption" class="custom-control-input" value="neteller" v-model="paymentOption">
                            <label class="custom-control-label" for="neteller">Neteller</label>
                        </div>
                        <div>
                            <span class="pointer mr-2"><img :src="`${InvestingPartner.app_url}/assets/images/payment/neteller.png`" class="border" width="56" alt="visa"></span>
                        </div>
                    </div>
                    <div class="custom-control custom-radio d-flex mb-2">
                        <div class="mr-3">
                            <input type="radio" id="skrill" name="paymentOption" class="custom-control-input" value="skrill" v-model="paymentOption">
                            <label class="custom-control-label" for="skrill">Skrill</label>
                        </div>
                        <div>
                            <span class="pointer mr-2"><img :src="`${InvestingPartner.app_url}/assets/images/payment/skrill.png`" class="border" width="56" alt="visa"></span>
                        </div>
                    </div>
                    <div class="custom-control custom-radio d-flex mb-2">
                        <div class="mr-3">
                            <input type="radio" id="bitcoin" name="paymentOption" class="custom-control-input" value="bitcoin" v-model="paymentOption">
                            <label class="custom-control-label" for="bitcoin">Bitcoin</label>
                        </div>
                        <div>
                            <span class="pointer mr-2"><i class="fab fa-bitcoin fa-2x"></i></span>
                        </div>
                    </div>
                    <div class="custom-control custom-radio d-flex mb-2">
                        <div class="mr-3">
                            <input type="radio" id="wallet" name="paymentOption" class="custom-control-input" value="wallet" v-model="paymentOption">
                            <label class="custom-control-label" for="wallet">Wallet</label>
                        </div>
                        <div>
                            <span class="pointer mr-2" v-text="walletAmountDisplay"></span>
                        </div>
                    </div>
                </div>

                <paypal-payment
                    v-if="paymentOption === 'paypal'"
                    :plan="plan"
                    :amount="totalPrice"
                    @payment="payment" />

                <neteller-payment
                    v-if="paymentOption === 'neteller'"
                    :amount="totalPrice"
                    @payment="payment" />

                <skrill-payment
                    v-if="paymentOption === 'skrill'"
                    :amount="totalPrice"
                    @payment="payment" />

                <wallet-payment
                    v-if="paymentOption === 'wallet'"
                    :plan="plan"
                    :amount="totalPrice"
                    :walletAmount="walletAmount"
                    @payment="payment" />
                
                <!-- <div class="form-group text-center">
                    <button type="submit" class="btn btn-dark btn-modern btn-outline rounded-0 py-2 px-4">submit</button>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
    import PaypalPayment from './PaypalPayment'
    import NetellerPayment from './NetellerPayment'
    import SkrillPayment from './SkrillPayment'
    import WalletPayment from './WalletPayment'

    export default {
        props: [ 'plan', 'payableAmount' ],
        data () {
            return {
                paymentOption: 'paypal',
                walletAmount: 0,
                walletAmountDisplay: '$' + parseFloat(0).toFixed(2)
            }
        },
        components: { PaypalPayment, NetellerPayment, SkrillPayment, WalletPayment },
        computed: {
            totalPrice () {
                return parseFloat(this.payableAmount)
            }
        },
        created () {
            axios.post('/api/wallet/available-balance')
                .then(response => {
                    this.walletAmount = response.data
                    this.walletAmountDisplay = '$' + parseFloat(response.data).toFixed(2)
                })
                .catch(error => {
                    console.log(error)
                })
        },
        methods: {
            payment(payload) {
                this.$emit('payment', payload)
            }
        }
    }
</script>