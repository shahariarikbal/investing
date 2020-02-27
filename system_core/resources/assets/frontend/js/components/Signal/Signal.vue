<template>
    <div>
        <div :class="cardClass">
            <div class="row ">
                <!--Header div start-->
                <div class="col-md-12">
                    <div class="lhsize4" style="position: relative">
                        <span>
                            <strong>
                                <currency-display :signal="signal" />
                            </strong>
                            <span class="sig-category">{{ signal.categories.name }}</span>
                        </span>
                    </div>
                </div>
            </div>
            <!--Header div end-->
            <div class="row lhsize1  ml-0 mr-0 downborder">
                <!--1st list start-->
                <div class="col-md-6 col-sm-6 col">
                    <span> {{ signal.currency_name }} signal: </span>
                </div>
                <div class="col-md-6 col-sm-6 col text-md-right ">
                    <span class="ml-auto badge badge-success badge-time-ago"><timeago :date="time" locale="en-US"></timeago></span>
                </div>
            </div>
            <!--1st list start-->
            <!--2nd list start-->
            <div class="row lhsize1 ml-0 mr-0 downborder ">
                <div class="col-md-6 col-sm-6 col">
                    <span class="left-side ">Signal Time: </span>
                </div>
                <div class="col-md-6 col-sm-6 col text-md-right">
                    <span v-text="signal_time" class="ml-auto badge badge-success"></span>
                </div>
            </div>
            <!--2nd list end-->
            <div class="row lhsize1 ml-0 mr-0 downborder">
                <div class="col-md-4 col-sm-4 col">
                    <span class="left-side ">Valid Till: </span>
                </div>
                <div class="col-md-8 col-sm-8 col text-md-right">
                    <span v-if="signal_valid" v-text="signal_valid" class="ml-auto badge badge-success"></span>
                    <span v-else class="ml-auto badge badge-dark">Not Specified</span>
                </div>
            </div>
            <div class="row lhsize1 ml-0 mr-0 downborder">
                <div class="col-md-5 col-sm-5 col">
                    <span class="left-side " v-text="sale_buy_at"></span>
                </div>
                <div class="col-md-7 col-sm-7 col text-md-right">
                    <span>{{ signal.price }}</span>
                </div>
            </div>
            <div class="row lhsize1 ml-0 mr-0 downborder">
                <div class="col-md-5 col-sm-5 col">
                    <span class="left-side "> Take profit* at:</span>
                </div>
                <div class="col-md-7 col-sm-7 col text-md-right">
                    <span>{{ signal.take_profit }}</span>
                </div>
            </div>
            <div class="row lhsize1 ml-0 mr-0 downborder">
                <div class="col-md-5 col-sm-5 col ">
                    <span class="left-side ">Stop loss at: </span>
                </div>
                <div class="col-md-7 col-sm-7 col text-md-right">
                    <span>{{ signal.stop_loss }}</span>
                </div>
            </div>
            <div class="row  ml-0 mr-0 downborder lhsize1">
                <div class="col-md-5 col-sm-5 col ">
                    <span class="left-side ">Check Analysis: </span>
                </div>
                <div class="col-md-7 col-sm-7 col text-md-right">
                    <a href="#" class="modalimg" :data-id="signal.id" :data-attachment="signal.attachment" data-toggle="modal" data-target="#analysis" v-if="signal.attachment">
                        <div class="badge badge-primary9" @click="checkAnalysis">Check</div>
                        <analysis :attachment="signal.attachment" :show="showModal" v-on:close="close" />
                    </a>
                    <div class="badge badge-primary9" v-else>N/A</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="lhsize4" :style="xStyle" @click="expandNote = !expandNote">
                        <transition name="fade">
                            <div v-if="signal.notes !== null && signal.notes.length > 0">
                                <span v-if="expandNote == false"><i class="fas fa-plus"></i></span>
                                <span v-if="expandNote"><i class="fas fa-minus"></i></span>
                            </div>
                        </transition>
                        <span class="text-center">
                            <strong>SIGNAL NOTE</strong>
                        </span>
                        
                        <transition name="fade">
                            <div v-if="signal.notes !== null && signal.notes.length > 0">
                                <span v-if="expandNote == false"><i class="fas fa-plus"></i></span>
                                <span v-if="expandNote"><i class="fas fa-minus"></i></span>
                            </div>
                        </transition>
                    </div>
                    <div style="background: white;margin-bottom: -10px;" v-if="signal.notes !== null && signal.notes.length > 0 && expandNote">
                        <transition name="fade">
                            <div>
                                <p v-text="signal.notes"></p>
                            </div>
                        </transition>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-12 text-center">
                    <div :class="status.className" style="display: flex; justify-content: space-around;">
                        <span>
                            <strong v-text="status.text"></strong>
                        </span>
                        <span v-if="filledTime">
                            <strong v-text="filledTime"></strong>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    import analysis from './../Modal/Analysis'
    import timeago from './../Time/Timeago'
    import CurrencyDisplay from '@p/CurrencyDisplay'

    export default {
        props: [ 'signal', 'timezone'],
        components: { analysis, timeago, CurrencyDisplay },
        data () {
            return {
                status: {
                    text: '',
                    className: ''
                },
                cardClass: 'card',
                showModal: false,
                sale_buy_at: '',
                signalData: this.signal,
                signal_time: this.signal.signal_time,
                signal_valid: this.signal.valid_till,
                expandNote: false,
                filledTime: null
            }
        },

        computed: {

                time() {
                    return moment.utc(this.signalData.signal_time)
                },
                xStyle () {
                    if (this.signal.notes !== null && this.signal.notes.length > 0) {
                    return "background: rgb(53, 53, 53); color: white; display:flex; justify-content: space-between; padding: 0 1rem; cursor: pointer";
                    } else {
                    return "background: rgb(53, 53, 53); color: white; display:flex; justify-content: center; padding: 0 1rem; cursor: pointer";
                    }
                    
                }
            },

        mounted() {
            this.signalData = this.signal
            var options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric' };
        
            if(localStorage.getItem("timeformat") == 12) options.hour12 = true
            if(localStorage.getItem("timeformat") == 24) options.hour12 = false

            if(localStorage.getItem("timezone") !== null) options.timeZone = localStorage.getItem("timezone")


            this.signal_time = new Date(moment.utc(this.signalData.signal_time)).toLocaleString("en-US", options)
            this.signal_valid = this.signalData.valid_till ? new Date(moment.utc(this.signalData.valid_till)).toLocaleString("en-US", options) : null  

        },

        watch: {
            'timezone.timezone': function(newValue) {
                console.log(newValue)
                var options = { timeZone: newValue, weekday: 'short', year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric' }

                this.signal_time = new Date(moment.utc(this.signalData.signal_time)).toLocaleString("en-US", options)
                this.signal_valid = this.signalData.valid_till ? new Date(moment.utc(this.signalData.valid_till)).toLocaleString("en-US", options) : null

                // filled time converted with timezone settings
                this.filledTime = new Date(moment.utc(this.signalData.updated_at)).toLocaleString("en-US", options)
            },
            // 'timezone.timeFormat': function(newValue) {
            //     var options = { timeZone: localStorage.getItem("timezone"), weekday: 'short', year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric' }

            //     if(newValue == 12) options.hour12 = true
            //     if(newValue == 24) options.hour12 = false
                
            //     this.signal_time = new Date(moment.utc(this.signalData.signal_time)).toLocaleString("en-US", options)
            //     this.signal_valid = this.signalData.valid_till ? new Date(moment.utc(this.signalData.valid_till)).toLocaleString("en-US", options) : null
            // },
            'signalData.type': function(newValue) {
                if(newValue === 'buy') {
                this.cardClass = 'card buy'
                this.sale_buy_at = 'Buy at'
                }

                if(newValue === 'sell') {
                this.cardClass = 'card sell'
                this.sale_buy_at = 'Sell at'
                }

                if(newValue === 'buy limit') {
                this.sale_buy_at = 'Buy limit at'
                this.cardClass = 'card other'
                }
                if(newValue === 'sell limit') {
                this.sale_buy_at = 'Sell limit at'
                this.cardClass = 'card other'
                }
                if(newValue === 'buy stop') {
                this.sale_buy_at = 'Buy stop at'
                this.cardClass = 'card other'
                }
                if(newValue === 'sell stop') {
                this.sale_buy_at = 'Sell stop at'
                this.cardClass = 'card other'
                }
            }
        },
       
        methods: {
            checkAnalysis () {
                this.showModal = true
            },
            close () {
                this.showModal = false
            },
        },

        created() {
            //console.log(this.signalData.type)

            EventBus.$on('timezone', payload => {
                // console.log(payload.timeFormat)
                // console.log(payload.timezone)

                var options = { timeZone: payload.timezone, weekday: 'short', year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric' }

                if(payload.timeFormat == 12) options.hour12 = true
                if(payload.timeFormat == 24) options.hour12 = false

                this.signal_time = new Date(moment.utc(this.signalData.signal_time)).toLocaleString("en-US", options)
                this.signal_valid = this.signalData.valid_till ? new Date(moment.utc(this.signalData.valid_till)).toLocaleString("en-US", options) : null

                if (this.signalData.status === 'filled') {
                    // filled time converted with timezone settings
                    this.filledTime = new Date(moment.utc(this.signalData.updated_at)).toLocaleString("en-US", options)
                }
                
            })

            this.cardClass = 'card other'

            if(this.signalData.type === 'buy') {
                
                this.sale_buy_at = 'Buy at'
                if (this.signalData.status === 'active') this.cardClass = 'card buy'
            }
            if(this.signalData.type === 'sell') {
                this.sale_buy_at = 'Sell at'
                if (this.signalData.status === 'active') this.cardClass = 'card sell'
            }

            if(this.signalData.type === 'buy_limit') {
                this.sale_buy_at = 'Buy limit at'
                if (this.signalData.status === 'active') this.cardClass = 'card other'
            }
            if(this.signalData.type === 'sell_limit') {
                this.sale_buy_at = 'Sell limit at'
                if (this.signalData.status === 'active') this.cardClass = 'card other'
            }
            
            if(this.signalData.type === 'buy_stop') {
                this.sale_buy_at = 'Buy stop at'
                if (this.signalData.status === 'active') this.cardClass = 'card other'
            }
            if(this.signalData.type === 'sell_stop') {
                this.sale_buy_at = 'Sell stop at'
                if (this.signalData.status === 'active') this.cardClass = 'card other'
            }

            if(this.signalData.status == 'filled') {
                this.status.text = 'FILLED (' + (this.signalData.profit == 1 ? "+" : "-") + this.signalData.pips + " Pips)"
                // this.status.className = 'lhsizeone'
                this.status.className = 'lhsizefive'

                // filled time converted with timezone settings
                var options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric' };
                if(localStorage.getItem("timeformat") == 12) options.hour12 = true
                if(localStorage.getItem("timeformat") == 24) options.hour12 = false
                if(localStorage.getItem("timezone") !== null) options.timeZone = localStorage.getItem("timezone")
                
                this.filledTime = new Date(moment.utc(this.signalData.updated_at)).toLocaleString("en-US", { month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric' })
            }

            if(this.signalData.status == 'cancel') {
                this.status.text = 'CANCELED'
                this.status.className = 'lhsizetwo'
            }

            if(this.signalData.status == 'expired') {
                this.status.text = 'EXPIRED'
                this.status.className = 'lhsizethree'
            }

            if(this.signalData.status == 'active') {
                this.status.text = 'ACTIVE'
                this.status.className = 'lhsizefour'
            }
        },
    }
</script>

<style>
    .lhsizefive {
        background: #010047;
        color: #fff;
    }
    .active-color {
    background-color: #4caf50;
    color:#fff;
  }
  .fill-color {
    background-color: rgb(19, 132, 150);
    color:#fff;
  }
  .cancel-color {
    background-color: #f44336;
    color:#fff;
  }
  .expire-color {
    background-color: #fd9004;
    color:#fff;
  }
  .check-bg {
    background: black
  }

  .row.no-mr.downborder.check-bg {
    width: 100%;
    margin-left: 0px;
  }
  .signal-each-row {
    font-size: 12px;
    line-height: 21px;
    color: #3a3838;
    background-color: none !important;
  }
  .sell {
    background: #dca5a9 !important;
  }
  .buy {
    background: #a0c5a8 !important;
  }
  .other {
    background-color: #ccc !important;
  }
  .capitalize {
    text-transform: uppercase;
    font-weight: 700;
  }
  .badge-time-ago {
    text-transform: uppercase;
    font-weight: 700;
  }
  .blod {
    font-weight: 700;
  }
  .lhsizefive {
    background: #010047;
    color: #fff;
  }

  .fade-enter-active, .fade-leave-active {
    transition: opacity .1s;
    transition: height .3s;
  }
  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
    height: 0;
  }
</style>