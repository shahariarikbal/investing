<template>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" id="seconddiv">
        <div class="drop-shadow">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <span>All Support Tickets</span>
                            <RouterLink
                                :to="{ name: 'new-support-ticket' }"
                                class="btn btn-info btn-sm float-right"
                            >
                                New Support Ticket
                            </RouterLink>
                        </div>

                        <div class="card-body ticket-container">
                            <!-- <RouterView v-if="$route.name === 'new-support-ticket'" /> -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="row dashboard-info-heading-bar">
                                        <div class="col-3 custom-div">
                                            <span>Department</span>
                                        </div>
                                        <div class="col custom-div">
                                            <span>Subject</span>
                                        </div>
                                        <div class="col-2 custom-div">
                                            <span>Status</span>
                                        </div>
                                        <div class="col-3 custom-div">
                                            <span>Last update</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="padding: 1.25rem">
                                    <div
                                        class="tickets"
                                        v-if="tickets.length > 0"
                                    >
                                        <support-ticket-single
                                            v-for="ticket in pages[currentPage]"
                                            :key="ticket.id"
                                            :data="ticket"
                                        ></support-ticket-single>
                                    </div>
                                    <div v-else>
                                        <div
                                            class="alert alert-warning"
                                            role="alert"
                                        >
                                            No ticket found
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <paginate
                                        v-if="pageCount > 1"
                                        :page-count="pageCount"
                                        :click-handler="page"
                                        :prev-text="'Prev'"
                                        :next-text="'Next'"
                                        :container-class="'pagination'"
                                    >
                                    </paginate>
                                    <!-- <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                                            <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav> -->
                                </div>
                            </div>

                            <RouterView />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SupportTicketSingle from "./TicketEach";
import Paginate from "vuejs-paginate";
export default {
    data() {
        return {
            tickets: [],
            displayNewTicketInput: false,
            newTicket: "",
            perPage: 3,
            currentPage: 0,
            pages: [],
            pageCount: 0
        };
    },
    components: { SupportTicketSingle, Paginate },
    computed: {
        NewTicketInputStyle() {
            if (this.displayNewTicketInput) {
                return "display: block";
            }
            return "display: none";
        }
    },
    created() {
        axios
            .post("/api/member/support-tickets")
            .then(response => {
                this.tickets = response.data;
            })
            .catch(error => {
                console.log(error);
            });
    },
    watch: {
        tickets() {
            this.pages = _.chunk(this.tickets, this.perPage);
            this.pageCount = this.pages.length - 1;
        }
    },
    mounted() {
        EventBus.$on("ticket-created", payload => {
            this.tickets.push(payload);
        });
    },
    methods: {
        page(number) {
            this.currentPage = number;
        }
    }
};
</script>

<style lang="scss">
.ticket-container {
    padding: 0;
}

.dashboard-info-heading-bar {
    margin: 0;
}

.dashboard-info-heading-bar .custom-div {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    background-color: #343a40;
    border: 1px solid #454d55;
}

.dashboard-info-heading-bar .custom-div span {
    color: #fff;
    font-weight: 600;
    display: block;
    text-align: center;
    text-transform: uppercase;
}

.bidings .row {
    border-bottom: 1px solid #ddd;
}

.bidings .row .custom-div {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    border-right: 1px solid #ddd;
}

.bidings .row .custom-div:first-child {
    border-left: 1px solid #ddd;
}

.bidings .row:first-child {
    border-top: 1px solid #ddd;
}
.clickable,
.pointer {
    cursor: pointer;
}

.tickets .ticket {
    margin: 0;
    background-color: #fff;
    border-top: 1px solid #ddd;
}
.tickets .ticket:last-child {
    border-bottom: 1px solid #ddd;
}
.tickets .ticket > .row {
    margin: 0;
}
.tickets .custom-div {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    border-right: 1px solid #ddd;
}
.tickets .custom-div:first-child {
    border-left: 1px solid #ddd;
}
.pagination li a {
    background-color: #343a40;
    font-size: 12px;
    &:hover {
        color: #ffffff;
        background: #212529;
    }
}
</style>
