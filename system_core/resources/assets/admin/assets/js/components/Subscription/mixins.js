import DateRangePicker from 'vue2-daterange-picker'
import 'vue2-daterange-picker/dist/vue2-daterange-picker.css'

import moment from 'moment'

export default {
    data () {
        return {
            subscriptions: [],
            subscriptionPages: [],

            perPage: 10,
            pageCount: 1,
            currentPage: 1,
            message: 'Fetching Subscriptions Data From The Server. Please Wait!',

            searchType: 'status',
            status: '',
            members: [],
            member: '',
            packages: [],
            plan: '',
            paymentMethod: '',

            
        }
    },
    components: { DateRangePicker },
    watch: {
        searchType (value) {
            this.setCurrentPage(1)
            this.generatePages(this.subscriptions)
            this.status = ''
            this.plan = ''
            this.member = ''
            this.paymentMethod = ''
        },
        perPage (value) {
            this.setCurrentPage(1)
            this.generatePages(this.subscriptions)
        },
       
        status (value) {
            this.setCurrentPage(1)
            if (this.status != '') {
                let subscriptions = this.subscriptions.filter(subscription => {
                    return subscription.status == this.status
                })

                 this.generatePages(subscriptions)
            }
        },
       
        member (value) {
            this.setCurrentPage(1)
            if (this.member != '') {
                let subscriptions = this.subscriptions.filter(subscription => {
                    return subscription.member.id == this.member
                })

                this.generatePages(subscriptions)
            }
        },

        plan(value) {
            this.setCurrentPage(1)
            if (this.plan != '') {
                let subscriptions = this.subscriptions.filter(subscription => {
                    return subscription.plan_id == this.plan
                })
                console.log(subscriptions)
                this.generatePages(subscriptions)
            }
        },

        paymentMethod (value) {
            this.setCurrentPage(1)
            if (this.paymentMethod !== '') {
                let subscriptions = this.subscriptions.filter(subscription => {
                    return subscription.payment_method == this.paymentMethod
                })

                this.generatePages(subscriptions)
            }
        },
    },
    methods: {
        setCurrentPage (page) {
            this.currentPage = page
        },
        generatePages (subscription) {
            this.subscriptionPages = _.chunk(subscription, this.perPage)
          
            this.pageCount = this.subscriptionPages.length
            if (this.pageCount === 0) {
                this.message = "Sorry! No Subscription Data Found"
            }
        },
        searchWithDateRangeForStart (payload) {
            let startDate = new Date(payload.startDate)
            let endDate = new Date(payload.endDate)
            let subscriptions = this.subscriptions.filter(subscription => {
                if (moment(new Date(subscription.start_at)) >= moment(startDate).startOf('day') && moment(new Date(subscription.start_at)) < moment(endDate).endOf('day')) {
                    return subscription
                }
            })
            this.generatePages(subscriptions)
        },
        searchWithDateRangeForEnd (payload) {
            let startDate = new Date(payload.startDate)
            let endDate = new Date(payload.endDate)
            let subscriptions = this.subscriptions.filter(subscription => {
                if (moment(new Date(subscription.ends_at)) >= moment(startDate).startOf('day') && moment(new Date(subscription.ends_at)) < moment(endDate).endOf('day')) {
                    return subscription
                }
            })
            this.generatePages(subscriptions)
        }
    }
}
