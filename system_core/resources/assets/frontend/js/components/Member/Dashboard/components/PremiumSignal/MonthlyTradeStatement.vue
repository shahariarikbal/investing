<template>
    <div class="row">
        <div class="col-md-12">
            <div class="title-container">
                <h2 class="forex-header-second" style="font-size: 18px;">
                    <span>monthly trade statement</span>
                </h2>
            </div>
        </div>
        <div class="col-md-12" v-if="signals.length > 0">
            <span class="float-right badge badge-info p-2 mb-1" style="font-size: 0.8rem;">Gained: {{ gainedPips }} PIPS in {{ lastMonth }}</span>
       
            <div class="table-responsive">
                <table class="table table-bordered text-center table-hover">
                    <thead style="background: #6c757d;color:#fff;font-weight:300;">
                        <tr>
                            <th scope="col">Date, Time</th>
                            <th scope="col">Symbol</th>
                            <th scope="col">Order</th>
                            <th scope="col">Price</th>
                            <th scope="col">TP</th>
                            <th scope="col">SL</th>
                            <th scope="col">Status</th>
                            <th scope="col">Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr :class="signal.type" v-for="(signal, index) in signalPages[currentPage - 1]" :key="index">
                            <td>
                                <RouterLink 
                                    :to="{ name: 'individual-signal', params: { currency: signal.currency_name, id: signal.id } }"
                                    @click.native="setIndividualSignalDisplayStatus(signal)">
                                    {{ signal.signal_time | moment("llll") }}
                                </RouterLink>
                            </td>
                            <td>
                                <currency-display :signal="signal" />
                            </td>
                            <td>{{ signal.signal_type_display }}</td>
                            <td style="text-align: right">{{ signal.price.toFixed(2) }}</td>
                            <td style="text-align: right">{{ signal.take_profit.toFixed(2) }}</td>
                            <td style="text-align: right">{{ signal.stop_loss.toFixed(2) }}</td>
                            <td>{{ signal.status }}</td>
                            <td>{{ signal.profit ? '+' : '-' }}{{ signal.pips }} Pips</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-12" v-else>
            <div class="alert alert-warning" role="alert">No signal found on previous month</div>
        </div>

        <div class="col-md-12" v-if="pageCount > 1">
            <paginate
                :page-count="pageCount"
                v-model="currentPage"
                :prev-text="'Prev'"
                :next-text="'Next'"
                :container-class="'pagination justify-content-center'"
                >
            </paginate>
        </div>

        <div v-if="individualSignalDisplay">
            <RouterView :signal="signal" />
        </div>

        <alert-modal v-if="AlertModalDisplayStatus" :message="message" />
    </div>
</template>

<script>
    import AlertModal from './../../../Auth/AlertModal'
    export default {
        data () {
            return {
                gainedPips: 0,
                signals: [],
                signalPages: [],
                signal: {},
                perPage: 5,
                pageCount: 1,
                currentPage: 1,
                individualSignalDisplay: false,

                AlertModalDisplayStatus: false,
                message: '',
                lastMonth: ''
            }
        },

        components: { AlertModal },

        created () {
            this.lastMonthSignal()
        },

        mounted() {
            EventBus.$on('individualSignalDisplay', payload => {
                this.individualSignalDisplay = payload
                this.$router.push({ name: 'premium-signal' })
            })
        },

        methods: {
            setIndividualSignalDisplayStatus (signal) {
                this.signal = signal
                this.individualSignalDisplay = true
            },
            setCurrentPage (page) {
                this.currentPage = page
            },
            lastMonthSignal () {
             
                axios.post('/api/member/premium-signal/last-month-signals')
                    .then(response => {
                        let profitPips = 0
                        let lossPips = 0
                        this.signals = response.data.map(signal => {
                            if (signal.profit) {
                                profitPips += parseFloat(signal.pips)
                            }
                            else {
                                lossPips += parseFloat(signal.pips)
                            }
                            return signal
                        })

                        this.signals = this.signals.sort((a, b) => {
                            return b.id - a.id
                        })
                        this.signalPages = _.chunk(this.signals, this.perPage)
                        this.pageCount = this.signalPages.length

                        this.gainedPips = profitPips - lossPips

                        const monthNames = ["January", "February", "March", "April", "May", "June",
                                            "July", "August", "September", "October", "November", "December"
                                            ];

                        let day = new Date(this.signals[0].created_at)
                        this.lastMonth = monthNames[day.getMonth()] + ', ' + day.getFullYear()


                        if (this.$route.params.hasOwnProperty('currency') && this.$route.params.hasOwnProperty('id')) {
                        
                            let self = this
                            let index = this.signals.findIndex(signal => {
                                return self.$route.params.id==signal.id
                            })
                            if (index !== -1) {
                                this.signal = this.signals[index]
                                this.individualSignalDisplay = true
                            } else {
                                this.flash('The signal you are requesting to see, is not in you last month signal list', 'warning')
                                this.$router.push({ name: 'premium-signal' })
                            }
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
                
            }
        }
    }
</script>