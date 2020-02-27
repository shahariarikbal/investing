<template>
    <div>
        <section class="broker-catagory">
        <!-- 
            <div class="d-none d-sm-none d-md-block" style="position: fixed;top: 50%;right: 0;transform: translate(0, -50%);z-index:2;">
                <a href="/forex-broker/selection-guide" target="_blank" style="-webkit-writing-mode: vertical-rl;-ms-writing-mode: tb-rl; writing-mode: vertical-rl; background: #dc3545; color: #fff; padding: 1rem 0.5rem; border-radius: 4px; font-size: 16px; letter-spacing: 1px;">
                    Search Suitable Broker
                </a>
            </div>
            -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="row">
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-8 leftBar">
                                <div id="sidebar">
                                    <div class="sidebar-header drop-shadow pt-0 pl-1 pr-1">
                                        <div class="d-flex flex-column mb-3">
                                            <div class="mb-2 link-button">
                                                <a href="#">
                                                    <div>
                                                        <span class="text-btn">all forex brokers</span>
                                                        <span class="check-btn"><i class="fas fa-check"></i></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="mb-2 link-button">
                                                <a href="#">
                                                    <div>
                                                        <span class="text-btn">CFD Forex Brokers</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="mb-2 link-button">
                                                <a href="#">
                                                    <div>
                                                        <span class="text-btn">Binary Options Brokers</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="mb-2 link-button">
                                                <a href="#">
                                                    <div>
                                                        <span class="text-btn">Social Trading Brokers</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="mb-2 link-button">
                                                <a href="#">
                                                    <div>
                                                        <span class="text-btn">Crypto Forex Brokers</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                
                                        <button 
                                            class="btn btn-block btn-warning" 
                                            style="background: #ff9800; color: white; border: #ff9800; border-radius: 4px"
                                            v-if="grandReset"
                                            @click="resetAll">Reset All
                                        </button>
                                        <combo-search-area 
                                            paramSourceEndpoint="/forex-broker/category-parameters" 
                                            paramKey="search by category" 
                                            key="category"
                                            @search="search" />
                                        
                                        <combo-search-area 
                                            paramSourceEndpoint="/forex-broker/regulation-parameters" 
                                            paramKey="search by regulation" 
                                            key="authority"
                                            @search="search" />

                                        <combo-search-area 
                                            paramSourceEndpoint="/forex-broker/countries" 
                                            :isFlaged="true" 
                                            paramKey="search by country" 
                                            key="country"
                                            @search="search" />

                                        <combo-search-area 
                                            paramSourceEndpoint="/forex-broker/payment-method-parameters"   
                                            paramKey="search by payment method"    
                                            key="payment"
                                            @search="search" />

                                        <combo-search-area 
                                            paramSourceEndpoint="/forex-broker/trading-platform-parameters" 
                                            paramKey="search by trading platform" 
                                            key="platform"
                                            @search="search" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-10">
                                <div class="d-flex flex-column drop-shadow mb-3">
                                    <div class="broker-title mb-4 mt-2">
                                        <span id="sidebarCollapse" class=" position-absolute d-xl-none d-block">
                                            <i class="fas fa-bars fa-2x"></i>
                                        </span>
                                        <h1>Forex Broker Reviews</h1>
                                        <span class="text-center d-block text-4 font-weight-500 mt-2 text-uppercase">
                                            <i>best forex broker - 2020</i>
                                        </span>
                                    </div>
                                    <div class="search-bar position-relative mb-2">
                                        <i class="fas fa-search"></i>
                                        <input type="text" v-model="title" class="form-control" placeholder="Search...">
                                    </div>
                                    <div class="table-responsive" style="overflow-x:inherit;">
                                        <table class="table table-bordered table-striped text-center forex-broker-table">
                                        <thead class="thead-dark text-uppercase">
                                        <tr>
                                            <th class="display-none">rank</th>
                                            <th>broker</th>
                                            <th>review</th>
                                            <th class="display-none">Country</th>
                                            <th class="display-none">max leverage</th>
                                            <th class="display-none">platform</th>
                                            <th class="display-none">min deposit</th>
                                            <th>info</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(broker, index) in brokersBucket" :key="broker.id" :class="{ 'premium-broker-bg': broker.premium }">
                                            <td class="position-relative display-none">
                                                <div class="numbers-position">
                                                    <span><i class="fa fa-bookmark fa-3x text-numbers"></i></span>
                                                    <span class="numbers">{{ index+1 }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="broker-image img-tooltip d-flex flex-column">
                                                        <a href="javascript:void(0)" class="mb-1">
                                                            <img class="broker-logo" :src="`${InvestingPartner.app_url}/broker/logo/125x56-${broker.logo}`" :alt="`logo of ${broker.name}`">
                                                        </a>
                                                        <a href="javascript:void(0)" 
                                                            class="btn btn-sm btn-raised btn-customs reg-btn" 
                                                            onmouseover="this.innerHTML='Click Here';" 
                                                            onmouseout="this.innerHTML='Regulated';" 
                                                            data-toggle="modal" data-target="#myModal001"
                                                            @click="openRegulatedInformation(broker)">Regulated</a>
                                                        <div class="broker-tooltip">
                                                            <div class="broker-info-container">
                                                                <h3>Company Name</h3>
                                                                <p>{{ broker.name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="social-share-icons d-flex flex-column fs-12">
                                                    <star-rating :rating="broker.rating_avg" :increment="0.01" :fixed-points="2" read-only :star-size="20"/>
                                                </div>
                                            </td>
                                            <td class="display-none">
                                                <div class="d-flex flex-column">
                                                    <span :class="`flag-icon flag-icon-${broker.country_code.toLowerCase()} flag-icon-x2`" style="margin: auto"></span>
                                                    <span>{{ broker.country.name }}</span>
                                                </div>
                                            </td>
                                            <td class="display-none"> <span>{{ broker.meta.max_leverage }}</span></td>
                                            <td class="display-none">
                                                <trading-platforms :platforms="broker.trading_platforms" />
                                            </td>
                                            <td class="display-none">
                                                <span>{{ broker.meta.min_leverage }}</span>
                                            </td>
                                            <td>
                                                <div class="broker-btn compare-buttons-area">
                                                    <div class="openAcount">
                                                        <div>
                                                            <a class="btn bg-success" target="_blank" :href="broker.meta.real_acc_link">open trading account</a>
                                                        </div>
                                                        <div>
                                                            <a class="btn bg-success" :href="`${InvestingPartner.app_url}/forex-broker/${broker.slug}`" target="_blank">check broker reviews</a>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <add-to-compare-button :slug="broker.slug" />
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <regulatedInformationModal :broker="regulatedInformations" />
        <compare-widget></compare-widget>
    </div>
</template>

<script>
    import compareWidget from './Widgets/Compare.vue'
    import addToCompareButton from './AddToCompareButton.vue'
    import comboSearchArea from './ComboSearchArea.vue'
    import tradingPlatforms from './TradingPlatforms.vue'
    import regulatedInformationModal from './RegulatedInformationModal.vue'
    import StarRating from 'vue-star-rating'
    
    export default {
        props: {
            brokers: {
                type: Array,
                required: true
            }
        },
        components: { compareWidget, addToCompareButton, comboSearchArea, tradingPlatforms, regulatedInformationModal, StarRating },
        data () {
            return {
                regulatedInformations: {
                    'title': '',
                    'body': ''
                },
                brokersBucket: this.brokers,
                title: '',
                grandReset: false
            }
        },

        created () {
            this.search()
        },

        mounted () {
                this.brokersBucket = this.brokersBucket.map(broker => {
                
                return broker
            })

            EventBus.$on('displayGrandReset', () => {
                this.grandReset = true
            })
        },

        watch: {
            title (value) {
                value.length > 0 ? this.changeUrlParam('title', [value]) : this.removeUrlParam('title')
                this.search()
            }
        },

        methods: {
            resetAll () {
                this.title = ''
                EventBus.$emit('reset')
                this.grandReset = false
            },
            openRegulatedInformation (broker) {
                this.regulatedInformations = broker
                $('#regulated-information-modal').modal('show')
            },
            
            search () {
                
                let title = this.getUrlParam('title') ? this.getUrlParam('title') : null

                let category = this.getUrlParam('category') ? this.getUrlParam('category').split(',') : null
                let authority = this.getUrlParam('authority') ? this.getUrlParam('authority').split(',') : null
                let country = this.getUrlParam('country') ? this.getUrlParam('country').split(',') : null
                let payment = this.getUrlParam('payment') ? this.getUrlParam('payment').split(',') : null
                let platform = this.getUrlParam('platform') ? this.getUrlParam('platform').split(',') : null
                
                
                this.brokersBucket = this.brokers

                if (title) {
                    this.brokersBucket = this.brokersBucket.filter(broker => {
                        if (broker.name.toLowerCase().indexOf(title.toLowerCase()) !== -1) {
                            return true
                        }
                    })
                }

                if (category) {
                    this.brokersBucket = this.brokersBucket.filter(broker => {
                        // console.log(category)
                        if (category.indexOf('swap_free') !== -1) {
                            return broker.islamic_acc
                        }

                        if (category.indexOf('ecn_broker') !== -1) {
                            return broker.ecn_deposit
                        }

                        if (category.indexOf('deposit_bonus') !== -1) {
                            return broker.deposit_bonus
                        }

                        if (category.indexOf('low_spread_broker') !== -1) {
                            return broker.meta.lowest_spread
                        }

                        if (category.indexOf('usa_client_broker') !== -1) {
                            return broker.us_client
                        }

                        if (category.indexOf('high_rated_broker') !== -1) {
                            return broker.rating >= 4.5
                        }

                        if (category.indexOf('stp_broker') !== -1) {
                            let existStatus =  false;
                            for (let i = 0; i < broker.broker_types.length; i++) {
                                if (broker.broker_types[i].slug === 'stp') {
                                    existStatus = true
                                    break;
                                }
                            }
                            if (existStatus) return broker
                        }

                        if (category.indexOf('mm_broker') !== -1) {
                            let existStatus =  false;
                            for (let i = 0; i < broker.broker_types.length; i++) {
                                if (broker.broker_types[i].slug === 'mm') {
                                    existStatus = true
                                    break;
                                }
                            }
                            if (existStatus) return broker
                        }

                        if (category.indexOf('no_deposit_bonus') !== -1) {
                            return broker.deposit_bonus === 0
                        }

                        if (category.indexOf('first_deposit_bonus') !== -1) {
                            return broker.first_deposit_bonus
                        }
                        
                        if (category.indexOf('scalping_broker') !== -1) {
                            return broker.scalping
                        }
                        
                        if (category.indexOf('hedging_broker') !== -1) {
                            return broker.hedging
                        }
                        
                        if (category.indexOf('pamm_mam_account') !== -1) {
                            return broker.pamm_mam !== null
                        }
                        
                        if (category.indexOf('high_leverage_broker') !== -1) {
                            let leverage = broker.meta.max_leverage.split(':')
                            let existStatus =  false;
                            for (var i = 0; i <= leverage.length - 1; i++) {
                                if (parseInt(leverage[i]) > 500) {
                                    existStatus = true
                                    break;
                                }
                            }
                            if (existStatus) return broker
                            // return broker.pamm_mam !== null
                        }
                        
                        if (category.indexOf('trading-signal') !== -1) {
                            return broker.meta.trading_signal
                        }
                        
                        if (category.indexOf('interest_on_margin') !== -1) {
                            return broker.meta.interest_margin
                        }
                        
                        if (category.indexOf('charting_package') !== -1) {
                            return broker.meta.charting_pack
                        }
                        
                        if (category.indexOf('market_commentary') !== -1) {
                            return broker.meta.market_commentary
                        }
                    })
                }
                
                if (authority) {
                
                    this.brokersBucket = this.brokersBucket.filter(broker => {
                        let existStatus =  false;
                        for (let i = 0; i < broker.regulatory_authorities.length; i++) {
                            if (authority.indexOf(broker.regulatory_authorities[i].slug) !== -1) {
                                existStatus = true
                                break;
                            }
                        }
                        if (existStatus) return broker
                    })
                }

                if (country) {
                    this.brokersBucket = this.brokersBucket.filter(broker => {
                        let existStatus =  false;
                    
                        if (country.indexOf(broker.country.code) !== -1) {
                            existStatus = true
                        }

                        if (existStatus) return broker
                    })
                }

                if (payment) {
                    this.brokersBucket = this.brokersBucket.filter(broker => {
                        let existStatus =  false;
                        for (let i = 0; i < broker.payment_options.length; i++) {
                            if (payment.indexOf(broker.payment_options[i].slug) !== -1) {
                                existStatus = true
                                break;
                            }
                        }
                        if (existStatus) return broker
                    })
                }
                
                if (platform) {
                    this.brokersBucket = this.brokersBucket.filter(broker => {
                        let existStatus =  false;
                        for (let i = 0; i < broker.trading_platforms.length; i++) {
                            if (platform.indexOf(broker.trading_platforms[i].slug) !== -1) {
                                existStatus = true
                                break;
                            }
                        }
                        if (existStatus) return broker
                    })
                }
                
            }
        }
    }
</script>

<style scoped>
.compare-buttons-area {
    display: flex;
    text-transform: capitalize;
    align-items: center;
    justify-content: center;
}
 .text-numbers {
     color:var(--gray);
 }
 .btn-customs {
    border-radius: 2px;
    background: #28a745;
    transition: .3s;
    color: #fff;
    text-transform:uppercase;
 }
 .broker-image img {
     width: 125px; 
    border: none; 
    height: 56px;
}
 .open-account-btn {
     background-color:#125f23;
     color: #fff;
    font-size: 12px;
    padding: 0.25rem .50rem;
    width: 100%;
    border-radius: 2px;
    text-transform: uppercase;
 }
 .openAcount {
     margin-right: 0.2rem;
     line-height: 2.3rem;
 }
 .openAcount .bg-success {
    color: #fff;
    width: 100%;
    border-radius: 2px;
    padding: 0.3rem;
    font-size: 12px;
 }
 .see-review-btn {
    background-color:#b52e3b;
    color: #fff;
    font-size: 12px;
    padding: 0.25rem .50rem;
    width: 100%;
    border-radius: 2px;
    text-transform: uppercase;
 }

 span.flag-icon.flag-icon-x2 {
    font-size: 20px;
 }

</style>