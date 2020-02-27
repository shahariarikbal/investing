<template>
    <div class="row">
        <div class="col-md-12">
            <div class="title-container">
                <h2 class="forex-header-second" style="font-size: 18px;"><span>Active Package Information</span></h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered text-center" v-if="subscriptions.length > 0">
                    <thead style="background: #6c757d;color:#fff;font-weight:300;">
                        <tr>
                            <th class="text-uppercase">Package Name</th>
                            <th class="text-uppercase">Active Fund</th>
                            <th class="text-uppercase">Contact Duration</th>
                            <th class="text-uppercase">Activation Date</th>
                            <th class="text-uppercase">Expiration Date</th>
                            <th class="text-uppercase">Status</th>
                            <th class="text-uppercase">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="subscription in subscriptions" :key="subscription.id">
                            <td>{{ subscription.plan.name }}</td>
                            <td>{{ (subscription.plan.settings.security_deposit) * parseFloat(subscription.security_fund.amount) | currency }}</td>
                            <td>{{ subscription.plan.settings.billing }}</td>
                            <template v-if="subscription.start_at">
                            <td>
                                <span class="service-activate-time" v-if="subscription.start_at">
                                    <i class="fa fa-check"></i> <prity-date  :date="subscription.start_at" />
                                </span>
                            </td>
                            <td>
                                <span class="service-activate-time" v-if="subscription.ends_at">
                                    <i class="fa fa-ban"></i> <prity-date :date="subscription.ends_at" />
                                </span>
                            </td>
                            </template>
                            <template v-else>
                                <td colspan="2">Not yet started</td>
                            </template>
                            <td>
                                <span :class="{ 'badge badge-success p-1': subscription.status === 'Active', 'badge badge-danger p-1' : subscription.status !== 'Active' }" style="font-size: 10px;">{{ subscription.status === 'Unpaid' ? 'Pending' : subscription.status }}</span>
                            </td>
                            <td>
                                <!-- <div class="d-flex flex-column">
                                    <a href="#" class="text-primary">Recontact</a>
                                    <a href="#"><span class="badge badge-info p-2" style="font-size: 10px;">Change</span></a>
                                </div> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div v-else class="alert alert-warning" role="alert">No Active Package Found</div>
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
        created() {
            this.getPackages()
        },
        computed: {
            price () {
                if (this.subscriptions.length > 0) {
                    return parseFloat(this.subscriptions[0].plan.settings.security_deposit) * parseFloat(this.subscriptions[0].security_fund.amount);
                }
                return 0;
            }
        },
        methods: {
            getPackages () {
                axios.post('/api/member/fund-management/subscription')
                    .then(response => {
                        this.subscriptions = response.data
                        EventBus.$emit('fund-management-subscriptions', this.subscriptions)
                    })
                    .catch(error => {
                        if ([500, 503, 504].find((error_code) => { return error_code === error.response.status }) !== undefined) {
                            setTimeout(() => { 
                                this.getPackages()
                            }, 5000);
                        }
                        console.log(error)
                    })
            }
        }
    }
</script>