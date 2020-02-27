<template>
    <div class="tab-pane fade active show" id="account-settings-password-change" style="position: relative">
        <div id="loading" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
        </div>

        <div class="form-row mt-1">
            <div class="form-group col-md-6 is-empty">
                <label>Current Password</label>
                <input type="password" class="form-control" v-model="currentPassword" @keyup.enter="save">
                <small :class="currentPasswordErrorClass" v-text="currentPasswordError"></small>
            </div>
            <div class="form-group col-md-6 is-empty">
                <label>New Password</label>
                <input type="password" class="form-control" v-model="newPassword" @keyup.enter="save">
                <small :class="newPasswordErrorClass" v-text="newPasswordError"></small>
            </div>
            <div class="form-group col-md-6 is-empty">
                <label>Retype Password</label>
                <input type="password" class="form-control" v-model="retypePassword" @keyup.enter="save">
                <small :class="retypePasswordErrorClass" v-text="retypePasswordError"></small>
            </div>
        </div>
        
        <div class="bg-white text-center">
            <a href="#" type="submit" class="btn btn-dark btn-lg" @click="save">Change</a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                currentPassword: '',
                newPassword: '',
                retypePassword: '',
                currentPasswordError: '',
                newPasswordError: '',
                retypePasswordError: '',
                error: 0
            }
        },
        computed: {
            currentPasswordErrorClass() {
                if (this.currentPasswordError.length > 0) {
                    return 'invalid-feedback invalid-feedback-show'
                }
                return 'invalid-feedback'
            },
            newPasswordErrorClass() {
                if (this.newPasswordError.length > 0) {
                    return 'invalid-feedback invalid-feedback-show'
                }
                return 'invalid-feedback'
            },
            retypePasswordErrorClass() {
                if (this.retypePasswordError.length > 0) {
                    return 'invalid-feedback invalid-feedback-show'
                }
                return 'invalid-feedback'
            }
        },
        methods: {
            resetError () {
                this.currentPasswordError = ''
                this.newPasswordError = ''
                this.retypePasswordError = ''
                this.error = 0
            },
            validate () {
                if (this.currentPassword.length < 8) {
                    this.currentPasswordError = 'Current password must have 8 character in length'
                    this.error++
                }
                if (this.newPassword.length < 8) {
                    this.newPasswordError = 'New password must have 8 character in length'
                    this.error++
                }
                if (this.newPassword === this.currentPassword) {
                    this.newPasswordError = 'New password can not be current password'
                    this.error++
                }
                if (this.newPassword !== this.retypePassword) {
                    this.retypePasswordError = 'New password and retype password doesn\'t match'
                    this.error++
                }
            },
            save () {
                this.resetError()
                this.validate()
                if (this.error === 0) {

                    let height = parseInt(document.getElementById('account-settings-password-change').offsetHeight)
                    let padding = (height - 40) / 2
                    let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`
                    document.getElementById('loading').setAttribute('style', loadingStyle)

                    axios.post('/api/member/change-password', {
                        current_password: this.currentPassword,
                        new_password: this.newPassword,
                        retype_password: this.retypePassword
                    })
                        .then(response => {
                            if (response.status === 204) {
                                this.currentPassword = ''
                                this.newPassword = ''
                                this.retypePassword = ''
                                alert('Password change successful!')
                            }
                            document.getElementById('loading').setAttribute('style', 'display: none')
                        })
                        .catch(error => {
                            document.getElementById('loading').setAttribute('style', 'display: none')
                            
                            if (error.response.status == 422) {
                                if (error.response.data.current_password) {
                                    this.currentPasswordError = error.response.data.current_password[0]
                                }
                                if (error.response.data.new_password) {
                                    this.newPasswordError = error.response.data.new_password[0]
                                }
                                if (error.response.data.retype_password) {
                                    this.retypePasswordError = error.response.data.retype_password[0]
                                }
                                if (error.response.data.others) {
                                    alert(error.response.data.others[0])
                                }
                            }
                        }) 
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    .invalid-feedback.invalid-feedback-show {
        display: block;
    }
    input[type="password"] {
        font-size: 40px !important;
    }
</style>