<template>
    <div>
        <li class="nav-item dropdown bg-light" style="border-radius: 5px; display: flex; justify-content: space-between">
            <a style="color: black" class="nav-link" href="#" role="button" id="dropdownLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-shield"></i> {{ full_name }} <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownLanguage">
                <a class="dropdown-item" :href="`${InvestingPartner.app_url}/dashboard`" > <i class="fas fa-sign-in-alt"></i> Dashboard</a>
                <!-- <a class="dropdown-item" href="#" @click="logout"> <i class="fas fa-user-alt"></i> Logout</a> -->
            </div>
        </li>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                full_name: InvestingPartner.admin.full_name
            }
        },
        methods: {
            // logout () {
            //     console.log('logout')
            //     axios.post(`${InvestingPartner.app_url}/member/logout`)
            //         .then(response => {
            //             if (response.status === 200) {
            //                 EventBus.$emit('logout')
            //                 location.href = InvestingPartner.app_url
            //             }
            //         })
            //         .catch(error => {
            //             console.log(error)
            //         })
            // }
        }
    }
</script>
