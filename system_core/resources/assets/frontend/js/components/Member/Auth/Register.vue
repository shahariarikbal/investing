<template>
    
    <div class="row" style="position: relative" id="register-area">
        <div id="reg-loading" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
        </div>
        <div class="col-lg-12 regModal" >
            <div class="authorize_box p-4">
                <div class="d-flex justify-content-center mb-3">
                    <img :src="`${InvestingPartner.app_url}/assets/images/logo.png`" alt="logo of Investing Partner" width="100">
                </div>
                <div class="title_dark text-center">
                    <h2 class="mb-4">REGISTER</h2>
                </div>
                <!-- <div class="d-flex justify-content-center mb-3">
                    <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-auto-logout-link="false"
                            data-use-continue-as="false"></div>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <div class="g-signin2" data-width="254" data-height="40" data-longtitle="true"></div>
                </div>
                <div class="text-center position-relative mb-3">
                    <span class="d-block loginor"></span><span class="pl-2 pr-2 text-muted">or</span>
                </div> -->

                <div class="authorize_form">
                    <form method="post" @submit.prevent="register()">
                        <div class="form-group">
                            <input type="text" name="first_name" placeholder="First Name" v-model="first_name" required>
                            <small class="text-danger" v-text="firstNameError"></small>
                        </div>
                        <div class="form-group">
                            <input type="text" name="last_name" placeholder="Last Name" v-model="last_name" required="">
                            <small class="text-danger" v-text="lastNameError"></small>
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" placeholder="username" v-model="username" required="">
                            <small class="text-danger" v-text="usernameError"></small>
                            <small class="text-success" v-text="usernameSuccess"></small>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="E-mail" v-model="email" required="">
                            <small class="text-danger" v-text="emailError"></small>
                            <small class="text-success" v-text="emailSuccess"></small>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" v-model="password" required="">
                            <small class="text-danger" v-text="passwordError"></small>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" v-model="password_confirmation" placeholder="Confirm Password" required="">
                            <small class="text-danger" v-text="passwordConfirmationError"></small>
                        </div>

                        <div class="form-group text-center mb-0">
                            <button type="submit" id="hide" class="btn btn-default">Continue</button>
                        </div>
                        <div class="form-group text-center mb-0">
                            <small>By joining I agree to receive emails from Investing Partner.</small>
                        </div>
                        <div class="form-group text-center mb-0">
                            <span style="font-size:14px;">Already a Member <a id="sign_in" href="#loginModal" @click="loginDisplay" class="theme-color"><u>Sign In</u></a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                
</template>

<script>
    import AlertMessageModal from './AlertModal'

    export default {
        props: [ 'showLink' ],
        data() {
            return {
                first_name: '',
                last_name: '',
                username: '',
                email: '',
                password: '',
                password_confirmation: '',

                usernameSuccess: '',
                emailSuccess: '',

                mailformat: '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',

                errorCount: 0,
                firstNameError: '',
                lastNameError: '',
                usernameError: '',
                emailError: '',
                passwordError: '',
                passwordConfirmationError: ''
            }
        },

        components: { AlertMessageModal },

        watch: {
            username () {
                this.usernameError = ''
                axios.get(InvestingPartner.app_url + '/register/username-is-available', { params: {username: this.username} })
                    .then(response => {
                       
                        if (response.status === 200 && response.data.available === false) {
                            this.usernameError = 'username is not available'
                            this.usernameSuccess = ''
                            this.errorCount++
                        }
                        if (response.status === 200 && response.data.available === true) {
                            this.usernameSuccess = 'username is available'
                            this.usernameError = ''
                        }
                    })
                    .catch(error => {
                        //console.log(error)
                    })
            },
            email () {
                this.emailError = ''
                
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          
                if (re.test(this.email)) {
                    axios.get(InvestingPartner.app_url + '/register/email-is-available', { params: {email: this.email} })
                        .then(response => {
                          
                            if (response.status === 200 && response.data.available === false) {
                                this.emailError = 'email is already registered'
                                this.emailSuccess = ''
                                this.errorCount++
                            }
                            if (response.status === 200 && response.data.available === true) {
                                this.emailError = ''
                                this.emailSuccess = 'email is available'
                            }
                        })
                        .catch(error => {
                            //console.log(error)
                        })
                }
                
            }
        },

        methods: {
            resetError () {
                this.errorCount = 0
                this.firstNameError = ''
                this.lastNameError = ''
                this.usernameError = ''
                this.emailError = ''
                this.passwordError = ''
                this.passwordConfirmationError = ''
            },
            register () {
                this.resetError()

                // validation
                //check first name lenght
                if (this.first_name.length === 0) {
                    this.firstNameError = 'First Name is Required'
                    this.errorCount++
                }

                //validation
                //check last name lenght
                if (this.last_name.length === 0){
                    this.lastNameError = 'Last Name is Required'
                    this.errorCount++
                }

                
                if (this.username.length === 0){
                    this.usernameError = 'Username is Required'
                    this.errorCount++
                }

                //validation
                //check email lenght
                if(this.email.length === 0){
                    this.emailError = 'Valid Email is Required'
                    this.errorCount++
                }

                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if (!re.test(this.email)){
                    this.emailError = 'Valid Email is Required'
                    this.errorCount++
                }

                //validation
                //check password lenght
                if(this.password.length < 8 ){
                    this.passwordError = 'Password is to short'
                    this.errorCount++
                }

                // //validation
                // //check password confirmation lenght
                // if(this.password_confirmation.length === this.password.lenght){
                //     this.passwordConfirmationError == 'Password dose not match'
                //     this.errorCount++
                // }
                if (this.errorCount === 0) {
                    let height = parseInt(document.getElementById('register-area').offsetHeight)
                    let padding = (height - 40) / 2
                    let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`
                    document.getElementById('reg-loading').setAttribute('style', loadingStyle)

                    axios.post(InvestingPartner.app_url + '/register/member', {
                            
                            first_name: this.first_name,
                            last_name: this.last_name,
                            username: this.username,
                            email: this.email,
                            password: this.password,
                            password_confirmation: this.password_confirmation

                        })
                        .then(( response ) => {
                            
                            if (response.status === 201) {
                                document.getElementById('reg-loading').setAttribute('style', 'display: none')
                                
                                 

                                this.first_name = '',
                                this.last_name = '',
                                this.username = '',
                                this.email = '',
                                this.password = '',
                                this.password_confirmation = ''
                                this.usernameSuccess = ''
                                this.emailSuccess = ''

                                EventBus.$emit('display-alert-modal', { 'text': 'An verification email has been sent to your email address. Please confirm your registration in 24 hours', 'type': 'success' })
                                EventBus.$on('registerModalDisplay', false)
                                // EventBus.$emit('closeAllModal')

                                _.delay(function() {
                                    if (location.href === "https://dev.investingpartner.com/register/member") {
                                        location.href = InvestingPartner.app_url
                                    }
                                    EventBus.$emit('alertModalDisplay', false)
                                }, 3000)
                                
                            } else {
                                alert('Something went wrong!')
                            }
                        })
                        .catch((error ) => {
                            document.getElementById('reg-loading').setAttribute('style', 'display: none')
                    
                            if (error.response.status === 422) {
                                if (error.response.data.errors.first_name && error.response.data.errors.first_name.length > 0) {
                                    this.firstNameError = error.response.data.errors.first_name[0]
                                }
                                if (error.response.data.errors.last_name && error.response.data.errors.last_name.length > 0) {
                                    this.lastNameError = error.response.data.errors.last_name[0]
                                }
                                if (error.response.data.errors.username && error.response.data.errors.username.length > 0) {
                                    this.usernameError = error.response.data.errors.username[0]
                                }
                                if (error.response.data.errors.email && error.response.data.errors.email.length > 0) {
                                    this.emailError = error.response.data.errors.email[0]
                                }
                                if (error.response.data.errors.password && error.response.data.errors.password.length > 0) {
                                    this.passwordError = error.response.data.errors.password[0]
                                }
                            }
                        })
                }
                
            },
            loginDisplay () {
                //EventBus.$emit('loginDisplay', true)
                if (!this.showLink) {
                    EventBus.$emit('loginDisplay', true)
                } else {
                    location.href = InvestingPartner.app_url + '/login/member'
                }
            }
        }

    }
</script>
<style scoped>
    .btn {
        background: #212529;
        color: #fff;
        font-size: 14px;
        height: 36px;
        padding: 0;
        border-radius: 4px;
        margin: 0;
    }
    
    .authorize_form input {
        border-radius: 4px;
        height: 36px;
        font-size: 14px;
        font-weight: 300;
    }
    .authorize_form .form-group {
        position: relative;
        margin-bottom: 5px;
    }
    .title_dark h2 {
        font-size:24px;
    }
    .regModal {
        padding: 0;
    }
</style>