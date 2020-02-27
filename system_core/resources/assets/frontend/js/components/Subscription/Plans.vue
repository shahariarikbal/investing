<template>
    <div class="row">
        <div class="d-flex justify-content-center col-md-12">
            <div class="first-step second-step">
                <div class="d-flex justify-content-end">
                    <div style="margin-right: 5px;">
                        <small>Show price in:</small>
                    </div>
                    <div>
                        <select class="form-control form-control-sm" id="">
                            <option value="USD">USD</option>
                            <option value="AUD">AUD</option>
                            <option value="BRL">BRL</option>
                            <option value="BTC">BTC</option>
                            <option value="CAD">CAD</option>
                            <option value="CHF">CHF</option>
                            <option value="CNY">CNY</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                            <option value="INR">INR</option>
                            <option value="HKD">HKD</option>
                            <option value="JPY">JPY</option>
                            <option value="NZD">NZD</option>
                            <option value="SEK">SEK</option>
                            <option value="SGD">SGD</option>
                            <option value="ZAR">ZAR</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-column mb-4 mt-4">
                    <div>
                        <span class="step-title">STEP 3</span>
                    </div>
                    <div>
                        <span class="text-justify d-block">We've made our signals affordable for almost any Forex trader and we believe you will be completely satisfied with our service. If for any reason you are not satisfied, you can cancel your subscription at any time.</span>
                    </div>
                </div>
                <div class="row" v-if="plans.length > 0">
                    <plan 
                        v-for="(plan, index) in plans" 
                        v-bind:key="index" 
                        @investments="investments"
                        :data="plan" 
                        :isFundManagement="isFundManagement" />
                </div>
                <div class="d-flex justify-content-end mb-4">
                    <span class="notes">Subscriptions can be cancelled at any time.</span>
                </div>
                <div class="form-group text-center d-flex justify-content-center align-items-center">
                    <button class="btn btn-dark btn-back" @click="back">BACK</button>
                    <button type="button" class="btn btn-dark btn-modern btn-outline rounded-0 py-2 px-4 btn-continue" @click="next">CONTINUE</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import plan from './Plan'

    export default {
        props: [ 'plans' ],
        data () {
            return {
                isFundManagement: false,
                payableAmount: 0
            }
        },
        watch: {
            
        },
        components: { plan },
        created () {
            if (location.href.split('/')[location.href.split('/').length - 2] === 'fund-management') {
                this.isFundManagement = true
            }
        },
        methods: {
            back () {
                this.$emit('back')
            },
            next () {
                this.$emit('next', this.payableAmount)
            },
            investments (payload) {
                if (this.isFundManagement) {
                    let current_plan = parseFloat(location.href.split('/')[location.href.split('/').length - 1])
                    
                    if (payload.plan === current_plan) {
             
                        if (payload.error === 0) {
                            this.payableAmount = payload.amount
                        }
                    }
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    .cross-amount:before {
        content: '$'
    }
</style>