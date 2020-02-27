<template>
    <div class="flex flex-column mb-4 mt-4 neteller-wrapper selected-box pt-3 pl-3 pr-3 pb-1">
        <div class="mb-2">
            <span class="payment-title">Paypal payment instruction</span>
        </div>
        <div class="mb-2">
            <span> <b>Amount: </b> {{ payable }} </span> <br />
            <span> <b>Processing Fees : </b> {{ process_fee }} </span><br />
            <span> <b>Total : </b> {{ total }} </span>
        </div>

        <div class="form-group text-center">
            <button 
                type="submit" 
                class="btn btn-dark btn-modern btn-outline rounded-0 py-2 px-4"
                @click="subscribe">Payment & Subscribe</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'amount', 'plan' ],
        data () {
            return {
                payable: this.amount,
                process_fee: 0.00,
                total: 0.0,
            }
        },
        created() {
   
            var fee = 0

            let v = parseFloat(this.payable)
            if (typeof v !== 'number' || v < 1) return 1
            fee = 0.3+0.023*v

            // if (this.paymentMethod === 'perfect-money') {
            //     let v = parseFloat(this.amount)
            //     fee = 0.02*v
            // }
            
            this.process_fee = fee.toFixed(2)
        
            this.total = parseFloat(fee + v).toFixed(2)
           
        },
        methods: {
            subscribe () {
                let data = {
                    'method': 'paypal',
                    'process_fee': this.process_fee,
                    'total': this.total
                }
                this.$emit('payment', data);
            }
        }
    }
</script>