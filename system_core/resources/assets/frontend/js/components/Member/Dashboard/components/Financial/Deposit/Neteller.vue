<template>
    <div class="col-md-6 selected-payment-box">
        <div class="flex flex-column neteller-wrapper selected-box">
            <div class="mb-2">
                <span class="payment-title font-weight-bold text-capitalize"
                    >Neteller payment instruction</span
                >
            </div>
            <div class="mb-2">
                <span>
                    <i class="fas fa-check-circle"></i> Send your payment ({{
                        amount | currency
                    }}) to our Neteller email address through internal
                    transfer</span
                >
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
                <div>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Transition ID"
                        v-model="transactionId"
                    />

                    <!-- <small class="text-danger" v-text="transactionIdError"></small> -->
                </div>
            </div>
            <div class="d-flex mb-2">
                <div class="form-group mb-0">
                    <label
                        for="transactionScreenshot"
                        class="mb-0 font-weight-normal"
                    >
                        <i class="fas fa-check-circle"></i> Attach your
                        transaction screeshot</label
                    >

                    <input
                        type="file"
                        class="form-control-file pl-0"
                        id="transactionScreenshot"
                        style="font-size: 13px;"
                        @change="transactionScreenshot"
                        ref="screenshot"
                        accept="image/*"
                    />

                    <!-- <small class="text-danger" v-text="transactionScreenshotError"></small> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["amount"],
    data() {
        return {
            transactionId: ""

            // error: 0,
            // transactionIdError: '',
            // transactionScreenshotError: ''
        };
    },
    watch: {
        transactionId(value) {
            this.$emit("transactionId", this.transactionId);
        }
    },

    created() {
        EventBus.$on("clean-transaction-input", () => {
            this.transactionId = "";
            this.$refs.screenshot.files[0] = null;
        });
    },

    methods: {
        // resetError () {
        //     this.error = 0
        //     this.transactionIdError = ''
        //     this.transactionScreenshotError = ''
        // },
        // validate () {
        //     if (this.transactionId.length === 0) {
        //         this.transactionIdError = 'Please you transaction id'
        //         this.error++
        //     }

        //     if (this.$refs.screenshot.files.length === 0) {
        //         this.transactionScreenshotError = 'Please provide payment screenshot'
        //         this.error++
        //     }
        // },
        transactionScreenshot() {
            // console.log(this.$refs.screenshot.files[0])
            this.$emit("transactionScreenshot", this.$refs.screenshot.files[0]);
        }
    }
};
</script>
