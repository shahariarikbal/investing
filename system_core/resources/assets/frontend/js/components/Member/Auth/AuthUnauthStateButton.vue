<template>
    <div>
        <authenticated-state-button v-if="auth"></authenticated-state-button>
        <admin-authenticated-state-button v-else-if="admin"></admin-authenticated-state-button>
        <unauthenticated-state-button v-else></unauthenticated-state-button>
    </div>
</template>

<script>
    import AuthenticatedStateButton from './AuthenticatedStateButton.vue'
    import AdminAuthenticatedStateButton from './AdminAuthenticatedStateButton'
    import UnauthenticatedStateButton from './UnauthenticatedStateButton.vue'

    export default {
        components: { AuthenticatedStateButton, AdminAuthenticatedStateButton, UnauthenticatedStateButton },
        data () {
            return {
                auth: InvestingPartner.auth,
                admin: InvestingPartner.admin
            }
        },
        created () {
            EventBus.$on('authenticated', payload => this.auth = payload)
        }
    }
</script>