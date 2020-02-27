<template>
    <div>
        <flash-message class="flash-messsage"></flash-message>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-2">
                <div class="drop-shadow">
                    <div class="d-flex flex-column justify-content-center align-items-center mb-3 fs-12" style="margin-top:-45px;">
                        <div>
                            <img :src="avater" alt="Profile Image" class="img-thumbnail mb-2">
                        </div>
                        <div>
                            <span v-text="username"></span>
                            <img :src="`${InvestingPartner.app_url}/assets/images/membership.png`" width="42" height="42" alt="membership-image" data-toggle="tooltip" data-placement="top" title="PROFESSIONAL SERVICE PRO">
                        </div>

                        <template v-if="InvestingPartner.auth.profile">
                            <div style="text-align: center">
                                <span class="mr-1" v-text="address"></span>
                                <span class="mr-1" v-text="city"></span>
                            </div>
                            <div>
                                <span class="mr-1" v-if="InvestingPartner.auth.profile.country_code">
                                    <span :class="`flag-icon flag-icon-${ InvestingPartner.auth.profile.country_code.toLowerCase() }`"></span>
                                </span>
                                <span class="mr-1" v-text="country"></span>
                            </div>
                        </template>
                        
                        <div>
                            <span class="mr-1" v-text="memberSince"></span>
                        </div>
                    </div>
                    <div id="accordion" class="faq_content left_menu pro-left-nav">
                        <RouterLink :to="{ name: 'dashboard' }" class="single-link">
                            Dashboard
                        </RouterLink>
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h6 class="mb-0"> <a class="collapse" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Activate New Services</a> </h6>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                        <li>
                                            <RouterLink :to="{ name: 'premium-signal' }">
                                                Premium Signal
                                            </RouterLink>
                                        </li>
                                        <li>
                                            <RouterLink :to="{ name: 'copy-trade' }">
                                                Copytrade Service
                                            </RouterLink>
                                        </li>
                                        <li>
                                            <RouterLink :to="{ name: 'fund-management' }">
                                                Fund Management
                                            </RouterLink>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h6 class="mb-0"> <a class="collapse" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">financial dashboard</a> </h6>
                            </div>
                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                       <li>
                                            <RouterLink :to="{ name: 'wallet' }">
                                                Dashboard
                                            </RouterLink>
                                        </li>
                                       <li>
                                            <RouterLink :to="{ name: 'deposit' }">
                                                Deposit
                                            </RouterLink>
                                        </li>
                                       <li>
                                            <RouterLink :to="{ name: 'withdraw' }">
                                                Withdraw
                                            </RouterLink>
                                        </li>
                                       <li>
                                            <RouterLink :to="{ name: 'transactions' }">
                                                Transaction History
                                            </RouterLink>
                                        </li>
                                        <li>
                                            <RouterLink :to="{ name: 'invoice' }">
                                                manage invoice
                                            </RouterLink>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h6 class="mb-0"> <a class="collapse" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Affiliate Program</a> </h6>
                            </div>
                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                       <li>
                                            <RouterLink :to="{ name: 'affiliate' }">
                                                Dashboard
                                            </RouterLink>
                                        </li>
                                       <li>
                                            <RouterLink :to="{ name: 'affiliate-tools' }">
                                                Tools
                                            </RouterLink>
                                        </li>
                                       <li>
                                            <RouterLink :to="{ name: 'affiliate-reffers' }">
                                                User
                                            </RouterLink>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <RouterLink :to="{ name: 'account-settings' }" class="single-link">
                            Account Settings
                        </RouterLink>

                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h6 class="mb-0"> <a class="collapse" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Support Dipartment</a> </h6>
                            </div>
                            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                       <li>
                                            <RouterLink :to="{ name: 'support-tickets' }">
                                                Support Ticket
                                            </RouterLink>
                                            <!-- <a href="support-ticket.html">Support Ticket</a></li> -->
                                        <li><a href="support-faq.html">Support FAQ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
            <RouterView />
        </div>
        
    </div>
</template>

<script>
    export default {
        data () {
            return {
                profile: InvestingPartner.auth.profile,
                avater: `${InvestingPartner.auth.avater_path}/${InvestingPartner.auth.avater}`
            }
        },
        mounted() {
            // EventBus.$on('avater-fetched', (payload) => {
            //     this.avater = `${InvestingPartner.auth.avater_path}/${payload}`
            // })

            EventBus.$on('change-avater', (payload) => {
                this.avater = `${InvestingPartner.auth.avater_path}/${payload}`
            })
        },
        computed: {
            username () {
                return InvestingPartner.auth.username
            },
            address () {
                if (this.profile) {
                    return this.profile.address
                }
                return InvestingPartner.auth.profile
            },
            city () {
                if (this.profile) {
                    return InvestingPartner.auth.city
                }
                return ''
            },
            country () {
                if (this.profile) {
                    return InvestingPartner.auth.country
                }
                return ''
            },
            memberSince () {
                return InvestingPartner.auth.member_since
            }
        }
    }
</script>

<style lang="scss">
    .flash-messsage {
        position: fixed;
        z-index: 1;
        bottom: 20px;
        right: 20px;
        max-height: 400px;
        // width: 260px;
        max-width: 600px;
        perspective: 400px;
        box-sizing: border-box;
    }
</style>