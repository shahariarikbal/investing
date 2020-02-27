<template>
    <div class="modal show" style="display: block;background: #000000cc;" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div id="forgot-modal-dialog" class="modal-dialog" role="document" style="position: relative">
            <div id="forgot-loading" style="display: none">
                <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
            </div>
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="authorize_box p-4">
                                <div class="title_dark text-center mb-3">
                                    <h2>Forgot Password</h2>
                                </div>
                                <div class=" text-muted text-center mb-3">
                                    <p>Please enter your email address and we'll send you a link to reset your password.</p>
                                </div>

                                <div class="authorize_form">
                                    <form method="post" @submit.prevent="forgotPassword()">
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="E-mail" v-model="email" required>
                                            <small class="text-danger" v-text="emailError"></small>
                                            <small class="text-success" v-text="emailSuccess"></small>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn">Send Email</button>
                                        </div>
                                        <div class="form-group text-center">
                                            <span>Already a Member <a id="sign_in_on_forgot" href="#loginModal" @click="loginDisplay" class="theme-color"><u>Sign In</u></a></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                email: '',
                emailError: '',
                emailSuccess: ''
            }
        },
        mounted () {
            document.getElementById('forgotModal').addEventListener('click', function(e){
                if (document.getElementById('forgot-modal-dialog').contains(e.target) === false) {
                    EventBus.$emit('forgotPasswordDisplay', false)
                }
            })
        },

        watch: {
            email () {
                this.emailError = ''
                
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          
                if (re.test(this.email)) {
                    axios.get(InvestingPartner.app_url + '/forgot/password-email-check', { params: {email: this.email} })
                        .then(response => {
                            console.log(response.data)
                            if (response.status === 200 && response.data.available === true) {
                                this.emailSuccess = ''
                                this.emailError = ''
                                this.errorCount++
                            }
                            if (response.status === 200 && response.data.available === false) {
                                this.emailSuccess = ''
                                this.emailError = 'This email is not registered in our system'
                            }
                        })
                        .catch(error => {
                            console.log(error)
                        })
                }
                
            }
        },

        methods: {
            resetError () {
                this.errorCount = 0
                this.emailError = ''
            },
            forgotPassword () {
                this.resetError()

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
                if (this.errorCount === 0) {
                    let height = parseInt(document.getElementById('forgot-modal-dialog').offsetHeight)
                    let padding = (height - 40) / 2
                    let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`
                    document.getElementById('forgot-loading').setAttribute('style', loadingStyle)

                    axios.post('/forgot/password-reset-link', {
                    email: this.email
                    })
                    .then(response => {
                        document.getElementById('forgot-loading').setAttribute('style', 'display: none')
                        console.log(response)
                        if (response.status === 200) {
                            document.getElementById('loading').setAttribute('style', 'display: none')
                            this.email = '',
                            alert(response.data.success)
                            location.reload(true)
                        }else {
                            alert('Something is Wrong')
                        }
                    })
                    .catch(error => {
                        document.getElementById('forgot-loading').setAttribute('style', 'display: none')
                        console.log(error)
                    })
                }
                
            }
        },

        loginDisplay () {
            if (!this.showLink) {
                EventBus.$emit('loginDisplay', true)
            } else {
                location.href = InvestingPartner.app_url + '/login/member'
            }
        }
    }
</script>

<style scoped>
    .btn {
        background: #212529;
        color: #fff;
        font-size: 16px;
    }
</style>
