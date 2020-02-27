<template>
    <div class="row">
        <div class="d-flex justify-content-center col-md-12">
            <div class="first-step">
                <div class="flex flex-column mb-4 mt-4">
                    <div>
                        <span class="step-title">STEP 4</span>
                    </div>
                    <div>
                        <span>Please provide your meta trader informations</span>
                    </div>
                </div>
                <div class="form">
                    <div class="form-group">
                        <label>Platform Type <small>*</small></label>
                        <select class="form-control" v-model="platform_type">
                            <option value="">Select a platform</option>
                            <option v-for="(type, index) in platforms" :key="index" :value="type.value" v-text="type.label"></option>
                        </select>
                        <small class="text-danger" v-text="platformTypeError"></small>
                    </div>

                    <div class="form-group">
                        <label>Broker <small>*</small></label>
                        <select class="form-control" v-model="broker">
                            <option value="">Select a Broker</option>
                            <option v-for="(broker, index) in brokers" :key="index" :value="broker.id" v-text="broker.name">Select a Broker</option>
                            <option value="other">Other</option>
                        </select>
                        <small class="text-danger" v-text="brokerError"></small>
                    </div>

                    <div class="form-group" v-if="isOtherBroker">
                        <label>Broker Name <small>*</small></label>
                        <input type="text" class="form-control" v-model="broker_name" placeholder="Broker name">
                        <small class="text-danger" v-text="brokerNameError"></small>
                    </div>

                    <div class="form-group">
                        <label>Account Number <small>*</small></label>
                        <input type="tel" class="form-control" v-model="account_number" placeholder="Account number">
                        <small class="text-danger" v-text="accountNumberError"></small>
                    </div>

                    <div class="form-group">
                        <label>Account Password <small>*</small></label>
                        <input type="password" class="form-control" v-model="password" placeholder="Account password">
                        <small class="text-danger" v-text="passwordError"></small>
                    </div>

                    <div class="form-group">
                        <label>Broker Server Name <small>*</small></label>
                        <input type="tel" class="form-control" v-model="broker_server_name" placeholder="Broker server name">
                        <small class="text-danger" v-text="brokerServerNameError"></small>
                    </div>

                    <div class="form-group">
                        <label>Risk Preference <small>(optional)</small></label>
                        <select class="form-control" v-model="risk_preferance">
                            <option value="">Select risk preferance</option>
                            <option v-for="(preferance, index) in risk_preferances" :key="index" :value="preferance.value" v-text="preferance.label"></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>User Comment <small>(optional)</small></label>
                        <textarea class="form-control" v-model="comment" placeholder="comments"></textarea>
                    </div>

                    <div class="form-group text-center d-flex justify-content-center align-items-center">
                        <button class="btn btn-dark btn-back" @click="back">BACK</button>
                        <button type="button" class="btn btn-dark btn-modern btn-outline rounded-0 py-2 px-4 btn-continue" @click="next">CONTINUE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { VueTelInput } from 'vue-tel-input'
    export default {
        data () {
            return {
                brokers: [],
                platforms: [
                    {
                        'label': 'MT4',
                        'value': 'mt4'
                    }, 
                    {
                        'label': 'MT5',
                        'value': 'mt5'
                    }
                ],
                risk_preferances: [
                    {
                        'label': 'Risk Percent',
                        'value': 'risk_percent'
                    }, 
                    {
                        'label': 'Fixed Lot',
                        'value': 'fixed_lot'
                    },
                    {
                        'label': 'Lot Multiplier',
                        'value': 'lot_multiplier'
                    }, 
                    {
                        'label': 'Same as Master',
                        'value': 'same_as_master'
                    }
                ],

                isOtherBroker: false,

                platform_type: '',
                broker: '',
                broker_name: '',
                account_number: '',
                password: '',
                broker_server_name: '',
                risk_preferance: '',
                comment: '',
                                
                error: 0,
                platformTypeError: '',
                brokerError: '',
                brokerNameError: '',
                accountNumberError: '',
                passwordError: '',
                brokerServerNameError: ''
            }
        },
        components: {
            VueTelInput,
        },
        watch: {
            broker () {
                this.isOtherBroker = this.broker === 'other'
            }
        },
        created () {
            axios.post('/api/brokers')
                .then(response => {
                    if(response.status === 200) {
                        this.brokers = response.data
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        },
        methods: {
            resetError () {
                this.error = 0
                this.platformTypeError = ''
                this.brokerError = ''
                this.otherBrokerError = ''
                this.accountNumberError = ''
                this.passwordError = ''
                this.brokerServerNameError = ''
            },
            validate () {
                if (this.platform_type.length === 0) {
                    this.platformTypeError = 'Please select a platform type'
                    this.error++
                }

                if (this.broker.length === 0) {
                    this.brokerError = 'Please select a broker'
                    this.error++
                }
                
                if (this.isOtherBroker && this.broker_name.length === 0) {
                    this.brokerNameError = 'Please type broker name'
                    this.error++
                }
                
                if (this.account_number.length === 0) {
                    this.accountNumberError = 'Please enter your meta trader account number'
                    this.error++
                }

                if (this.account_number.length > 11) {
                    this.accountNumberError = 'Account number must be under 11 digit'
                    this.error++
                }

                if (Number.isInteger(this.account_number)) {
                    this.accountNumberError = 'Account number must be with digit only'
                    this.error++
                }
                
                if (this.password.length === 0) {
                    this.passwordError = 'Please enter your meta trader account password'
                    this.error++
                }

                if (this.broker_server_name.length === 0) {
                    this.brokerServerNameError = 'Please enter your broker server name'
                    this.error++
                }
            },
            countryChanged (payload) {
                this.dialCode = payload.dialCode
            },
            back () {
                this.$emit('back')
            },
            next () {
                this.resetError()
                this.validate()

                if (this.error === 0) {
                    let data = {
                        'platform_type': this.platform_type,
                        'broker': this.broker,
                        'broker_name': this.broker_name,
                        'account_number': this.account_number,
                        'password': this.password,
                        'broker_server_name': this.broker_server_name,
                        'risk_preferance': this.risk_preferance,
                        'user_comment': this.comment
                    }
                    this.$emit('next', data)
                }
            }
        }
    }
</script>