<template>
    <div>
        <li class="nav-item dropdown bg-light" style="border-radius: 5px; display: flex; justify-content: space-between">
            <img style="height: 40px" :src="avater" :alt="`avater of ${full_name}`">
            <a style="color: black" class="nav-link" href="#" role="button" id="dropdownLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ full_name }} <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownLanguage">
                <a class="dropdown-item" :href="`${InvestingPartner.app_url}/member/dashboard`" > <i class="fas fa-sign-in-alt"></i> Dashboard</a>
                <a class="dropdown-item" :href="`${InvestingPartner.app_url}/member/dashboard/account-settings/profile`" > <i class="fas fa-sign-in-alt"></i> Account Settings</a>
                <a class="dropdown-item" href="#" @click="logout"> <i class="fas fa-user-alt"></i> Logout</a>
            </div>
        </li>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                full_name: InvestingPartner.auth.full_name,
                avater: InvestingPartner.app_url + '/storage/user/50x50-' + InvestingPartner.auth.avater
            }
        },
        created () {
            EventBus.$on('change-avater', payload => {
                this.avater = InvestingPartner.app_url + '/storage/user/50x50-' + payload
            })
        },
        methods: {
            logout () {
                console.log('logout')
                axios.post(`${InvestingPartner.app_url}/member/logout`)
                    .then(response => {
                        if (response.status === 200) {
                            EventBus.$emit('logout')
                            location.href = InvestingPartner.app_url
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        }
    }
</script>
