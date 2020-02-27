<template>
    <div class="col-md-6 mb-4" @click="selected">
        <div :class="subscriptionWraperClass">
            <div class="amount-info" style="display: flex;justify-content: space-around;">
                <span v-text="data.name"></span>
                <div v-if="isFundManagement" class="amound" v-text="data.details[0].value"></div>
                <div v-else class="amount" v-text="data.price"></div>
                <!-- <div class="cross-amount" v-text="data.price"></div> -->
            </div>
            <div class="m-subscribe">
                <span class="border-bottom">{{ data.duration }} Subscription</span>
            </div>
            <div class="details-subscript">
                <p v-text="data.note"></p>

                <div class="form-group" v-if="displayInvestmentAmountField">
                    <label for="investment">Investment</label>
                    <input v-model="investment" type="number" class="form-control" placeholder="investment amount">
                    <small class="text-danger" v-text="investmentError"></small>
                    <small class="text-success">Security Deposit <b v-text="payableAmount"></b> ({{ data.settings.security_deposit}}% of the investment)</small>
                </div>

                
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            data: {
                type: Object,
                required: true
            },
            isFundManagement: {
                type: Boolean,
                required: true
            } 
        },
        data () {
            return {
                isSelected: false,
                lowerInvestmentAmount: 0,
                higherInvestmentAmount: 0,
                investment: 0,
                payableAmount: 0,

                errorCount: 0,
                investmentError: ''
            }
        },
        created () {
            if (this.isFundManagement) {
                this.lowerInvestmentAmount = this.investment = parseFloat(this.data.details[0].value.split('-')[0])
                this.higherInvestmentAmount = parseFloat(this.data.details[0].value.split('-')[1])
            }
        },
        computed: {
            displayInvestmentAmountField () {
                if (this.isFundManagement) {
                    let params = this.$route.path.split('/')
                    if (parseFloat(this.data.id) === parseFloat(params[params.length - 1])) {
                        return true
                    }
                }
                
                return false
            },
            // investment () {
            //     return parseFloat(this.data.details[0].value.split('-')[0])
            // },
            subscriptionWraperClass () {
                let params = this.$route.path.split('/')
                return parseFloat(this.data.id) === parseFloat(params[params.length - 1]) ? 'subscription-wrapper selected-box' : 'subscription-wrapper'
            }
        },
        mounted () {
            let params = this.$route.path.split('/')
            if (parseFloat(this.data.id) === parseFloat(params[params.length - 1])) {
                EventBus.$emit('selected-package', this.data)
            }
            
            // EventBus.$on('selected-package', payload => {
            //     this.selectedPackage = payload
            // })
        },
        watch: {
            '$route' (nr) {
                if (this.isFundManagement && this.payableAmount > 0) {
                    this.$emit('investments', { 'plan': this.data.id, 'amount': this.payableAmount, error: this.errorCount })
                }
            },

            investment() {
                if (this.isFundManagement) {
                    this.payableAmount = 0
                    this.resetError()
                    this.validate()
                    // this.investment

                    if (this.errorCount === 0 && parseFloat(this.investment) > 0) {
                        this.payableAmount = parseFloat(this.investment) / 100 * parseFloat(this.data.settings.security_deposit)
                    }
                
                    if (this.payableAmount > 0) {
                        this.$emit('investments', { 'plan': this.data.id, 'amount': this.payableAmount, error: this.errorCount })
                    }
                }
                
            }
        },  
        methods: {
            resetError () {
                this.errorCount = 0
                this.investmentError = ''
            },
            validate () {
                if (parseFloat(this.investment) < this.lowerInvestmentAmount) {
                    this.investmentError = 'Please set amount between ' + this.data.details[0].value
                    this.errorCount++
                }

                if (parseFloat(this.investment) > this.higherInvestmentAmount) {
                    this.investmentError = 'Please set amount between ' + this.data.details[0].value
                    this.errorCount++
                }
            },
            selected () {
                // if (this.isFundManagement) {
                //     if (this.payableAmount > 0) {
                //         this.$emit('investments', { 'plan': this.data.id, 'amount': this.payableAmount, error: this.errorCount })
                //     }
                // }

                EventBus.$emit('selected-package', this.data)
                // update url and make selected
                let params = this.$route.path.split('/')
                params.pop()
                params.push(this.data.id)
                this.$router.push(params.join('/'))
            }
        }
    }
</script>
<style lang="scss" scoped>
    .selected-box {
        background: #222;
        color: #fff;
    }
    .amount:before {
        content: '$'
    }
    .subscription-wrapper {
        height: 300px;
    }
</style>