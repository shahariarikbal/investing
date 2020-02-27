<template>
    <div class="row">
        <div class="d-flex justify-content-center col-md-12">
            <div class="first-step">
                <div class="flex flex-column mb-2 mt-4">
                    <div>
                        <span class="step-title">STEP 2</span>
                    </div>
                    <div>
                        <span v-text="txt"></span>
                    </div>
                </div>
                <div
                    v-if="auth === null"
                    style="display: flex;justify-content: space-around;"
                >
                    <a
                        class="btn btn-info"
                        style="font-size: 16px;width: 50%;color: #fff;"
                        @click="login"
                        >Login</a
                    >
                    <a
                        class="btn btn-info"
                        style="font-size: 16px;width: 50%;color: #fff;"
                        @click="register"
                        >Register</a
                    >
                </div>
                <div v-if="auth">
                    <div class="row align-items-center mt-2">
                        <div class="col-md-4">
                            <div class="group mb-3">
                                <img
                                    :src="
                                        `${auth.avater_path}/${auth.avater}`
                                    "
                                    class="img-fluid rounded-circle"
                                />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="group">
                                <label class="mr-2"
                                    ><strong>Full Name:</strong></label
                                >
                                <span
                                    class="text-capitalize"
                                    v-text="auth.full_name"
                                ></span>
                            </div>

                            <div class="group">
                                <label class="mr-2"
                                    ><strong>Username:</strong></label
                                >
                                <span v-text="auth.username"></span>
                            </div>

                            <div class="group">
                                <label class="mr-2"
                                    ><strong>Email:</strong></label
                                >
                                <span v-text="auth.email"></span>
                            </div>

                            <div class="group mb-3">
                                <label class="mr-2"
                                    ><strong>Member Since:</strong></label
                                >
                                <span v-text="auth.member_since"></span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button
                            @click="$emit('continue')"
                            type="button"
                            class="btn btn-dark btn-modern btn-outline rounded-0 py-2 px-4"
                        >
                            Continue
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            auth: InvestingPartner.auth
        };
    },
    created() {
        EventBus.$on("authenticated", payload => (this.auth = payload));
    },
    computed: {
        txt() {
            if (this.auth) {
                return "You are continuing as ...";
            } else {
                return "Create your Investing Partner account.";
            }
        }
    },
    methods: {
        login() {
            EventBus.$emit("show-login-modal", true);
        },
        register() {
            EventBus.$emit("show-register-modal");
        }
    }
};
</script>
