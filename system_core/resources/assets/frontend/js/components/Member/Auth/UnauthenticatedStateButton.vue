<template>
    <div>
        <li class="nav-item dropdown bg-light" style="border-radius: 5px !important;">
            <a class="nav-link" href="#" role="button" id="login-register-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Join InvPartner <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="login-register-button">
                <a class="dropdown-item" href="#" @click="loginDisplay"> <i class="fas fa-sign-in-alt"></i> User Login</a>
                <a class="dropdown-item" href="#" @click="registerDisplay"> <i class="fas fa-user-alt"></i> User Registration</a>
            </div>
        </li>
    </div>
</template>

<script>
    export default {
        methods: {
            loginDisplay () {
                EventBus.$emit('loginDisplay', true)
            },
            registerDisplay () {
                EventBus.$emit('registerDisplay', true)
            },
            forgotPasswordDisplay () {
                EventBus.$emit('forgotPasswordDisplay', true)
            }
        }
    }
</script>

<style lang="scss">
    .nav-link {
        color: #000
    }
</style>
