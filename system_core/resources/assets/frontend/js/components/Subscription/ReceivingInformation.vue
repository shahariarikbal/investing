<template>
    <div class="row">
        <div class="d-flex justify-content-center col-md-12">
            <div class="first-step">
                <div class="flex flex-column mb-4 mt-4">
                    <div>
                        <span class="step-title">STEP 4</span>
                    </div>
                    <div>
                        <span>Where you want to get your trading signal. Please provide the required information</span>
                    </div>
                </div>
                <div class="form" id="destination-data-container" style="position: relative">
                    <div id="loading" style="display: none">
                        <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
                    </div>
                    <div class="form-group">
                        <label>Email Address <small>*</small></label>
                        <span class="badge custom-badge-primary" style="cursor:pointer" @click="emailFieldEnabled" v-if="emailFieldDisabled">Change Email</span>
                        <span class="badge badge-info" style="cursor:pointer" @click="verifyEmail" v-if="!verify">Verify</span>

                        <input type="email" class="form-control" ref="email" v-model="email" placeholder="user@example.com" :disabled="emailFieldDisabled" >
                        <small class="text-danger" v-text="emailError"></small>
                    </div>

                    <div class="form-group" v-if="verificationCodeFieldDisplay">
                        <label for="destination_email">Verificaion Code <small>*</small></label> 
                        <span class="badge badge-success" style="cursor:pointer" @click="verificationConfirm">Confirm</span>

                        <input type="text" class="form-control" id="verification_code" ref="verification_code" v-model="verification_code" placeholder="Write verification code here">
                        <small class="text-success" v-text="verificationCodeMessage"></small>
                    </div>

                    <div class="form-group">
                        <label>Contact Number  <small>*</small></label>
                        <vue-tel-input @country-changed="countryChanged" v-model="contact"></vue-tel-input>
                        <small class="text-danger" v-text="contactError"></small>
                    </div>

                    <div class="form-group">
                        <label>Whatsapp Number <small>(optional)</small></label>
                        <input type="tel" class="form-control" v-model="whatsapp">
                    </div>

                    <div class="form-group">
                        <label>Telegram Number <small>(optional)</small></label>
                        <input type="tel" class="form-control" v-model="telegram">
                    </div>

                    <div class="form-group">
                        <label>Skype <small>(optional)</small></label>
                        <input type="tel" class="form-control" v-model="skype">
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
                email: InvestingPartner.auth.email,
                dialCode: '',
                contact: '',
                whatsapp: '',
                telegram: '',
                skype: '',

                emailError: '',
                contactError: '',

                emailFieldDisabled: true,

                verify: true,
                verificationCodeFieldDisplay: false,
                verification_code: null,

                verificationCodeMessage: ''
            }
        },
        components: {
            VueTelInput,
        },
        watch: {
            email (value) {
                this.verify = true
                if (this.email !== InvestingPartner.auth.email) {
                    this.verify = false
                }
            }
        },
        methods: {
            verificationConfirm () {
                
                let height = parseInt(document.getElementById('destination-data-container').offsetHeight)
                let padding = (height - 40) / 2
                let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`
                document.getElementById('loading').setAttribute('style', loadingStyle)

                axios.post('/api/subscription/verify-email', {
                        email: this.email, 
                        code: this.verification_code
                    })
                    .then(response => {
                        if (response.status === 200) {
                            document.getElementById("loading").setAttribute('style', 'display: none')
                            this.verificationCodeFieldDisplay = false

                            alert('Email verification successful!');

                        }
                    })
                    .catch(error => {
                        if (error.response.status === 400) {
                            document.getElementById("loading").setAttribute('style', 'display: none')
                            alert('Invalid verification code');
                        }
                    })
            },

            verifyEmail () {

                // this.phoneFiledDisabled = true
                // this.whatsappFieldDisabled = true
                // this.telegramFieldDisabled = true

                let height = parseInt(document.getElementById('destination-data-container').offsetHeight)
                let padding = (height - 40) / 2
                let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`
                document.getElementById('loading').setAttribute('style', loadingStyle)

                this.verify = true
                axios.post('/api/subscription/verify-email', {email: this.email})
                    .then(response => {
                        if (response.status === 201) {
                            document.getElementById("loading").setAttribute('style', 'display: none')
                            this.verificationCodeFieldDisplay = true
                            this.verificationCodeMessage = response.data.message
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            emailFieldEnabled () {
                this.emailFieldDisabled = false; 
                this.$nextTick(() => this.$refs.email.focus())
                // console.log(this.$refs.email.focus())
                // this.$refs.email.$el.focus()
            },

            countryChanged(payload) {
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
                        email: this.email,
                        contact: this.dialCode + this.contact,
                        whatsapp: this.whatsapp,
                        telegram: this.telegram,
                        skype: this.skype
                    }
                    this.$emit('next', data)
                }
                
            },

            resetError () {
                this.error = 0
                this.emailError = ''
                this.contactError = ''
            },

            validate () {
                if (this.email.length === 0) {
                    this.emailError = "Email address required"
                    this.error++
                }

                if (this.contact.length === 0) {
                    this.contactError = "Contact number required"
                    this.error++
                }
            }

        }
    }
</script>

</script>
<style scoped>
.custom-bg-primary {
    background-color: #03a9f4;
    color: #fff;
    margin: 1rem 0;
    border-radius: 0;
}
.custom-badge-primary {
    background-color: #03a9f4;
    border-radius: 2px;
    padding: 4px 7px;
    vertical-align: middle;
    color: #fff;
}
</style>