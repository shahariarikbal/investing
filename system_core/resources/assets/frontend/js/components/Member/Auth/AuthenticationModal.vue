<template>
    <div>
        <div
            v-show="LoginDisplayStatus"
            class="modal show"
            style="display: block;background: #000000cc;"
            id="loginModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div id="login-modal-dialog" class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <login />
                    </div>
                </div>
            </div>
        </div>

        <div
            v-show="RegisterDisplayStatus"
            class="modal show"
            style="display: block;background: #000000cc;"
            id="signUpModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div
                id="register-modal-dialog"
                class="modal-dialog"
                role="document"
            >
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <register />
                    </div>
                </div>
            </div>
        </div>
        <forgot-password v-if="ForgotPassowrdDisplayStatus" />

        <alert-modal v-if="AlertModalDisplayStatus" :message="message" />
    </div>
</template>

<script>
// import mixin from './mixin.js'
import Login from "./Login.vue";
import Register from "./Register.vue";
import ForgotPassword from "./ForgotPassword.vue";
import AlertModal from "./AlertModal.vue";

export default {
    name: "AuthenticationModal",
    // mixins: [mixin],
    data() {
        return {
            LoginDisplayStatus: false,
            RegisterDisplayStatus: false,
            ForgotPassowrdDisplayStatus: false,
            AlertModalDisplayStatus: false,

            message: {
                text: "",
                type: ""
            }
        };
    },
    mounted() {
        document
            .getElementById("loginModal")
            .addEventListener("click", function(e) {
                if (
                    document
                        .getElementById("login-modal-dialog")
                        .contains(e.target) === false
                ) {
                    EventBus.$emit("loginDisplay", false);
                }
            });

        document
            .getElementById("signUpModal")
            .addEventListener("click", function(e) {
                if (
                    document
                        .getElementById("register-modal-dialog")
                        .contains(e.target) === false
                ) {
                    EventBus.$emit("registerDisplay", false);
                }
            });
    },
    methods: {
        closeAllModal() {
            this.LoginDisplayStatus = false;
            this.RegisterDisplayStatus = false;
            this.ForgotPassowrdDisplayStatus = false;
            this.AlertModalDisplayStatus = false;
        }
    },
    created() {
        if (InvestingPartner.auth === null) {
            this.displayStatus = true;
        }

        EventBus.$on("display-alert-modal", payload => {
            this.closeAllModal();

            this.message = {
                text: payload.text,
                type: payload.type
            };

            this.AlertModalDisplayStatus = true;
        });

        EventBus.$on("show-login-modal", () => {
            this.LoginDisplayStatus = true;
        });
        EventBus.$on("show-register-modal", () => {
            this.RegisterDisplayStatus = true;
        });

        EventBus.$on("closeAllModal", payload => {
            this.closeAllModal();
        });
        EventBus.$on("loginDisplay", payload => {
            this.closeAllModal();
            if (payload === true) {
                this.LoginDisplayStatus = true;
            }
        });
        EventBus.$on("registerDisplay", payload => {
            this.closeAllModal();
            if (payload === true) {
                this.RegisterDisplayStatus = true;
            }
        });
        EventBus.$on("forgotPasswordDisplay", payload => {
            this.closeAllModal();
            if (payload === true) {
                this.ForgotPassowrdDisplayStatus = true;
            }
        });
        EventBus.$on("alertModalDisplay", payload => {
            this.closeAllModal();
            if (payload === true) {
                this.AlertModalDisplayStatus = true;
            }
        });
    },
    components: {
        Login,
        Register,
        ForgotPassword,
        AlertModal
    }
};
</script>
