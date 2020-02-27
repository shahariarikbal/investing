<template>
    <div class="row" style="position: relative" id="login-area">
        <div id="loading" style="display: none">
            <i
                class="fa fa-spinner fa-pulse fa-5x fa-fw"
                aria-hidden="true"
            ></i>
        </div>
        <div class="col-lg-12">
            <div class="authorize_box p-3">
                <div class="d-flex justify-content-center mb-3">
                    <img
                        :src="
                            `${InvestingPartner.app_url}/assets/images/logo.png`
                        "
                        alt="logo of Investing Partner"
                        width="100"
                    />
                </div>
                <div class="title_dark text-center">
                    <h2 class="mb-4">Login</h2>
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
                    <form method="post" action="">
                        <div class="form-group">
                            <input
                                type="email"
                                name="username"
                                placeholder="username@example.com"
                                required
                                v-model="email"
                                @keyup.enter="login"
                            />
                            <small
                                class="text-danger"
                                v-text="emailError"
                            ></small>
                        </div>
                        <div class="form-group">
                            <input
                                type="password"
                                id="password-field"
                                name="password"
                                placeholder="Password"
                                required
                                v-model="password"
                                @keyup.enter="login"
                            />
                            <!-- <span
                                data-toggle="#password-field"
                                class="ion-eye toggle-password"
                            ></span> -->
                            <toggle-password-view targetId="password-field" />
                            <small
                                class="text-danger"
                                v-text="passwordError"
                            ></small>
                        </div>
                        <div class="form-group">
                            <div class="checkbox_field d-inline">
                                <input
                                    type="checkbox"
                                    value="rememberme"
                                    id="rememberme"
                                    name="rememberme"
                                />
                                <label for="rememberme">Remember me</label>
                            </div>
                            <a
                                href="#"
                                id="forgot_password"
                                class="forgot_pass theme-color"
                                @click="forgotPasswordDisplay"
                                >Forgot Password?</a
                            >
                        </div>
                        <div class="form-group text-center">
                            <button type="button" class="btn" @click="login">
                                Login
                            </button>
                        </div>
                        <div class="form-group text-center mb-0">
                            <span style="font-size:14px;"
                                >if you don't have an account
                                <a
                                    href="#"
                                    @click="registerDisplay"
                                    class="theme-color"
                                    ><u>Sign Up</u></a
                                ></span
                            >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import AlertMessageModal from "./AlertModal";
import TogglePasswordView from "@p/TogglePasswordView"

export default {
    props: ["showLink"],
    data() {
        return {
            email: "",
            password: "",
            errorCount: 0,
            emailError: "",
            passwordError: ""
        };
    },
    components: { AlertMessageModal, TogglePasswordView },
    methods: {
        resetError() {
            this.errorCount = 0;
            this.emailError = "";
            this.passwordError = "";
        },
        login() {
            this.resetError();

            // validation
            // check email length
            if (this.email.length === 0) {
                this.emailError = "Email address required";
                this.errorCount++;
            }

            // check email with regex

            //chech password length min 8
            if (this.password.length < 8) {
                this.passwordError = "Password is too short";
                this.errorCount++;
            }

            if (this.password.length === 0) {
                this.passwordError = "Password Is required";
                this.errorCount++;
            }

            // sent login request
            if (this.errorCount === 0) {
                let height = parseInt(
                    document.getElementById("login-area").offsetHeight
                );
                let padding = (height - 40) / 2;
                let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`;
                document
                    .getElementById("loading")
                    .setAttribute("style", loadingStyle);

                let data = {
                    email: this.email,
                    password: this.password
                };
                //axios.post('member/login', data)
                axios
                    .post(InvestingPartner.app_url + "/login/member", data)
                    .then(response => {
                        if (response.data.access_token) {
                            document
                                .getElementById("loading")
                                .setAttribute("style", "display: none");
                            localStorage.setItem(
                                "auth_token",
                                response.data.access_token
                            );
                            EventBus.$emit("authenticated", response.data.auth);
                            EventBus.$emit(
                                "update-auth-token",
                                localStorage.getItem("auth_token")
                            );
                            EventBus.$emit("closeAllModal");
                            InvestingPartner.auth = response.data.auth;

                            EventBus.$emit("display-alert-modal", {
                                text:
                                    "You are successfully logged into Investing Partner",
                                type: "success"
                            });

                            this.pendingRequest()

                            _.delay(function() {
                                EventBus.$emit("alertModalDisplay", false);
                            }, 1000);

                            if (
                                location.href ===
                                "https://dev.investingpartner.com/login/member"
                            ) {
                                _.delay(function() {
                                    location.reload();
                                }, 1000);
                            }

                            //location.replace(InvestingPartner.app_url + response.data.redirect_to)
                        }
                    })
                    .catch(error => {
                        document
                            .getElementById("loading")
                            .setAttribute("style", "display: none");
                        console.log(error);

                        if (error.response && error.response.status === 422) {
                            console.log(error.response.data.errors.email);

                            if (
                                error.response.data.errors.email &&
                                error.response.data.errors.email.length > 0
                            ) {
                                this.emailError =
                                    error.response.data.errors.email[0];
                            }

                            if (
                                error.response.data.errors.password &&
                                error.response.data.errors.password.length > 0
                            ) {
                                this.passwordError =
                                    error.response.data.errors.password[0];
                            }
                        } else {
                            console.log("Others error");
                        }
                    });
            }
        },

        registerDisplay() {
            if (!this.showLink) {
                EventBus.$emit("registerDisplay", true);
            } else {
                location.href = InvestingPartner.app_url + "/register/member";
            }
        },
        forgotPasswordDisplay() {
            if (!this.showLink) {
                EventBus.$emit("forgotPasswordDisplay", true);
            } else {
                location.href = InvestingPartner.app_url + "/forgot/password";
            }
        },
        pendingRequest() {
            let prequest = window.sessionStorage.getItem('pending-request')
            prequest = JSON.parse(prequest);
            if (!prequest) {
                return
            }
            let auth_token = localStorage.getItem('auth_token') || null;
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + auth_token;

            
            axios({
                method: prequest.method,
                url: prequest.url,
                data: prequest.data
            })
            .then(res=> {
                EventBus.$emit("display-alert-modal", {
                                text: "request submit successfully.",
                                type: "success"
                            });
            })
        }
    }
};
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
.btn:hover {
    color:#fff;
}
.authorize_form .form-group {
    position: relative;
    margin-bottom: 5px;
}
.authorize_form input {
    border-radius: 4px;
    height: 36px;
    font-size: 14px;
    font-weight: 300;
}
</style>
