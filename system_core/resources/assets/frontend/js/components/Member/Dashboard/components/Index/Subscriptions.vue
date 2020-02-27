<template>
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="title-container">
                <h2 class="forex-header-second" style="font-size: 18px;">
                    <span>Active Signal Package</span>
                </h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="activity-table-container mb-0">
                <table class="table table-bordered package-active-table mb-2" v-if="subscriptions.length > 0">
                    <thead>
                        <tr>
                            <th>Package Name</th>
                            <th>Status</th>
                            <th>Subscribtion</th>
                            <th>ACTIVATION &amp; EXPIRATION DATE</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr v-for="(subscription, index) in subscriptions" :key="index">
                            <td>{{ subscription.plan.name }} package of {{ subscription.service.replace('App\\', '') }}</td>
                            <td><a href="javascript:void(0)" :class="{ 'btn btn-success custom-btn click-disable' : subscription.status === 'Active', 'btn btn-danger custom-btn click-disable' : subscription.status !== 'Active' }"><span>{{ subscription.status === 'Unpaid' ? 'Pending' : subscription.status }}</span></a></td>
                            <td v-if="subscription.service=='App\\FundManagement'">{{ subscription.plan.settings.billing }}-${{ subscription.security_fund.amount * subscription.plan.settings.security_deposit }}</td>
                            <td v-else>{{ subscription.plan.settings.billing }}-${{ subscription.plan.price }}</td>
                            <td class="d-flex justify-content-between" v-if="subscription.start_at">
                                <span class="service-activate-time" v-if="subscription.start_at">
                                    <i class="fa fa-check"></i> <prity-date  :date="subscription.start_at" />
                                </span>
                                <span class="service-activate-time" v-if="subscription.ends_at">
                                    <i class="fa fa-ban"></i> <prity-date :date="subscription.ends_at" />
                                </span>
                            </td>
                            
                            <td class="d-flex justify-content-between" v-else>
                                <span>Not Yet started</span>
                            </td>
                            <td>
                                <!-- <div class="othter-package-options">
                                    <a href="javascript:void(0)" class="btn btn-default custom-btn"><span>Change</span></a>
                                    <ul>
                                        <li><a href="javascript:void">Basic Package</a></li>
                                        <li><a href="javascript:void">Premium Package</a></li>
                                    </ul>
                                </div>
                                <a href="javascript:void(0)" class="btn btn-success custom-btn">
                                    <span>Renew</span>
                                </a> -->
                            </td>
                        </tr>
                    </tbody>
                    
                </table>
                <div v-else class="alert alert-warning" role="alert">No package subscribed</div>
            </div>
        </div>
    </div>
</template>

<script>
    import PrityDate from './../../../../Time/PrityDate'
    export default {
        data () {
            return {
                subscriptions: []
            }
        },
        components: { PrityDate },
        mounted() {
            this.getPackages()
        },
        methods: {
            getPackages () {
                axios.post('/api/member/subscriptions')
                    .then(response => {
                        this.subscriptions = response.data
                    })
                    .catch(error => {
                        // if ([500, 503, 504].find((error_code) => { return error_code === error.response.status }) !== undefined) {
                        //     setTimeout(() => { 
                        //         this.getPackages()
                        //     }, 5000);
                        // }
                        console.log(error)
                    })
            }
        }
    }
</script>