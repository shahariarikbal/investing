<template>
    <div class="flex flex-column mb-4 mt-4 neteller-wrapper selected-box pt-3 pl-3 pr-3 pb-1" v-if="balanceAvailable">
        <div class="mb-2">
            <span class="payment-title">Wallet payment</span>
        </div>
        <div class="mb-2">
            <span>You are going to subscribe {{ plan.duration }} {{ plan.name }} plan at the price of {{ payable }}</span>
        </div>
        <div class="mb-2">
            <span>Your remaining balance will be {{ remainingBalance }}</span>
        </div>
        
        <div class="form-group text-center">
            <button 
                type="submit" 
                class="btn btn-dark btn-modern btn-outline rounded-0 py-2 px-4"
                @click="subscribe">Payment & Subscribe</button>
        </div>
    </div>

    <div class="flex flex-column mb-4 mt-4 neteller-wrapper selected-box pt-3 pl-3 pr-3 pb-1" v-else>
        <div class="mb-2">
            <span class="payment-title">Wallet payment</span>
        </div>
        <div class="mb-2">
            <span>You can not subscribe to "{{ plan.duration }} {{ plan.name }}" plan at the price of {{ payable }}</span>
        </div>
        <div class="mb-2">
            <span>Your available balance is be {{ walletAmountDisplay }}</span>
        </div>
        <div class="mb-2">
            <span>Please chose another payment option. Thank you</span>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'plan', 'amount', 'walletAmount' ],
        data () {
            return {
                payable: '$' + parseFloat(this.amount).toFixed(2),
                walletAmountDisplay: '$' + parseFloat(this.walletAmount).toFixed(2)
            }
        },
        computed: {
            balanceAvailable () {
                return parseFloat(this.walletAmount) >= parseFloat(this.amount)
            },
            remainingBalance () {
                return '$' + (parseFloat(this.walletAmount) - parseFloat(this.amount)).toFixed(2)
            }
        },
        methods: {
            subscribe () {
                let data = {
                    'method': 'wallet',
                    'transaction_id': '',
                    'screenshot': ''
                }
                this.$emit('payment', data);
            }
        }
    }
</script>