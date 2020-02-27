<template>
    <div class="drop-shadow mb-2">
        <div class="row">
            <div class="col-md-12">
                <h2 class="font-weight-normal text-5 mb-4">
                    <strong class="font-weight-extra-bold">withdraw </strong
                    >history
                </h2>
                <div class="transaction-entry-field d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div>
                            <span class="mr-1">Show</span>
                        </div>
                        <div>
                            <select
                                class="form-control form-control-xs selectpicker"
                                v-model="perPage"
                            >
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div>
                            <span class="ml-1">entries</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between align-items-center"
                    >
                        <div class="d-flex mr-1">
                            <span>Search:</span>
                        </div>
                        <div class="d-flex mr-1">
                            <select class="form-control" v-model="searchType">
                                <option value="status">Status</option>
                                <option value="payment_method"
                                    >Payment Method</option
                                >
                                <option value="transaction_id"
                                    >Transaction ID</option
                                >
                                <option value="amount">Amount</option>
                                <option value="date">Date</option>
                            </select>
                        </div>
                        <div class="d-flex mr-1">
                            <select
                                class="form-control"
                                style="width: 199px"
                                v-if="searchType === 'status'"
                                v-model="status"
                            >
                                <option value="">Select a status</option>
                                <option value="approved">Approved</option>
                                <option value="unapproved">Pending</option>
                                <option value="cencel">Canacled</option>
                            </select>

                            <select
                                class="form-control"
                                style="width: 199px"
                                v-if="searchType === 'payment_method'"
                                v-model="paymentMethod"
                            >
                                <option value=""
                                    >Select a payment method</option
                                >
                                <option value="paypal">Paypal</option>
                                <option value="perfect-money"
                                    >Perfect Money</option
                                >
                                <option value="neteller">Neteller</option>
                                <option value="skrill">Skrill</option>
                                <option value="bitcoin">Bitcoin</option>
                            </select>

                            <input
                                type="text"
                                class="form-control"
                                v-if="
                                    searchType === 'transaction_id' ||
                                        searchType === 'amount'
                                "
                                v-model="search"
                                :placeholder="searchPlaceholder"
                            />

                            <date-range-picker
                                v-if="searchType === 'date'"
                                v-model="dateRange"
                                opens="left"
                                :linked-calendars="true"
                                :showWeekNumbers="true"
                                :showDropdowns="true"
                                :autoApply="true"
                                @update="searchWithDateRange"
                            ></date-range-picker>
                        </div>
                    </div>
                </div>

                <table
                    class="table text-center table-bordered"
                    v-if="withdrawPages.length > 0"
                >
                    <thead class="thead-dark text-uppercase">
                        <tr>
                            <th>Date</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Transaction Id</th>
                            <th scope="col">Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="withdraw in withdrawPages[currentPage - 1]" :key="withdraw.id">
                            <td>{{ withdraw.created_at | moment('llll') }}</td>
                            <td>
                                <payment-processor
                                    :image="true"
                                    :text="false"
                                    :data="withdraw.method"
                                />
                            </td>
                            <td v-text="withdraw.payment_id ? withdraw.payment_id : 'Not Found'"></td>
                            <td>{{ withdraw.amount | currency }}</td>
                            <td v-text="withdraw.status"></td>
                            <td v-if="withdraw.status === 'unapproved'">
                                <a 
                                    class="btn btn-danger btn-sm text-white"
                                    data-toggle="modal" data-target="#withdrawCancelationModal"
                                    @click="cancel(withdraw)">Cancel</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div
                    class="alert alert-warning"
                    role="alert"
                    v-else
                    v-html="fallbackMessage"
                >
                    No Withdraw Request Found
                </div>
                <paginate
                    v-if="pageCount > 1"
                    v-model="currentPage"
                    :page-count="pageCount"
                    :prev-text="'Prev'"
                    :next-text="'Next'"
                    :container-class="'pagination justify-content-center'"
                >
                </paginate>
            </div>
        </div>
        <withdraw-cancelation-modal v-if="cancellableWithdrawRequest" :withdraw="cancellableWithdrawRequest" />
    </div>
</template>

<script>
    import DateRangePicker from "vue2-daterange-picker"
    import "vue2-daterange-picker/dist/vue2-daterange-picker.css"
    import moment from "moment"
    import withdrawCancelationModal from './CancelationModal'

    export default {
        data () {
            return {
                withdraws: {},
                withdrawPages: {},
                fallbackMessage:
                    'Fetching history from server <i class="fas fa-spinner fa-pulse"></i>',

                perPage: 5,
                pageCount: 1,
                currentPage: 1,

                searchType: "date",
                status: "",
                paymentMethod: "",
                search: "",

                searchPlaceholder: "",
                dateRange: {
                    startDate: new Date(),
                    endDate: new Date()
                },
                cancellableWithdrawRequest: null
            }
        },
        components: { DateRangePicker, withdrawCancelationModal },
        watch: {
            searchType(value) {
                this.resetSelection();
                this.generatePages(this.withdraws);

                if (this.searchType === "transaction_id") {
                    this.searchPlaceholder = "Type a transaction id";
                }
                if (this.searchType === "amount") {
                    this.searchPlaceholder = "Type a transaction amount";
                }
            },

            status(value) {
                this.generatePages(this.withdraws);
                if (this.status !== "") {
                    let withdraws = this.withdraws.filter(withdraw => {
                        if (withdraw.status === this.status) {
                            return withdraw;
                        }
                    });
                    this.generatePages(withdraws);
                }
            },

            paymentMethod(value) {
                this.generatePages(this.withdraws);
                if (this.paymentMethod !== "") {
                    let withdraws = this.withdraws.filter(withdraw => {
                        if (withdraw.method.toLowerCase() === this.paymentMethod) {
                            return withdraw;
                        }
                    });
                    this.generatePages(withdraws);
                }
            },
            search(value) {
                this.generatePages(this.withdraws);

                if (this.search !== "") {
                    let withdraws = this.withdraws.filter(withdraw => {
                        if (this.searchType === "transaction_id") {
                            if (withdraw.payment_id && withdraw.payment_id.indexOf(this.search) !== -1) {
                                return withdraw;
                            }
                        }
                        if (this.searchType === "amount") {
                            if (
                                parseFloat(withdraw.amount) ===
                                parseFloat(this.search)
                            ) {
                                return withdraw;
                            }
                        }
                    });
                    // console.log(transactions)
                    this.generatePages(withdraws);
                }
            },
            perPage(value) {
                this.perPage = parseInt(this.perPage);

                this.setCurrentPage(1);
                this.generatePages(this.withdraws);
            },
        },
        created () {
            this.getWithdraw()
            EventBus.$on('new-withdraw-request', (payload) => {
                this.withdraws.unshift(payload)
                this.withdraws = this.withdraws.sort((a, b) => {
                    return b.id - a.id;
                });
                this.generatePages(this.withdraws);
            })

            EventBus.$on('withdraw-request-canceled', (payload) => {
                this.withdraws = this.withdraws.filter(withdraw => {
                    if (withdraw.id == payload.id) {
                        withdraw.status = 'cancel'
                    }
                    return withdraw
                })
                this.generatePages(this.withdraws);
            })
        },
        methods: {
            getWithdraw () {
                axios.get("/api/member/financial/withdraws", { type: "recent" })
                    .then(response => {
                        if (response.data.length === 0) {
                            this.fallbackMessage = "No withdraw request found";
                        }
                        this.withdraws = response.data;
                        this.withdraws = this.withdraws.sort((a, b) => {
                            return b.id - a.id;
                        })
                        this.generatePages(this.withdraws)
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            generatePages(withdraws) {
                this.setCurrentPage(1);
                this.withdrawPages = _.chunk(withdraws, this.perPage)
                this.pageCount = this.withdrawPages.length
                if (this.pageCount === 0) {
                    this.fallbackMessage = "No withdraw request found"
                }
            },
            setCurrentPage(page) {
                this.currentPage = page;
            },
            resetSelection() {
                // reset search options
                this.search = "";
                this.paymentMethod = "";
                this.dateRange.startDate = new Date();
                this.dateRange.endDate = new Date();
                this.setCurrentPage(1);
            },
            searchWithDateRange(payload) {
                let startDate = new Date(payload.startDate);
                let endDate = new Date(payload.endDate);
                let withdraws = this.withdraws.filter(withdraw => {
                    if (
                        moment(new Date(withdraw.created_at)) >=
                            moment(startDate).startOf("day") &&
                        moment(new Date(withdraw.created_at)) <
                            moment(endDate).endOf("day")
                    ) {
                        return withdraw;
                    }
                });
                this.generatePages(withdraws);
            },
            cancel (withdraw) {
                this.cancellableWithdrawRequest = withdraw
            }
        }
    }
</script>
<style lang="scss">
.transaction-entry-field {
    background: #f1f1f1bf;
    padding: 5px 10px;
    border-radius: 4px;
    margin: 1rem 0;
    text-transform: capitalize;
    font-size: 14px;
    color: #191818;
}
.transaction-entry-field .form-control {
    display: block;
    width: 100%;
    height: calc(1.6em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 0.9rem;
    font-weight: 400;
    line-height: 1.6;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    -moz-appearance: button;
    -webkit-appearance: button;
}
</style>
<style>
.vue-daterange-picker .reportrange-text i,
.vue-daterange-picker .reportrange-text span {
    vertical-align: sub;
}
</style>
