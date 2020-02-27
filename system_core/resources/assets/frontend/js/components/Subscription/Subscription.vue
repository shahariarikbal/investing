<template>
    <div class="container" id="subscription-form" style="position: relative">
        <div v-if="isAdmin" class="alert alert-warning text-center" role="alert">
            This page is designed for guest and member only. You are currently logged in as admin.
        </div>
        <div id="subscription-from-loading" style="display: none">
            <i
                class="fa fa-spinner fa-pulse fa-5x fa-fw"
                aria-hidden="true"
            ></i>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center col-md-12">
                <div class="step-number">
                    <div class="listing-wrapper" @click="goToStepOne">
                        <span :class="termsStepClass">1</span>
                        <span class="text-dark m-right-4">Terms</span>
                    </div>
                    <div class="listing-wrapper" @click="goToStepTwo">
                        <span :class="authStepClass">2</span>
                        <span class="text-dark">Authentication</span>
                    </div>
                    <div class="listing-wrapper" @click="goToStepThree">
                        <span :class="planStepClass">3</span>
                        <span class="text-dark m-left-3">Plan</span>
                    </div>
                    <div class="listing-wrapper" @click="goToStepFour">
                        <span :class="informationStepClass">4</span>
                        <span class="text-dark m-left-2">Information</span>
                    </div>
                    <div class="listing-wrapper">
                        <span :class="paymentStepClass">5</span>
                        <span class="text-dark">Payment</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- <payment :plan="packageToBeSubscribe" /> -->

        <terms-conditions
            v-if="step === 1"
            @accepted="accepted" />

        <authentication
            v-else-if="step === 2"
            @continue="authContinue" />
        
        <plans
            v-else-if="step === 3"
            :plans="plans"
            @back="step = 2"
            @next="confirmPlan" />

        <receiving-information
            v-else-if="step === 4 && isSignalService"
            @back="step = 3"
            @next="receivingInformationContinue" />

        <meta-trader-information
            v-else-if="step === 4 && !isSignalService"
            @back="step = 3"
            @next="metaTraderInformationContinue" />

        <payment
            v-else-if="step === 5"
            :plan="packageToBeSubscribe"
            :payableAmount="payableAmount"
            @payment="paymentContinue" />

        <alert-modal v-if="displayAlertMessage" :message="alertMessage" />
        
    </div>
</template>

<script>
    import TermsConditions from './TermsConditions.vue'
    import Authentication from './Authentication.vue'
    import Plans from './Plans.vue'
    import Payment from './Payment/Payment'
    import ReceivingInformation from './ReceivingInformation.vue'
    import MetaTraderInformation from './MetaTraderInformation.vue'

    import AlertModal from './../Member/Auth/AlertModal'

    export default {
        props: [ 'plans' ],
        data () {
            return {
                step: 1,
                termsAccepted: false,
                authenticationContinue: false,
                packageConfirmed: false,
                selectedPackage: null,
                packageToBeSubscribe: null,
                metaTraderInformation: null,
                signalReceivingInformation: null,
                paymentInformation: null,

                isSignalService: false,
                payableAmount: 0,

                isFundManagement: false,
                subscriptionId: null,

                displayAlertMessage: false,
                alertMessage: {
                    type: '',
                    text: ''
                }
            }
        },
        components: {
            TermsConditions, Authentication, Plans, Payment, ReceivingInformation, MetaTraderInformation, AlertModal
        },
        computed: {
            isAdmin () {
                return InvestingPartner.admin ? true : false
            },
            termsStepClass () {
                if (this.step === 1) {
                    return 'number active m-right-4'
                }
                if (this.step > 1) {
                    return 'number check-active m-right-4'
                }
            },
            authStepClass () {
                if (this.step === 2) {
                    return 'number active'
                }
                if (this.step > 2) {
                    return 'number check-active'
                }
                return 'number'
            },
            planStepClass () {
                if (this.step === 3) {
                    return 'number active m-left-3'
                }
                if (this.step > 3) {
                    return 'number check-active m-left-3'
                }
                return 'number m-left-3'
            },
            informationStepClass () {
                if (this.step === 4) {
                    return 'number active m-left-2'
                }
                if (this.step > 4) {
                    return 'number check-active m-left-2'
                }
                return 'number m-left-2'
            },
            paymentStepClass () {
                if (this.step === 5) {
                    return 'number active'
                }
                return 'number'
            }
        }, 
        created () {
            let params = this.$route.path.split('/')
            this.selectedPackage = params[params.length - 1]
       
            if (location.href.split('/')[location.href.split('/').length - 2] === 'fund-management') {
                this.isFundManagement = true
            }

            EventBus.$on('selected-package', payload => {
                if (location.href.split('/')[location.href.split('/').length - 2] !== 'fund-management') {
                    this.payableAmount = parseFloat(payload.price)
                }

                this.selectedPackage = payload.id
                this.packageToBeSubscribe = payload
            })
        },
        watch: {
            packageToBeSubscribe() {
                this.isSignalService = this.packageToBeSubscribe.service.replace('App\\', '').toLowerCase() === 'signal'
            }
        },
        methods: {
            goToStepOne () {
                this.step = 1
            },
            goToStepTwo () {
                if (this.termsAccepted) this.step = 2
            },
            goToStepThree () {
                if (this.authenticationContinue) this.step = 3
            },
            goToStepFour () {
                if (this.packageConfirmed) this.step = 4
            },
            accepted () {
                this.termsAccepted = true
                this.step++
            },
            authContinue () {
                this.authenticationContinue = true
                this.step++
            },
            confirmPlan (payload) {
                if (this.isFundManagement) {
                    this.payableAmount = payload
                }
                this.step = 4
                this.packageConfirmed = true
            },
            metaTraderInformationContinue (payload) {
                
                this.metaTraderInformation = payload
                this.subscribe()
            },
            receivingInformationContinue (payload) {
             
                this.signalReceivingInformation = payload
                this.subscribe()
            },
            paymentContinue (payload) {
                this.paymentInformation = payload
                this.$nextTick(() => {
                    this.payment()
                });
            },

            subscribe() {
                let formData = new FormData()

                formData.append('plan', this.selectedPackage)
                formData.append('transaction_amount', this.payableAmount)

                if (this.metaTraderInformation) {
                    formData.append('meta_trader_platform_type', this.metaTraderInformation.platform_type)
                    formData.append('meta_trader_account_number', this.metaTraderInformation.account_number)
                    formData.append('meta_trader_password', this.metaTraderInformation.password)
                    formData.append('meta_trader_broker', this.metaTraderInformation.broker)
                    formData.append('meta_trader_broker_name', this.metaTraderInformation.broker_name)
                    formData.append('meta_trader_broker_server_name', this.metaTraderInformation.broker_server_name)
                    formData.append('meta_trader_comment', this.metaTraderInformation.user_comment)
                    formData.append('meta_trader_risk_preferance', this.metaTraderInformation.risk_preferance)
                    formData.append('meta_trader_comment', this.metaTraderInformation.user_comment)
                }

                if (this.signalReceivingInformation) {
                    formData.append('signal_receiving_contact', this.signalReceivingInformation.contact)
                    formData.append('signal_receiving_email', this.signalReceivingInformation.email)
                    formData.append('signal_receiving_skype', this.signalReceivingInformation.skype)
                    formData.append('signal_receiving_telegram', this.signalReceivingInformation.telegram)
                    formData.append('signal_receiving_whatsapp', this.signalReceivingInformation.whatsapp)
                }
                

                axios.post('/api/subscribe', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(response => {
                        if(response.status === 201) {
                            this.step = 5
                            this.subscriptionId = response.data.id
                            // alert(response.data.message)
                            // window.location = InvestingPartner.app_url + '/member/dashboard/' + location.href.split('/')[location.href.split('/').length - 2]
                        }
                        console.log(response.data)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            payment () {
                let formData = new FormData()

                formData.append('transaction_amount', this.payableAmount)
                formData.append('transaction_method', this.paymentInformation.method)
                if (this.paymentInformation.method === 'paypal' || this.paymentInformation.method === 'perfect-money') {
                    formData.append('process_fee', this.paymentInformation.process_fee)
                } else {
                    formData.append('transaction_id', this.paymentInformation.transaction_id)
                    formData.append('transaction_screenshot', this.paymentInformation.screenshot)
                }

                let height = parseInt(document.getElementById("subscription-form").offsetHeight);
                let padding = (height - 40) / 2;
                let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`;
                document.getElementById("subscription-from-loading").setAttribute("style", loadingStyle);

                axios.post(`/api/subscriprion/${this.subscriptionId}/payment`, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(response => {
                        if(response.status === 200) {
                            document.getElementById("subscription-from-loading").setAttribute("style", "display: none");

                            var res = response.data;
                            if (typeof res.form !== "undefined") {
                                this.generateForm(res.form);
                            } else if (typeof res.redirect !== "undefined") {
                                location.replace(res.redirect);
                            } else if (typeof res.notify !== "undefined") {
                                
                                if (this.paymentInformation.method === 'neteller' || this.paymentInformation.method === 'skrill') {
                                    this.alertMessage.text = "Your subscription and payment request has been received and waiting for admin approval. Thank you."
                                }
                                this.alertMessage.type = "success"
                                
                                this.displayAlertMessage = true
                                _.delay(function () {
                                    location.href = InvestingPartner.app_url + '/member/dashboard'
                                }, 3000)
                            } else if (res.id === this.subscriptionId) {
                                if (this.paymentInformation.method === 'wallet') {
                                    this.alertMessage.text = "Your subscription and payment request has been received and approved. Thank you."
                                }
                                this.alertMessage.type = "success"
                                this.displayAlertMessage = true
                                _.delay(function () {
                                    location.href = InvestingPartner.app_url + '/member/dashboard'
                                }, 3000)
                            }
                            
                            console.log(response.data)
                            
                            // alert(response.data.message)
                            // window.location = InvestingPartner.app_url + '/member/dashboard/' + location.href.split('/')[location.href.split('/').length - 2]
                        }
                        console.log(response.data)
                    })
                    .catch(error => {
                        document.getElementById("deposit-from-loading").setAttribute("style", "display: none");
                        console.log(error)
                    })
            }
        }
    }
</script>