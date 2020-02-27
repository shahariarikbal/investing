<template>
    <div class="flex flex-column mb-4 mt-4 neteller-wrapper selected-box pt-3 pl-3 pr-3 pb-1">
        <div class="mb-2">
            <span class="payment-title">Neteller payment instruction</span>
        </div>
        <div class="mb-2">
            <span> <i class="fas fa-check-circle"></i> Send your payment (${{ payable }}) st our Neteller email address through internal transfer</span>
        </div>
        <div class="d-flex mb-2">
            <div>
                <span><b>Our Neteller Email:</b></span>
            </div>
            <div class="ml-2">
                <span><em>example@gmail.com</em></span>
            </div>
            <div class="ml-2">
                <span class="pointer text-info">copy</span>
            </div>
        </div>
        <div class="mb-2">
            <span> <i class="fas fa-check-circle"></i> Copy & Paste your payment transaction ID</span>
        </div>
        <div class="d-flex mb-2">
            <div>
                <input
                    type="text"
                    class="form-control"
                    placeholder="Transaction ID"
                    v-model="transactionId">

                <small class="text-danger" v-text="transactionIdError"></small>
            </div>
        </div>
        <div class="d-flex mb-2">
            <div class="form-group mb-0">
                <label for="transactionScreenshot" class="mb-0 font-weight-normal"> <i class="fas fa-check-circle"></i> Attach your transaction screeshot</label>
                
                <input
                    type="file"
                    class="form-control-file pl-0"
                    id="transactionScreenshot"
                    style="font-size: 13px;"
                    ref="screenshot"
                    accept="image/*" >
                
                <small class="text-danger" v-text="transactionScreenshotError"></small>
            </div>
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
        props: [ 'amount' ],
        data () {
            return {
                payable: this.amount,

                transactionId: '',
                screenshot: '',

                error: 0,
                transactionIdError: '',
                transactionScreenshotError: ''
            }
        },
        methods: {
            resetError () {
                this.error = 0
                this.transactionIdError = ''
                this.transactionScreenshotError = ''
            },
            validate () {
                if (this.transactionId.length === 0) {
                    this.transactionIdError = 'Please you transaction id'
                    this.error++
                }

                if (this.$refs.screenshot.files.length === 0) {
                    this.transactionScreenshotError = 'Please provide payment screenshot'
                    this.error++
                }
            },
            subscribe () {
                this.resetError()
                this.validate()

                // let file = this.$refs.screenshot.files[0]

                // let reader = new FileReader()
                // console.log(reader.readAsDataURL( file ))
                if (this.error === 0) {
                    let data = {
                        'method': 'neteller',
                        'transaction_id': this.transactionId,
                        'screenshot': this.$refs.screenshot.files[0]
                    }
                    this.$emit('payment', data);
                }
                
            }
        }
    }
</script>