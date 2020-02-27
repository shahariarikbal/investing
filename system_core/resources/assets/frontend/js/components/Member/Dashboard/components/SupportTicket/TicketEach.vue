<template>
    <div>
        <div class="ticket">
            <div class="row clickable">
                <div class="col-3 custom-div">
                    <span>{{ ticket.support_department.name }}</span>
                </div>
                <div class="col custom-div">
                    <RouterLink :to="{ name: 'support-ticket-details', params: { id: ticket.id } }">
                        #{{ ticket.id }} - {{ ticket.subject }}
                    </RouterLink>
                    
                </div>
                <div class="col-2 custom-div"><span>{{ ticket.status }}</span></div>
                <div class="col-3 custom-div"><span class="badge badge-info clickble p-2">{{ createdAt }}</span></div>
            </div>
            <!-- <RouterView v-if="ticket.id === $route.params.id" /> -->
            
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    import SupportTicketDetails from './TicketDetails'
    export default {
        props: [ 'data' ],
        components: { SupportTicketDetails },
        data () {
            return {
                ticket: this.data,
                detailsDisplayStatus: false
            }
        },
        created() {
            EventBus.$on('ticket-details-expanded', (payload) => {
                if (payload !== this.ticket.id) {
                    this.detailsDisplayStatus = false
                }
            })

            EventBus.$on(`ticket-resolved-${this.ticket.id}`, () => {
                this.ticket.status = 'resolved'
            })
        },
        computed: {
            createdAt () {
                return moment(this.ticket.created_at).format("MMM Do YYYY, h:mm:ss a")
            }
        },
        methods: {
            expandDetails () {
                this.detailsDisplayStatus = true
                EventBus.$emit('ticket-details-expanded', this.ticket.id)
            }
        }
    }
</script>

<style lang="scss">
    .router-link-exact-active {
        color:#26b6d4;
    }

    .btn.btn-info.router-link-exact-active {
        color: white;
    }
</style>