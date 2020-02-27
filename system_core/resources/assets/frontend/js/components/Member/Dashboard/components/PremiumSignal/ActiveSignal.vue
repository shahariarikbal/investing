<template>
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 25px">
            <div class="title-container">
                <h2 class="forex-header-second" style="font-size: 18px;">
                    <span>CURRENT ACTIVE SIGNAL</span>
                </h2>
                <timezone />
            </div>
            <div class="sm-btn-holder clearfix"></div>
            <div class="table-responsive">
                <table class="table table-bordered text-center" v-if="signals.length > 0">
                    <thead style="background: #6c757d;color:#fff;font-weight:300;">
                        <tr>
                            <th scope="col">Symbol</th>
                            <th scope="col">Signal Time</th>
                            <th scope="col">Order Type</th>
                            <th scope="col">TP</th>
                            <th scope="col">SL</th>
                            <th scope="col">Time Ago</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr :class="signal.type" v-for="signal in signalPages[currentPage - 1]" :key="signal.id">
                            <td>
                                <currency-display :signal="signal" />
                            </td>
                            <td>
                                {{ signal.signal_time | moment("llll") }}
                            </td>
                            <td>
                                {{ signal.signal_type_display }}
                            </td>
                            <td v-text="signal.take_profit"></td>
                            <td v-text="signal.stop_loss"></td>
                            <td>
                                <time-ago :date="new Date(signal.signal_time)" :mini="true" />
                            </td>
                            <td>
                                <img :src="`${InvestingPartner.app_url}/assets/images/36.gif`" width="50px" height="7px" class="mt-2 mr-3" />
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div v-else class="alert alert-warning" role="alert">No active signal found</div>
            </div>
            <paginate
                v-if="pageCount > 1"
                :page-count="pageCount"
                v-model="currentPage"
                :prev-text="'Prev'"
                :next-text="'Next'"
                :container-class="'pagination justify-content-center'"
                >
            </paginate>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'

    import TimeAgo from './../../../../Time/Timeago'
    import PrityDate from './../../../../Time/PrityDate'
    
    export default {
        data () {
            return {
                signals: [],
                signalPages: [],
                perPage: 5,
                pageCount: 1,
                currentPage: 1
            }
        },
        components: { TimeAgo, PrityDate },
        created() {
            this.getSignals()

            EventBus.$on('timezone', payload => {
                // console.log(payload.timeFormat)
                // console.log(payload.timezone)

                var options = { timeZone: payload.timezone, weekday: 'short', year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric' }

                if(payload.timeFormat == 12) options.hour12 = true
                if(payload.timeFormat == 24) options.hour12 = false

                this.signals.map(signal => {
                    signal.signal_time = new Date(moment.utc(signal.signal_time)).toLocaleString("en-US", options)
                    signal.signal_valid = signal.valid_till ? new Date(moment.utc(signal.valid_till)).toLocaleString("en-US", options) : null
                })

                this.signalPages = _.chunk(this.signals, this.perPage)
                this.pageCount = this.signalPages.length
                
            })
        },
        methods: {
            setCurrentPage (page) {
                this.currentPage = page
            },
            getSignals () {
                axios.post('/api/member/premium-signals')
                    .then(response => {
                        this.signals = response.data

                        var options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric' };
                        
                        if(localStorage.getItem("timeformat") == 12) options.hour12 = true
                        if(localStorage.getItem("timeformat") == 24) options.hour12 = false
                        if(localStorage.getItem("timezone") !== null) options.timeZone = localStorage.getItem("timezone")

                        this.signals = this.signals.map(signal => {
                            signal.signal_time = new Date(moment.utc(signal.signal_time)).toLocaleString("en-US", options)
                            signal.signal_valid = signal.valid_till ? new Date(moment.utc(signal.valid_till)).toLocaleString("en-US", options) : null  
                            return signal
                        })

                        this.signals = this.signals.sort((a, b) => {
                            return b.id - a.id
                        })
                        this.signalPages = _.chunk(this.signals, this.perPage)
                        this.pageCount = this.signalPages.length
                    })
                    .catch(error => {
                        console.log(error)
                        if ([500, 503, 504].find((error_code) => { return error_code === error.response.status }) !== undefined) {
                            setTimeout(() => { 
                                this.getSignals()
                            }, 5000);
                        }
                        console.log(error)
                    })
            }
        }
    }
</script>

<style lang="scss" scoped>
    tbody > tr {
        background: #e2e3e5;
    }
    .buy {
        background: #d4edda;
    }
    .sell {
        background: #f8d7da;
    }
    
</style>

<style lang="scss">
    #setTimeZone {
        background: var(--primary);
        color: #fff;
        padding: 1px 7px;
        border-radius: 2px;
        display: inline-block!important;
        margin: 4px 0 2px;
        font-size: 14px;
        box-shadow:none!important;
        transition:0.3s;
    }
    #saveSetting {
        background: #6c757d;
    color: #fff;
    padding: 0 7px;
    border-radius: 2px;
    font-size: 12px;
    box-shadow: none !important;
    transition: 0.3s;
    height: 40px;
    border: 1px solid #6c757d;
    }
</style>