<template>
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="title-container">
                <h2 class="forex-header-second" style="font-size: 18px;"><span>Active Copytrade Package</span></h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="activity-table-container mb-0">
                <table class="package-active-table mb-2" v-if="subscriptions.length > 0">
                    <tr>
                        <th>Package Name</th>
                        <th>Status</th>
                        <th>Subscribtion</th>
                        <th>ACTIVATION & EXPIRATION DATE</th>
                        <th>Option</th>
                    </tr>
                    <tr v-for="subscription in subscriptions" :key="subscription.id">
                        <td>{{ subscription.plan.name }}</td>
                        <td>
                            <a 
                                href="javascript:void(0)" 
                                :class="{ 'btn btn-success custom-btn click-disable' : subscription.status === 'Active', 'btn btn-danger custom-btn click-disable' : subscription.status !== 'Active' }">
                                <span>{{ subscription.status === 'Unpaid' ? 'Pending' : subscription.status }}</span>
                            </a>
                            <span>
                                <a 
                                    v-if="!subscription.cancellable && subscription.cancellation_request_sent"
                                    class="btn btn-info btn-sm" 
                                    href="javascript:void(0)"
                                    style="position: relative"
                                    v-popover:info>
                                    <i class="fas fa-info-circle"></i>
                                    <popover name="info" style="width: 300px;left: -138px;top: 25px;">
                                        Cancellation request sent. If approved, subscription will be canceled at the end of subscription
                                    </popover>
                                </a>
                                <a 
                                    v-if="subscription.cancellable"
                                    class="btn btn-info btn-sm" 
                                    href="javascript:void(0)"
                                    style="position: relative"
                                    v-popover:info>
                                    <i class="fas fa-info-circle"></i>
                                    <popover name="info" style="width: 300px;left: -138px;top: 25px;">
                                        Subscription will be canceled at the end of subscription
                                    </popover>
                                </a>
                            </span>
                        </td>
                        <td>{{ subscription.plan.settings.billing }}-${{ subscription.plan.price }}</td>
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
                            <a 
                                href="javascript:void(0)" 
                                class="btn btn-danger custom-btn text-white"
                                v-if="subscription.cancellable_from_member_end && !subscription.cancellation_request_sent"
                                data-toggle="modal" data-target="#subscriptionCancelationModal"
                                @click="cancel(subscription)">
                                <span>Cancel</span>
                            </a>
                        </td>
                    </tr>
                </table>
                <div v-else class="alert alert-warning" role="alert">No package found</div>
            </div>
        </div>

        <subscription-cancelation-modal 
            v-if="cancellableSubscription" 
            :subscription="cancellableSubscription" />

    </div>
</template>

<script>
    import PrityDate from './../../../../Time/PrityDate'
    import subscriptionCancelationModal from './../SubscriptionCancelationModal'

    export default {
        data () {
            return {
                subscriptions: [],
                cancellableSubscription: null
            }
        },
        components: { PrityDate, subscriptionCancelationModal },
        created() {
            this.getSubscribedPackages()

            EventBus.$on('subscription-cancel-request', (payload) => {
                let index = this.subscriptions.findIndex(subscription => {
                    return subscription.id == payload.id
                })
                this.subscriptions[index] = payload

                this.subscriptions = this.subscriptions.map(subscription => {
                    if (subscription.meta && subscription.meta['cancellation_request_at']) {
                        subscription.cancellation_request_sent = true
                    } else {
                        subscription.cancellation_request_sent = false
                    }
                    if (subscription.cancellable === 0 
                        && subscription.service !== 'App\\FundMaanagement' 
                        && subscription.plan.recursive === 1 
                        && (subscription.meta === null || (subscription.meta && !subscription.meta['cancellation_request_at']))) {
                        subscription.cancellable_from_member_end = true
                    }
                    return subscription
                })
            })
        },
        methods: {
            getSubscribedPackages () {
                axios.post('/api/member/copy-trade/subscription')
                    .then(response => {
                        this.subscriptions = response.data
                        this.subscriptions = this.subscriptions.map(subscription => {
                            if (subscription.meta && subscription.meta['cancellation_request_at']) {
                                subscription.cancellation_request_sent = true
                            } else {
                                subscription.cancellation_request_sent = false
                            }
                            if (subscription.cancellable === 0 
                                && subscription.service !== 'App\\FundMaanagement' 
                                && subscription.plan.recursive === 1 
                                && (subscription.meta === null || (subscription.meta && !subscription.meta['cancellation_request_at']))) {
                                subscription.cancellable_from_member_end = true
                            }
                            return subscription
                        })
                        EventBus.$emit('copytrade-subscriptions', this.subscriptions)
                    })
                    .catch(error => {
                        if ([500, 503, 504].find((error_code) => { return error_code === error.response.status }) !== undefined) {
                            setTimeout(() => { 
                                this.getPackages()
                            }, 5000);
                        }
                        console.log(error)
                    })
            },
            cancel (subscription) {
                this.cancellableSubscription = subscription
            }
        }
    }
</script>

<style lang="scss" scoped>
    div[data-popover="info"] {
        background: #444;
        color: #f9f9f9;
        
        font-size: 12px;
        line-height: 1.5;
        margin: 5px;
    }
    div[data-popover="info"]:before {
        border-bottom: 6px solid #444;
    }
</style>