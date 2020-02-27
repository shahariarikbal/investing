<template>
    <div>
        <section class="container mt-5 compareTable">
            <div class="row">
                <div v-if="comparable" class="table-responsive table-bordered">

                    <table class="table table-bordered table-hover">

                        <tbody>
                            <tr v-for="(item, index) in rule" :key="index">

                                <td :colspan="brokers.length + 1" v-if="item.key ==='header'" style="background: #c4c4c4;">
                                    <h3 class="">{{ item.value }}</h3>
                                </td>

                                <template v-else>
                                    <th width="">{{item.value}}</th>

                                    <td v-for="broker in brokers" :key="broker.id">
                                        <template v-if="item.key === 'name'">
                                            <b><a href="" class="text-danger">{{ broker[item.key] }}</a></b>
                                        </template>
                                        <template v-else-if="item.key === 'logo'">
                                            <img :src="`${InvestingPartner.app_url}/broker/logo/125x56-${broker[item.key]}`" alt="">
                                            <div class="social-share-icons d-flex flex-column">
                                                <ul class="m-0 p-0 list-unstyled">
                                                    <li>
                                                        <i :class=" broker.rating >= 5 ? 'fas fa-star text-warning': 'far fa-star' "></i>
                                                        <i :class=" broker.rating >= 4 ? 'fas fa-star text-warning': 'far fa-star' "></i>
                                                        <i :class=" broker.rating >= 3 ? 'fas fa-star text-warning': 'far fa-star' "></i>
                                                        <i :class=" broker.rating >= 2 ? 'fas fa-star text-warning': 'far fa-star' "></i>
                                                        <i :class="broker.rating >= 1 ? 'fas fa-star text-warning': 'far fa-star' "></i>
                                                        <!-- <span class="display-none">{{ broker.rating }} ({{ broker.reviews.length }} reviews)</span> -->
                                                    </li>
                                                </ul>
                                            </div>
                                        </template>
                                        <template v-else-if="item.key === 'regulatory_authorities' || item.key === 'broker_types' || item.key === 'trading_platforms' || item.key === 'payment_options' || item.key === 'spread_types' || item.key === 'trading_instruments'">
                                            <template v-for="authority in broker[item.key]">
                                                {{ authority.name }},
                                            </template>
                                        </template>
                                        <template v-else-if="item.key === 'us_client'">
                                            <template v-if="broker[item.key] === 1">
                                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                            </template>
                                            
                                            <template v-else>
                                                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
                                            </template>
                                        </template>
                                        <template v-else-if="item.key === 'remove'">
                                            <button class="btn-remove" @click="remove(broker['slug'])">Remove</button>
                                        </template>
                                        <template v-else>
                                            <template v-if="resolve(item.key, broker) == 1">
                                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                            </template>
                                            
                                            <template v-else-if="resolve(item.key, broker) == 0">
                                                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
                                            </template>
                                            <template v-else>
                                                {{ resolve(item.key, broker)  }}
                                            </template>
                                        </template>
                                    </td>
                                </template>
                            </tr>
                        </tbody>
                    </table>
                    <a
                        :href="`${InvestingPartner.app_url}/forex-brokers`"
                        class="btn btn-block" style="width: 300px;background: #434343;border: 1px solid #434343;border-radius: 4px;margin: 0 auto 10px;">Back To Broker List</a>
                </div>
                <div v-else class="alert alert-warning" role="alert" style="margin: 0 auto 100px;">
                    Sorry! We can not generate compare report for less than 2 selected broker. <a :href="`${InvestingPartner.app_url}/forex-brokers`" class="alert-link text-center" style="color: #bd811e;">Back To Broker List</a>
                </div>
            </div>
        </section>
        <compareWidget />
    </div>
</template>

<script>
import compareWidget from './Widgets/Compare.vue'
export default {
    components: { compareWidget },
    data() {
        return {
            removeEventEmitedFromCompare: false,
            brokers: [],
            rule: [
                {
                    key: 'name',
                    value: 'Broker'
                },
                {
                    key: 'logo',
                    value: 'Logo'
                },
                {
                    key: 'header',
                    value: 'Company Information'
                },
                {
                    key: 'website_url',
                    value: 'Website'
                },
                {
                    key: 'headquarter',
                    value: 'Headquarterd In'
                },
                {
                    key: 'founded_in',
                    value: 'Founded In'
                },
                {
                    key: 'regulatory_authorities',
                    value: 'Regulating Authority'
                },
                {
                    key: 'us_client',
                    value: 'US Client Accepted'
                },
                {
                    key: 'meta.broker_status',
                    value: 'Broker Status'
                },
                {
                    key: 'broker_types',
                    value: 'Broker Type'
                },
                {
                    key: 'meta.telephone',
                    value: 'Telephone Number'
                },
                {
                    key: 'meta.fax',
                    value: 'Fax Number'
                },
                {
                    key: 'meta.email_support',
                    value: 'Email Support'
                },
                {
                    key: 'meta.international_office',
                    value: 'International Office'
                },
                {
                    key: 'meta.web_language',
                    value: 'Web Site Language'
                },
                {
                    key: 'header',
                    value: 'Account Information'
                },
                {
                    key: 'mata.demo_account',
                    value: 'Free Demo Account'
                },
                {
                    key: 'min_deposit',
                    value: 'Min. Deposit'
                },
                {
                    key: 'ecn_deposit',
                    value: 'ECN Deposit'
                },
                {
                    key: 'meta.acc_currency',
                    value: 'Account Currency'
                },
                {
                    key: 'meta.max_leverage',
                    value: 'Maximum Leverage'
                },
                {
                    key: 'meta.min_order_vol',
                    value: 'Minimul Order Vol.'
                },
                {
                    key: 'meta.segregeted_acc',
                    value: 'Segregated Account'
                },
                {
                    key: 'islamic_acc',
                    value: 'Islamic Account'
                },
                {
                    key: 'meta.institutional_acc',
                    value: 'Institutional Account'
                },
                {
                    key: 'meta.vip_service',
                    value: 'VIP Service'
                },
                {
                    key: 'pamm_mam',
                    value: 'PAMM / MAM Account'
                },
                {
                    key: 'pamm_mam',
                    value: 'PAMM / MAM Account'
                },
                {
                    key: 'payment_options',
                    value: 'Depoist Option'
                },
                // {
                //     key: 'payment_options',
                //     value: 'Withdrawal Option'
                // }
                {
                    key: 'header',
                    value: 'Trading Terms'
                },
                {
                    key: 'meta.interest_margin',
                    value: 'Interest on Margin'
                },
                {
                    key: 'meta.os_compatibility',
                    value: 'OS Compatibility'
                },
                {
                    key: 'meta.news_feed_stream',
                    value: 'Streaming News Feed'
                },
                {
                    key: 'meta.charting_pack',
                    value: 'Charting Package'
                },
                {
                    key: 'meta.trading_signal',
                    value: 'Trading Signal'
                },
                {
                    key: 'meta.market_commentary',
                    value: 'Market Commentary'
                },
                {
                    key: 'trading_platforms',
                    value: 'Trading Platform'
                },
                {
                    key: 'meta.precision_pricing',
                    value: 'Precision Pricing'
                },
                {
                    key: 'spread_types',
                    value: 'Type of Spread'
                },
                {
                    key: 'meta.commission',
                    value: 'Commission'
                },
                {
                    key: 'scalping',
                    value: 'Scalping'
                },
                {
                    key: 'hedging',
                    value: 'Hedging'
                },
                {
                    key: 'expert_advisors',
                    value: 'Expert Advisors'
                },
                {
                    key: 'meta.lowest_spread',
                    value: 'Lowest spread'
                },
                {
                    key: 'trading_instruments',
                    value: 'Trading Instruments'
                },
                {
                    key: 'meta.one_click_execution',
                    value: 'One Click Execution'
                },
                {
                    key: 'meta.oco_orders',
                    value: 'OCO Orders'
                },
                {
                    key: 'meta.managed_acc',
                    value: 'Managed Account'
                },
                {
                    key: 'meta.email_alerts',
                    value: 'Email Alerts'
                },
                {
                    key: 'meta.mobile_alerts',
                    value: 'Mobile Alerts'
                },
                {
                    key: 'meta.trading_tools',
                    value: 'Trailing Stops'
                },
                {
                    key: 'meta.mobile_trading',
                    value: 'Mobile Trading'
                },
                {
                    key: 'meta.web_based_trading',
                    value: 'Web Based Trading'
                },
                {
                    key: 'header',
                    value: 'Customer Support'
                },
                {
                    key: 'meta.customer_service_time',
                    value: 'Customer Service Hours'
                },
                {
                    key: 'meta.trade_close_over_phone',
                    value: 'Place Trades Over the Phone'
                },
                {
                    key: 'meta.customer_support_lang',
                    value: 'Customer Support Lang'
                },
                {
                    key: 'meta.email_phone_support',
                    value: 'Email+Phone support'
                },
                {
                    key: 'meta.personal_acc_manager',
                    value: 'Personal Account Manager'
                },
                {
                    key: 'meta.customer_service_time',
                    value: 'Email Response time'
                },
                {
                    key: 'header',
                    value: 'Promotion'
                },
                {
                    key: 'no_deposit_bonus',
                    value: 'No Deposit Bonus'
                },
                {
                    key: 'first_deposit_bonus',
                    value: 'Bonus for First Deposit'
                },
                {
                    key: 'free_vps',
                    value: 'Bonus for First Deposit'
                },
                {
                    key: 'meta.trading_tools',
                    value: 'Trading Tools'
                },
                {
                    key: 'meta.other_promotion',
                    value: 'Other Promotion'
                },
                {
                    key: 'meta.trade_close_over_phone',
                    value: 'Close trade over the phone'
                },
                {
                    key: 'remove',
                    value: 'Remove'
                }
                
            ],
            brokerToBeCompare: [],
            numberOfBrokerInCompareWidget: 0,
            comparable: false
        }
    },
    created () {
        this.init()
    },
    mounted() {
        EventBus.$on('removeFromCompareTable', (slug) => {
            slug = slug || false
            this.removeEventEmitedFromCompare = true
            if (slug) {
                this.remove(slug)
            } else {
                window.location.href=InvestingPartner.app_url+'/forex-broker/compare'
            }
            
        })
    },
    methods: {
        remove (slug) {
           
            EventBus.$emit('clearOneCompare', slug)
            this.brokers = this.brokers.filter(broker => {
                if (broker.slug !== slug) {
                    return true
                }
            })

            let brokersSlug = this.brokers.map(broker => {
                if (broker.slug !== slug) {
                    return broker.slug
                }
            })

            // console.log(brokersSlug)

            document.cookie = "broker[0]=" + "; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
            document.cookie = "broker[1]=" + "; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
            document.cookie = "broker[2]=" + "; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";

            brokersSlug.map((slug, index) => {
                document.cookie = "broker[" + index + "]="+slug+"; path=/"
            })

            let endPoint = InvestingPartner.app_url + '/forex-broker/compare?brokers=' + brokersSlug.join(',')
             // window.history.replaceState('', '', endPoint)

            this.numberOfBrokerInCompareWidget = this.brokers.length

            this.comparable = this.numberOfBrokerInCompareWidget > 1 ? true : false

            if (!this.removeEventEmitedFromCompare) {
                EventBus.$emit('updateCompare')
            }
        },
        init () {
            
            let location = window.location.href;
            if (location.indexOf('?brokers=') !== -1) {
                this.brokerToBeCompare = location.split('=')[1].replace(/(^,)|(,$)/g, "").split(',')

                this.numberOfBrokerInCompareWidget = this.brokerToBeCompare.length
                this.comparable = this.numberOfBrokerInCompareWidget > 1 ? true : false
            }

            if (!this.comparable) {
                return
            }

            document.cookie = "broker[0]=" + "; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
            document.cookie = "broker[1]=" + "; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
            document.cookie = "broker[2]=" + "; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";

            this.brokerToBeCompare.map((slug, index) => {
                document.cookie = "broker[" + index + "]="+slug+"; path=/"
            })

            axios.get('/forex-brokers', {
                                        params: {
                                            'brokers': this.brokerToBeCompare.join(','),
                                            'all': true
                                            }
                                        })
                .then(response => {
                    if (response.status === 200) {
                        this.brokers = response.data
                        // below code required while working with review/rating
                        // this.brokers = response.data
                        // this.brokers = response.data.map(broker => {
                        //     // broker.rating = 0.0
                        //     // console.log(broker.review)
                        //     // var length = broker.reviews.length
                        //     // if (length > 0) {
                        //     //     let reviews = broker.reviews.map(review => {
                        //     //         return parseFloat(review.rating11)
                        //     //     })
                        //     //     const reducer = (accumulator, currentValue) => accumulator + currentValue;
                        //     //     broker.rating = reviews.reduce(reducer)/length
                        //     // }
                        //     // return broker
                        // })
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        },
    }
}
</script>

<style lang="scss">
    .btn-remove[disabled="disabled"]:hover {
        color: white;
        background-color: #434343
    }
</style>