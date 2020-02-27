<template>
    <div>
        <div class="card">
            <div class="card-body ticket-details-body">
                <div class="inner" style="background: #fff">
                    <div class="details">
                        <div>
                            <div class="d-flex justify-content-between shadow-sm p-3 mb-3">
                                <!-- <h5 class="card-title" style="text-align: left;">{{ ticket.support_department.name }} - {{ ticket.subject }}</h5> -->
                                <small>ID: #{{ ticket.id }}</small>
                                <span href="" class="badge badge-info clickble p-2" v-if="displayResolveBtn" @click="resolved">Resolved</span>
                            </div>
                            <div class="issue-body">
                                <div v-html="ticket.issue"></div>
                                <div v-if="ticket.attachment">
                                    <h6>Attachment <i class="fas fa-paperclip"></i></h6>
                                    <a :href="attachment" target="_blank">{{ ticket.attachment }}</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <replies :replies="replies" :ticketId="ticket.id" />
                
            </div>
        </div>
    </div>
</template>

<script>
    import Replies from './TicketReplies'
    export default {
        props: [ 'id' ],
        data () {
            return {
                replies: [],
                ticket: ''
                // displayResolveBtn: false
            }
        },
        components: { Replies },
        computed: {
            attachment () {
                return this.ticket.attachment ? `${InvestingPartner.app_url}/storage/support-ticket/${this.ticket.attachment}` : null
            },

            displayResolveBtn () {
                return this.ticket.status === 'open' || this.ticket.status === 'answered'
            }
        },
        created () {
            this.getTicketDetails()
            
            EventBus.$on(`reply-created`, payload => {
                this.replies.unshift(payload)
                console.log('new reply')
            })
        },
        watch: {
            id: function(newId) {
                this.getTicketDetails()
            }
        },
        methods: {
            getTicketDetails () {
                axios.post(`/api/member/support-ticket/${this.id}/details`)
                    .then(response => {
                        this.ticket = response.data
                        this.replies = response.data.replies.reverse()
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            // getReplies () {
            //     axios.post(`/api/member/support-ticket/${this.ticket.id}/replies`)
            //         .then(response => {
            //             this.replies = response.data
            //         })
            //         .catch(error => {
            //             console.log(error)
            //         })
            // },
            resolved () {
                if (window.confirm('Are you sure you want to resolve this issue?')) {
                    axios.post(`/api/member/support-ticket/${this.ticket.id}/resolve`)
                        .then(response => {
                            if (response.status === 204) {
                                alert('Ticket has been resolved')
                                EventBus.$emit(`ticket-resolved-${this.ticket.id}`)
                            }
                        })
                        .catch(error => {
                            console.log(error)
                        })
                }
            }
        }
    }
</script>

<style>
    .ticket-details-body {
        padding: 0.5rem 0.5rem 0.05rem;
        border-top: 1px solid #ddd;
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        background: #c7c7c7;
    }

    .card-title {
        text-transform: inherit !important;
    }

    .issue-body {
        padding: 10px 15px;
    }
    .clickable {
        cursor: pointer;
    }
</style>